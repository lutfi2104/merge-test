<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Kriteria;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Imports\TemplateImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_kriteria(Request $request)
    {
        try {
            $template_id = $request->template_id;
            $template = Template::find($template_id);
            $kriteria = $template->kriterias();
            return response()->json($kriteria, 200);
        } catch (\Throwable $th) {
            return abort(500);
        }
    }
    public function get_template_json(Request $request)
    {
        try {
            $template = Template::findOrFail($request->template_id);
            return response()->json($template, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    public function import(Request $request)
    {

        try {
            DB::beginTransaction();
            Excel::import(new TemplateImport, request()->file('file'));
            DB::commit();
            return redirect('admin/template')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
    public function index()
    {
        $data['title'] = 'Template Pengujian';
        $data['templates'] = Template::all();
        return view('admin.template.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Template';
        $data['kriterias'] = Kriteria::all();

        return view('admin.template.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:templates,name'],
                'kriteria_id' => ['required', 'array']
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['kriteria_id'] = json_encode($request->kriteria_id);
            Template::create($data);

            DB::commit();

            return redirect()->route('template.index')->with('success', 'Berhasil Menyimpan template');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Template';
        $data['kriterias'] = Kriteria::all();
        $data['template'] = Template::findOrFail($id);
        return view('admin.template.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $template = Template::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:templates,name,' . $template->id],
                'kriteria_id' => ['required', 'array']
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['kriteria_id'] = json_encode($request->kriteria_id);
            $template->update($data);

            DB::commit();

            return redirect()->route('template.index')->with('success', 'Berhasil Menyimpan Update');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $template = Template::findOrFail($id); // Mencari Template berdasarkan $id, dan menghasilkan ModelNotFoundException jika tidak ditemukan
            DB::beginTransaction(); // Memulai transaksi database
            $template->delete(); // Menghapus data Template
            DB::commit(); // Menyimpan perubahan jika tidak ada masalah
            return redirect()->route('template.index')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            DB::rollback(); // Membatalkan transaksi jika terjadi masalah
            if ($e->getCode() == '23000') { // Kode untuk pelanggaran constraint integritas
                return redirect()->back()->with('error', 'Tidak dapat menghapus template karena masih terkait dengan data lain.');
            }
            Log::debug('TemplateController::destroy() ' . $e->getMessage()); // Mencatat pesan kesalahan ke log
            return redirect()->back()->with('error', 'Terjadi Masalah saat Menghapus Data'); // Kembali ke halaman sebelumnya dengan pesan kesalahan umum
        } catch (Throwable $th) {
            DB::rollback(); // Membatalkan transaksi jika terjadi masalah
            Log::debug('TemplateController::destroy() ' . $th->getMessage()); // Mencatat pesan kesalahan ke log
            return redirect()->back()->with('error', 'Terjadi Masalah saat Menghapus Data'); // Kembali ke halaman sebelumnya dengan pesan kesalahan umum
        }
    }
}
