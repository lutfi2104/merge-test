<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Ujirm;
use App\Models\supplier;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\namaProduk_supplier;
use Illuminate\Support\Facades\Log;
use App\Mail\DataStoredNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendWhatsAppNotification;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendDataStoredNotification;
use Illuminate\Support\Facades\Validator;


class UjirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Hanya mengizinkan akses untuk role tertentu untuk method store
        $this->middleware('role:Super Admin|Admin QC|QC|Warehouse|SCPI|Purchasing')->only('store');
        $this->middleware('role:Super Admin|Admin QC|QC|Warehouse|SCPI|Purchasing')->only('show');

        // Hanya mengizinkan akses untuk role tertentu untuk method download
        $this->middleware('role:Super Admin|Admin QC|Warehouse|SCPI|Purchasing')->only('download');

        // Hanya mengizinkan akses untuk role Super Admin untuk method edit, destroy, dan update
        $this->middleware('role:Super Admin|Admin QC')->only('edit');
        $this->middleware('role:Super Admin|Admin QC')->only('destroy');
        $this->middleware('role:Super Admin|Admin QC')->only('update');

        // Mengizinkan akses untuk role tertentu untuk method create
        $this->middleware('role:Super Admin|Admin QC|QC')->only('create');
    }

    public function index()
    {
        $data['title'] = 'Data Passed Pengujian RMPM';
        $data['ujirms'] = Ujirm::where('status', 'Passed')->orderBy('created_at', 'desc')->get();
        return view('admin.ujirm.index', $data);
    }

    public function kondisi_mobil()
    {
        $kondisi = ['Disegel & Digembok', 'Digembok', 'Tidak Segel dan Gembok', 'Segel Rusak', 'Gembok Rusak'];
        return $kondisi;
    }

    public function cek_area()
    {
        $cek_area = ['RMS 1', 'RMS 2', 'RMS 3'];
        return $cek_area;
    }
    public function from_area()
    {
        $from_area = ['RMS 1', 'RMS 2', 'RMS 3', 'Lab', 'Pos Security', 'FPS', 'Produksi G1', 'Produksi G2', 'Produksi G3', 'Produksi G4'];
        return $from_area;
    }
    public function uom()
    {
        $uom = ['Sak', 'Ball', 'Kg', 'Liter', 'Karton', 'Pcs', 'Gram'];
        return $uom;
    }

    public function complate_doc()
    {
        $comp_doc = ['Dokumen Lengkap', 'SJ belum Tersedia', 'Massa Halal Habis', 'CoA tidak Ada'];
        return $comp_doc;
    }

    public function reject()
    {
        $data['title'] = 'Data Reject Pengujian RMPM';
        $data['ujirms'] = Ujirm::where('status', 'Reject')->orderBy('created_at', 'desc')->get();
        return view('admin.ujirm.reject', $data);
    }
    public function hold()
    {
        $data['title'] = 'Data Hold Pengujian RMPM';
        $data['ujirms'] = Ujirm::where('status', 'Hold')->orderBy('created_at', 'desc')->get();
        return view('admin.ujirm.hold', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['suppliers'] = supplier::all();
        $data['ujirm'] = Ujirm::all();
        $data['NamaProduks'] = namaProduk_supplier::all();
        $data['kondisis'] = $this->kondisi_mobil();
        $data['comp_docs'] = $this->complate_doc();
        $data['cek_areas'] = $this->cek_area();
        $data['from_areas'] = $this->from_area();
        $data['uoms'] = $this->uom();
        $data['title'] = 'Pengujian RMPM';
        return view('admin.ujirm.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();


            $validator = Validator::make($request->all(), [
                'tgl_datang' => ['required', 'date'],
                'supplier_id' => ['required', 'exists:suppliers,nama_produsen'],
                'nama_produk_supplier_id' => ['required', 'exists:nama_produk_suppliers,id'],
                'no_batch' => ['required', 'string'],
                'qty' => ['required', 'numeric'],
                'suhu' => ['nullable', 'numeric'], // Tambahkan validasi numerik untuk suhu jika diperlukan
                'halal' => ['required', 'date', 'after_or_equal:tgl_datang'], // Tambahkan validasi tanggal untuk halal jika diperlukan
                'bersih' => ['required', 'string'],
                'kondisi' => ['required', 'string', Rule::in($this->kondisi_mobil())],
                'asing' => ['required', 'string'], // Sesuaikan nilai yang mungkin
                'sample' => ['required', 'integer'],
                'sebutkan' => ['nullable', 'string'],
                'coa' => ['nullable', 'file'],
                'sj' => ['nullable', 'file'],
                'warna' => ['required', 'string'],
                'aroma' => ['required', 'string'],
                'bentuk' => ['required', 'string'],
                'rasa' => ['nullable', 'string'],
                'note' => ['nullable', 'string'],
                'ash' => ['nullable', 'string'],
                'protein' => ['nullable', 'string'],
                'lab' => ['nullable', 'string'],
                'f_number' => ['nullable', 'string'],
                'wet_gluten' => ['nullable', 'string'],
                'ka_beras' => ['nullable', 'string'],
                'ka_beras_qc' => ['nullable', 'string'],
                'cek_area' => ['required', 'string'],
                Rule::in($this->cek_area()),
                'comp_doc' => ['required', 'string', Rule::in($this->complate_doc())],
                'start_smp' => ['required', 'date_format:H:i:s'],
                'end_smp' => ['required', 'date_format:H:i:s'],
                'status' => ['required', 'string'], // Sesuaikan nilai yang mungkin
                'from_area' => ['required', 'string'],
                Rule::in($this->from_area()),
                'uom' => ['required', 'string'],
                Rule::in($this->uom()),
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $validator->validate();

            // Validasi tambahan untuk 'coa' berdasarkan status
            if ($data['status'] == 'Passed') {
                $validator->after(function ($validator) use ($request) {
                    if (!$request->hasFile('coa')) {
                        $validator->errors()->add('coa', 'The coa or sj file is required when status is Passed.');
                    }
                });
            }

            // Jika validasi tambahan gagal
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            // Jika ada file COA diunggah, simpan file
            if ($request->hasFile('coa')) {
                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_produk_supplier_id = $data['nama_produk_supplier_id'];
                $no_batch = $data['no_batch'];

                // Mengambil nama_produk dari model yang sesuai
                $nama_produk = namaProduk_supplier::find($nama_produk_supplier_id)->nama_produk;

                // Membentuk nama file baru
                $tgl_datang = Carbon::parse($data['tgl_datang'])->format('Ymd');
                $nama_file = "{$no_batch}_{$nama_produk}_{$tgl_datang}.{$request->file('coa')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('coa')->storeAs('coa', $nama_file);

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['coa'] = $nama_file;
            }
            if ($request->hasFile('sj')) {
                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_produk_supplier_id = $data['nama_produk_supplier_id'];
                $no_batch = $data['no_batch'];

                // Mengambil nama_produk dari model yang sesuai
                $nama_produk = namaProduk_supplier::find($nama_produk_supplier_id)->nama_produk;

                // Membentuk nama file baru
                $tgl_datang = Carbon::parse($data['tgl_datang'])->format('Ymd');
                $nama_file = "{$no_batch}_{$nama_produk}_{$tgl_datang}.{$request->file('sj')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('sj')->storeAs('sj', $nama_file);

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['sj'] = $nama_file;
            }

            $data['user_name'] = Auth::user()->name;

            // Hitung durasi hanya jika start_smp dan end_smp ada
            if (isset($data['start_smp']) && isset($data['end_smp'])) {
                $start_smp = Carbon::createFromFormat('H:i:s', $data['start_smp']);
                $end_smp = Carbon::createFromFormat('H:i:s', $data['end_smp']);
                $durationInMinutes = $end_smp->diffInMinutes($start_smp);
                $hours = floor($durationInMinutes / 60);
                $minutes = $durationInMinutes % 60;
                $data['date_smp'] = sprintf('%02d:%02d', $hours, $minutes);
            } else {
                $data['date_smp'] = null; // Atur date_smp ke null jika salah satu tidak ada
            }


            Log::info('Data yang akan disimpan:', $data);

            $ujirm = Ujirm::create($data);
            DB::commit();
            // dd($data);

            $token = 'cdtDVf2oj4Y@ENPH!VaS';
            $target = '120363306157073228@g.us,120363306822563551@g.us'; // dari kiri kekanan izin dan RM koordinasi
            $delay = '2';
            $tanggalDatang = Carbon::parse($request->tgl_datang)->format('d-m-Y');
            $namaProduk = namaProduk_supplier::find($request->nama_produk_supplier_id)->nama_produk;
            $supplier = $request->supplier_id;
            $status = $request->status;

            $message = <<<EOT
Dear Team,
Info!!

Berikut adalah RMPM kedatangan:
Tanggal: {$tanggalDatang}
Nama RMPM: {$namaProduk}
Produsen: {$supplier}
Status: {$status}
EOT;


            // Dispatch job
            SendWhatsAppNotification::dispatch($target, $message, $token, $delay);


            if ($data['status'] == 'Passed') {
                return redirect()->route('ujirm.index')->with('success', 'Berhasil Menyimpan Data Passed');
            } elseif ($data['status'] == 'Reject') {
                return redirect()->route('reject')->with('success', 'Berhasil Menyimpan Data Reject');
            } elseif ($data['status'] == 'Hold') {
                return redirect()->route('hold.rmpm')->with('success', 'Berhasil Menyimpan Data Hold');
            } else {
                return redirect()->back()->with('error', 'Status tidak valid');
            }
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['ujirm'] = Ujirm::findOrFail($id);
        $data['title'] = 'Detail Data Pengujian RMPM';
        return view('admin.ujirm.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function download(Ujirm $ujirm)
    {
        $coaPath = storage_path("app/public/coa/{$ujirm->coa}");

        return response()->download($coaPath);
    }
    public function edit($id)
    {
        $data['ujirm'] = Ujirm::findOrFail($id);
        $data['suppliers'] = supplier::all();
        $data['NamaProduks'] = namaProduk_supplier::all();
        $data['kondisis'] = $this->kondisi_mobil();
        $data['cek_areas'] = $this->cek_area();
        $data['comp_docs'] = $this->complate_doc();
        $data['from_areas'] = $this->from_area();
        $data['uoms'] = $this->uom();
        $data['title'] = 'Edit Data Pengujian RMPM';
        return view('admin.ujirm.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Log data request yang masuk untuk debugging

            $validator = Validator::make($request->all(), [
                'tgl_datang' => ['required', 'date'],
                'supplier_id' => ['required', 'exists:suppliers,nama_produsen'],
                'nama_produk_supplier_id' => ['required', 'exists:nama_produk_suppliers,id'],
                'no_batch' => ['required'],
                'qty' => ['required'],
                'suhu' => ['nullable', 'numeric'],
                'halal' => ['required', 'date', 'after_or_equal:tgl_datang'], // Tambahkan validasi tanggal untuk halal jika diperlukan
                'bersih' => ['required', 'string'],
                'kondisi' => ['required', 'string', Rule::in($this->kondisi_mobil())],
                'asing' => ['required'],
                'sample' => ['required', 'integer'],
                'sebutkan' => ['nullable'],
                'coa' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
                'sj' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
                'warna' => ['required'],
                'aroma' => ['nullable'],
                'bentuk' => ['nullable'],
                'rasa' => ['nullable'],
                'note' => ['nullable'],
                'status' => ['nullable'],
                'ash' => ['nullable'],
                'protein' => ['nullable'],
                'lab' => ['nullable'],
                'f_number' => ['nullable'],
                'wet_gluten' => ['nullable'],
                'ka_beras' => ['nullable'],
                'ka_beras_qc' => ['nullable'],
                'cek_area' => ['required', 'string'],
                Rule::in($this->cek_area()),
                'comp_doc' => ['required', 'string', Rule::in($this->complate_doc())],
                'start_smp' => ['required', 'date_format:H:i:s'],
                'end_smp' => ['required', 'date_format:H:i:s'],
                'from_area' => ['required', 'string'],
                Rule::in($this->from_area()),
                'uom' => ['required', 'string'],
                Rule::in($this->uom()),
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $validator->validate();

            // Validasi tambahan untuk 'coa' berdasarkan status
            // if ($data['status'] == 'Passed') {
            //     $validator->after(function ($validator) use ($request) {
            //         if (!$request->hasFile('coa')) {
            //             $validator->errors()->add('coa', 'The coa file is required when status is Passed.');
            //         }
            //     });
            // }

            // Jika validasi tambahan gagal
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ujirm = Ujirm::findOrFail($id);

            if ($request->hasFile('coa')) {
                // Hapus file COA yang lama jika ada
                if ($ujirm->coa && Storage::exists($ujirm->coa)) {
                    Storage::delete($ujirm->coa);
                }

                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_produk_supplier_id = $data['nama_produk_supplier_id'];
                $no_batch = $data['no_batch'];

                // Mengambil nama_produk dari model yang sesuai
                $nama_produk = namaProduk_supplier::find($nama_produk_supplier_id)->nama_produk;

                // Membentuk nama file baru
                $tgl_datang = Carbon::parse($data['tgl_datang'])->format('Ymd');
                $nama_file = "{$no_batch}_{$nama_produk}_{$tgl_datang}.{$request->file('coa')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('coa')->storeAs('coa', $nama_file);

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['coa'] = $nama_file;
            }
            if ($request->hasFile('sj')) {
                // Hapus file sj yang lama jika ada
                if ($ujirm->sj && Storage::exists($ujirm->sj)) {
                    Storage::delete($ujirm->sj);
                }

                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_produk_supplier_id = $data['nama_produk_supplier_id'];
                $no_batch = $data['no_batch'];

                // Mengambil nama_produk dari model yang sesuai
                $nama_produk = namaProduk_supplier::find($nama_produk_supplier_id)->nama_produk;

                // Membentuk nama file baru
                $tgl_datang = Carbon::parse($data['tgl_datang'])->format('Ymd');
                $nama_file = "{$no_batch}_{$nama_produk}_{$tgl_datang}.{$request->file('sj')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('sj')->storeAs('sj', $nama_file);

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['sj'] = $nama_file;
            }

            // Update user_name hanya jika diperlukan
            $data['user_name'] = $ujirm->user_name;

            // Mengambil nilai start_smp dan end_smp yang ada jika tidak disediakan dalam request
            $start_smp = $request->input('start_smp', $ujirm->start_smp);
            $end_smp = $request->input('end_smp', $ujirm->end_smp);

            if ($start_smp && $end_smp) {
                // Memastikan start_smp dan end_smp diformat dengan ketat
                $start_smp = Carbon::createFromFormat('H:i:s', trim($start_smp));
                $end_smp = Carbon::createFromFormat('H:i:s', trim($end_smp));
                $durationInMinutes = $end_smp->diffInMinutes($start_smp);
                $hours = floor($durationInMinutes / 60);
                $minutes = $durationInMinutes % 60;
                $data['date_smp'] = sprintf('%02d:%02d', $hours, $minutes);
            } else {
                // Menghapus date_smp jika start_smp atau end_smp tidak disediakan
                $data['date_smp'] = null;
            }

            // Memastikan start_smp dan end_smp dalam data
            $data['start_smp'] = $start_smp;
            $data['end_smp'] = $end_smp;

            Log::info('Data yang akan diperbarui:', $data);
            $ujirm->update($data);

            DB::commit();

            if ($data['status'] == 'Passed') {
                return redirect()->route('ujirm.index')->with('success', 'Berhasil Mengupdate Kriteria');
            } elseif ($data['status'] == 'Reject') {
                return redirect()->route('reject')->with('success', 'Bahan Di reject');
            } else {
                return redirect()->back()->with('error', 'Status tidak valid');
            }
        } catch (Throwable $th) {
            DB::rollback();
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ujirm $ujirm)
    {
        try {
            // Mengambil nama file dari model Ujirm
            $coaFileName = $ujirm->coa;

            $status = $ujirm->status ?? null; // Use null if status is not set
            // Hapus record dari database
            $ujirm->delete();

            // Hapus file dari storage
            if ($coaFileName) {
                Storage::delete("public/coa/{$coaFileName}");
            }

            if ($status === 'Passed') {
                return redirect()->route('ujirm.index');
            } elseif ($status === 'Reject') {
                return redirect()->route('reject');
            } else {
                // Status tidak dikenali, ganti dengan rute yang sesuai
                return redirect()->route('ujirm.index');
            }
        } catch (Throwable $th) {
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }
}
