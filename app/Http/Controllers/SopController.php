<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Sop;
use App\Models\User;
use App\Models\Usersop;
use App\Models\Departement;
use App\Models\SopRevision;
use Illuminate\Http\Request;
use App\Imports\ImportDokumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            Excel::import(new ImportDokumen, request()->file('file'));
            DB::commit();
            return redirect('admin/sop')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
    public function detail_revisi(SopRevision $sopRevision)
    {
        $data['title'] = 'Detail History Revisi';
        $data['revisi'] = $sopRevision;
        return view('admin.sop.detailRevisi', $data);
    }
    public function revisi_dokumen()
    {
        $data['title'] = 'History Revisi Dokumen';
        $data['revisis'] = SopRevision::all();
        return view('admin.sop.revisi', $data);
    }
    public function viewDocument(Sop $sop)
    {
        // Implementasikan logika otorisasi di sini jika diperlukan
        $data['title'] = 'View Document';
        $data['sop'] = $sop;

        return view('admin.sop.view', $data);
    }
    public $jenis = [
        'SOP',
        'WI',
        'Formulir',
        'HACCP PLAN',
        'Standar',
        'Verifikasi'
    ];

    public $dept = [
        'QAC',
        'RND',
        'PRC',
        'PRD',
        'GAHR',
        'FPS',
        'TST',
        'SAM',
        'BU'
    ];

    public $pic = [
        'Lutfi',
        'Anjas',
        'Fuji',
        'Resya',
        'Yohanes',
        'Widianto',
        'Risanto',
        'Kiki',
        'Anjas'
    ];

    public function index()
    {
        $data['title'] = 'Semua Dokumen';
        if (Auth::user()->hasRole(['Super Admin',  'Admin QC'])) {
            // Jika iya, tampilkan semua data
            $data['sop'] = Sop::where('status', 'final')
                ->orderBy('dept')
                ->orderByDesc('jenis')
                ->get();
        } else {
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('status', 'final')
                ->get();
        }
        return view('admin.sop.index', $data);
    }


    public function haccp()
    {
        $data['title'] = 'Dokumen HACCP';

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'HACCP PLAN')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'HACCP PLAN')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }

    public function list_sop()
    {
        $data['title'] = 'DAFTAR DOKUMEN';
        $data['users'] = User::all();
        $data['sop'] = Sop::all();
        $data['sop_count_sop'] = Sop::where('jenis', 'SOP')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            $data['sop_count_all'] = Sop::where('status', 'final')->count();
        } else {
            $data['sop_count_all'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('status', 'final')
                ->count();
        }

        $data['sop_count_haccp'] = Sop::where('jenis', 'HACCP PLAN')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_wi'] = Sop::where('jenis', 'WI')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_form'] = Sop::where('jenis', 'Formulir')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_standar'] = Sop::where('jenis', 'Standar')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_verifikasi'] = Sop::where('jenis', 'Verifikasi')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_verifikasi'] = Sop::where('jenis', 'Verifikasi')
            ->where('dept', Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_copy'] = Sop::whereJsonContains('copy_doc', (string) Auth::user()->departement_id)
            ->where('status', 'final')
            ->count();
        $data['sop_count_draft'] = Sop::where('status', 'draft')
            ->where('dept', Auth::user()->departement_id)
            ->count();
        return view('admin.sop.list', $data);
    }
    public function verifikasi()
    {
        $data['title'] = 'Dokumen Verifikasi';

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'verifikasi')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'verifikasi')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }
    public function standar()
    {
        $data['title'] = 'Dokumen standar';

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'standar')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'standar')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }
    public function copy()
    {
        $title = 'Dokumen Copy';
        $user = Auth::user();
        $deptId = (string) $user->departement_id;
        $status = 'final';

        $sop = Sop::whereJsonContains('copy_doc', $deptId)
            ->where('status', $status)
            ->get();




        return view('admin.sop.index', compact('sop', 'title'));
    }





    public function sopfinal()
    {
        $data['title'] = 'Dokumen SOP Final';

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'SOP')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'SOP')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }

    public function wi()
    {
        $data['title'] = 'Dokumen Work Instruction';

        if (Auth::user()->hasRole(['Super Admin', 'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'WI')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'WI')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }
    public function form()
    {
        $data['title'] = 'Dokumen Formulir';

        if (Auth::user()->hasRole(['Super Admin',  'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('jenis', 'Formulir')
                ->where('status', 'final')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('jenis', 'Formulir')
                ->where('status', 'final')
                ->get();
        }

        return view('admin.sop.index', $data);
    }
    public function draft()
    {
        $data['title'] = 'Dokumen Draft';

        if (Auth::user()->hasRole(['Super Admin',  'Admin QC'])) {
            // Jika pengguna memiliki peran sebagai Super Admin, Admin, atau Admin QC
            // Tampilkan semua data SOP dengan jenis 'SOP'
            $data['sop'] = Sop::where('status', 'draft')
                ->get();
        } else {
            // Jika pengguna bukan Super Admin, Admin, atau Admin QC
            // Batasi pencarian hanya pada SOP dengan jenis 'SOP' dan dari departemen pengguna
            $data['sop'] = Sop::where('dept', Auth::user()->departement_id)
                ->where('status', 'draft')
                ->get();
        }

        return view('admin.sop.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Dokumen';
        $data['usersops'] = Usersop::select('departement_id')->distinct()->get();
        $data['usersopss'] = Usersop::select('user_id')->distinct()->get();
        $data['users'] = User::all();
        $data['depts'] = Departement::all();
        $data['jenis'] = $this->jenis;
        return view('admin.sop.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'kode_dokumen' => 'required|unique:sops,kode_dokumen', // Ensure kode_dokumen is unique in the "sops" table
                'revisi' => 'required',
                'tgl_efektif' => 'required|date',
                'pic' => 'required',
                'rincian_revisi' => 'nullable',
                'jenis' => 'required',
                'dept' => 'required',
                'copy_doc' => 'nullable|array',
                'file' => 'required|mimes:pdf,doc,docx,docm,dotx,xlsm,xlsx,csv,xls,jpg,jpeg,png',
                'status' => 'required',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('files', $fileName, 'public');

            $sop = Sop::create([
                'judul' => $request->input('judul'),
                'kode_dokumen' => $request->input('kode_dokumen'),
                'revisi' => $request->input('revisi'),
                'rincian_revisi' => $request->input('rincian_revisi'),
                'tgl_efektif' => $request->input('tgl_efektif'),
                'pic' => $request->input('pic'),
                'jenis' => $request->input('jenis'),
                'dept' => $request->input('dept'),
                'file' => $fileName,
                'status' => $request->input('status'),
                'copy_doc' => json_encode($request->input('copy_doc')), // Convert array to JSON,
            ]);
            DB::commit();

            if ($sop->status === 'final') {
                return redirect()->route('sop.index')->with('success', 'SOP created successfully.');
            } elseif ($sop->status === 'draft') {
                return redirect()->route('sop.draft')->with('success', 'SOP created successfully.');
            }
        } catch (QueryException $e) {
            // Log kesalahan ke file log
            Log::error('QueryException during SOP creation: ' . $e->getMessage());

            if (strpos($e->getMessage(), 'kode_dokumen') !== false) {
                // Tangani kesalahan validasi unik pada kolom kode_dokumen
                return redirect()->back()->with('error', 'Error creating SOP: Kode dokumen already taken.');
            } else {
                // Tangani pengecualian QueryException lainnya
                return redirect()->back()->with('error', 'Error creating SOP. Please check the logs for details.');
            }
        } catch (\Exception $e) {
            // Log kesalahan ke file log
            Log::error('Exception during SOP creation: ' . $e->getMessage());

            // Tangani pengecualian umum
            return redirect()->back()->with('error', 'Error creating SOP. Please check the logs for details.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Sop $sop)
    {
        $data['title'] = 'Detail Dokumen';
        $data['sop'] = $sop;

        // Dekode JSON dan pastikan data unik
        $copyDocIds = $sop->copy_doc ? json_decode($sop->copy_doc) : [];
        $uniqueCopyDocIds = array_unique($copyDocIds);

        // Ambil data usersops yang sesuai dengan departement_id unik
        $data['usersops'] = Usersop::whereIn('departement_id', $uniqueCopyDocIds)->get();

        return view('admin.sop.detail', $data);
    }



    public function edit(Sop $sop)
    {
        $data['title'] = 'Revisi Dokumen';
        $data['sop'] = $sop;
        $data['usersops'] = Usersop::select('departement_id')->distinct()->get();
        $data['usersopss'] = Usersop::select('user_id')->distinct()->get();
        $data['jeniss'] = $this->jenis; // Tambahkan ini

        // Decode JSON copy_doc ke dalam array untuk ditampilkan pada form
        $data['copyDocIds'] = [];
        if ($sop->copy_doc) {
            $copyDocIds = json_decode($sop->copy_doc);
            $data['copyDocIds'] = $copyDocIds;
        }


        return view('admin.sop.edit', $data);
    }

    public function update(Request $request, Sop $sop)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'kode_dokumen' => 'required',
                'revisi' => 'required',
                'tgl_efektif' => 'required|date',
                'pic' => 'required',
                'jenis' => 'required',
                'dept' => 'required',
                'rincian_revisi' => 'nullable',
                'copy_doc' => 'nullable|array',
                'file' => 'nullable|mimes:pdf,doc,docx,docm,dotx,xlsm,xlsx,csv,xls,jpg,jpeg,png',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $revision = $sop->revisions()->create([
                'judul' => $request->input('judul'),
                'kode_dokumen' => $request->input('kode_dokumen'),
                'revisi' => $request->input('revisi'),
                'tgl_efektif' => $request->input('tgl_efektif'),
                'pic' => $request->input('pic'),
                'rincian_revisi' => $request->input('rincian_revisi'),
                'jenis' => $request->input('jenis'),
                'dept' => $request->input('dept'),
                'copy_doc' => $request->has('copy_doc') ? json_encode($request->input('copy_doc')) : null, // Update copy_doc field
                'file' => $request->hasFile('file') ? $this->uploadFile($request->file('file')) : $sop->file,
                'status' => $request->input('status'),
            ]);

            $sop->update([
                'judul' => $revision->judul,
                'kode_dokumen' => $revision->kode_dokumen,
                'revisi' => $revision->revisi,
                'rincian_revisi' => $revision->rincian_revisi,
                'tgl_efektif' => $revision->tgl_efektif,
                'pic' => $revision->pic,
                'jenis' => $revision->jenis,
                'dept' => $revision->dept,
                'copy_doc' => $revision->copy_doc,
                'file' => $revision->file,
                'status' => $revision->status,
            ]);
            DB::commit();
            if ($sop->status === 'final') {
                return redirect()->route('sop.index')->with('success', 'SOP created successfully.');
            } elseif ($sop->status === 'draft') {
                return redirect()->route('sop.draft')->with('success', 'SOP created successfully.');
            }
        } catch (QueryException $e) {
            // Log kesalahan ke file log
            Log::error('QueryException during SOP update: ' . $e->getMessage());

            if (strpos($e->getMessage(), 'kode_dokumen') !== false) {
                // Tangani kesalahan validasi unik pada kolom kode_dokumen
                return redirect()->back()->with('error', 'Error updating SOP: Kode dokumen already taken.');
            } else {
                // Tangani pengecualian QueryException lainnya
                return redirect()->back()->with('error', 'Error updating SOP. Please check the logs for details.');
            }
        } catch (\Exception $e) {
            // Log kesalahan ke file log
            Log::error('Exception during SOP update: ' . $e->getMessage());

            // Tangani pengecualian umum
            return redirect()->back()->with('error', 'Error updating SOP. Please check the logs for details.');
        }
    }

    protected function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('files', $fileName, 'public');
        return $fileName;
    }

    //     private function generateFileName($judul, $kodeDokumen, $dept, $file)
    // {
    //     $judul = str_replace(' ', '_', $judul); // Replace spaces with underscores
    //     $fileName = $judul . '_' . $kodeDokumen . '_' . $dept . '_' . time() . '_' . $file->getClientOriginalName();

    //     return $fileName;
    // }

    // private function generateKodeDokumen($jenis, $dept, $sop)
    // {
    //     // Get the latest SOP with the same jenis and dept
    //     $latestSop = Sop::where('jenis', $jenis)
    //         ->where('dept', $dept)
    //         ->latest('created_at')
    //         ->first();

    //     if (!$latestSop) {
    //         // No SOP found for the given jenis and dept, start with 001
    //         return "{$jenis}/{$dept}/001";
    //     }

    //     // Extract the last part of the kode_dokumen and increment
    //     $lastCode = explode('/', $latestSop->kode_dokumen)[2];
    //     $nextCode = str_pad((int)$lastCode + 1, 3, '0', STR_PAD_LEFT);

    //     return "{$jenis}/{$dept}/{$nextCode}";
    // }

    public function destroy(Sop $sop)
    {
        $sop->delete();

        return redirect()->route('sop.index')->with('success', 'SOP deleted successfully.');
    }
}
