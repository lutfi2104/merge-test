<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Mail\SendEmail;
use App\Models\Kalibrasi;
use Illuminate\Http\Request;
use App\Imports\KalibrasiImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function kirimEmailNotifikasi()
    {
        // Ambil data kalibrasi dari database
        // Ambil data kalibrasi dari database
        try {
            $kalibrasis = Kalibrasi::all();

            foreach ($kalibrasis as $item) {
                $tglKalibrasi = Carbon::parse($item->tgl_kalibrasi);
                $sekarang = Carbon::now();
                $selisihHari = $tglKalibrasi->diffInDays($sekarang);

                if ($selisihHari < 30) {
                    // Jika kurang dari 30 hari, kirim email notifikasi
                    $data = [
                        'namaPenerima' => 'John Doe', // Ganti dengan nama penerima
                        'namaAlat' => $item->nama_alat,
                        'tglKalibrasiFormatted' => $tglKalibrasi->format('d-m-Y'),
                    ];

                    Mail::to('lutfi.mla@gmail.com')->send(new SendEmail($data));
                } elseif ($selisihHari < 90) {
                    // Jika kurang dari 90 hari, kirim email notifikasi
                    $data = [
                        'namaPenerima' => 'Lutfi', // Ganti dengan nama penerima
                        'namaAlat' => $item->nama_alat,
                        'tglKalibrasiFormatted' => $tglKalibrasi->format('d-m-Y'),
                    ];

                    Mail::to('lutfi.mla@gmail.com')->send(new SendEmail($data));
                }
            }

            $this->info('Email notifikasi telah dikirim.');
        } catch (\Exception $e) {
            $this->error('Gagal mengirim email notifikasi. Pesan kesalahan: ' . $e->getMessage());
        }
    }
    public function sertifikat($id)
    {
        // Ambil data kalibrasi berdasarkan $id
        $kalibrasi = Kalibrasi::find($id);

        // Jika kalibrasi tidak ditemukan, mungkin hendak menangani kasus ini
        if (!$kalibrasi) {
            abort(404); // Tampilkan halaman 404 Not Found
        }

        $data['title'] = 'Sertifikat Kalibrasi';
        $data['sertifikat'] = storage_path("app/public/sertifikat_kalibrasi/{$kalibrasi->sertifikat}");

        return view('admin.kalibrasi.sertifikat', $data);
    }

    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            $file = request()->file('file');

            if (!$file->isValid()) {
                return redirect()->back()->with('error', 'File tidak valid');
            }

            Excel::import(new KalibrasiImport, $file);

            DB::commit();
            return redirect('admin/kalibrasi')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
    public function download(Kalibrasi $kalibrasi)
    {
        $coaPath = storage_path("app/public/sertifikat_kalibrasi/{$kalibrasi->sertifikat}");

        return response()->download($coaPath);
    }
    public function index()
    {
        $data['title'] = 'Kalibrasi';
        $data['kalibrasis'] = Kalibrasi::all();
        return view('admin.kalibrasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Kalibrasi';
        return view('admin.kalibrasi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'nama_alat' => 'required',
                'rentang_ukur' => 'required',
                'resolusi' => 'required',
                'tempat' => 'required',
                'tgl_kalibrasi' => 'required',
                'kalibrasi' => 'nullable',
                'verifikasi' => 'nullable',
                'sertifikat' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf,xls,xlsx', 'max:2048'],
                'kalibrator' => 'nullable',
                'merk' => 'nullable',
                'type' => 'nullable',
                'nomor_seri' => 'nullable',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $validator->validate();

            if ($request->hasFile('sertifikat')) {
                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_alat = $data['nama_alat'];
                $merk = $data['merk'];


                // Mengambil nama_produk dari model yang sesuai


                // Membentuk nama file baru
                $tgl_kalibrasi = Carbon::parse($data['tgl_kalibrasi'])->format('Ymd');
                $nama_file = "{$nama_alat}_{$merk}_{$tgl_kalibrasi}.{$request->file('sertifikat')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('sertifikat')->storeAs('sertifikat_kalibrasi', $nama_file);

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['sertifikat'] = $nama_file;
            }

            // dd($request->all());

            Kalibrasi::create($data);

            return redirect()->route('kalibrasi.index')
                ->with('success', 'Kalibrasi created successfully.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kalibrasi $kalibrasi)
    {
        $data['title'] = 'Kalibrasi';
        $data['kalibrasi'] = $kalibrasi;
        return view('admin.kalibrasi.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title'] = 'Kalibrasi';
        $data['kalibrasi'] = Kalibrasi::findOrFail($id);
        return view('admin.kalibrasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kalibrasi $kalibrasi)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_alat' => 'required',
                'rentang_ukur' => 'required',
                'resolusi' => 'required',
                'tempat' => 'required',
                'tgl_kalibrasi' => 'required',
                'kalibrasi' => 'required',
                'verifikasi' => 'nullable',
                'sertifikat' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf,xls,xlsx', 'max:2048'],
                'kalibrator' => 'required',
                'merk' => 'nullable',
                'type' => 'nullable',
                'nomor_seri' => 'nullable',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $validator->validate();

            if ($request->hasFile('sertifikat')) {
                // Mengambil nama_produk_supplier_id dan no_batch dari data yang akan disimpan
                $nama_alat = $data['nama_alat'];
                $merk = $data['merk'];

                // Membentuk nama file baru
                $tgl_kalibrasi = Carbon::parse($data['tgl_kalibrasi'])->format('Ymd');
                $nama_file = "{$nama_alat}_{$merk}_{$tgl_kalibrasi}.{$request->file('sertifikat')->getClientOriginalExtension()}";

                // Menyimpan file dengan nama baru
                $request->file('sertifikat')->storeAs('sertifikat_kalibrasi', $nama_file);

                // Menghapus file lama jika ada
                if ($kalibrasi->sertifikat) {
                    Storage::delete("sertifikat_kalibrasi/{$kalibrasi->sertifikat}");
                }

                // Menyisipkan nama file baru ke dalam data yang akan diupdate
                $data['sertifikat'] = $nama_file;
            }

            $kalibrasi->update($data);

            return redirect()->route('kalibrasi.index')
                ->with('success', 'Kalibrasi updated successfully.');
        } catch (Throwable $th) {
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kalibrasi $kalibrasi)
    {
        try {
            $kalibrasi->delete();
            return redirect()->route('kalibrasi.index')
                ->with('success', 'Kalibrasi deleted successfully.');
        } catch (Throwable $th) {
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }
}
