<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Produk;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use App\Imports\ProdukImport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $jenis = ['Dry Breadcrumbs', 'Fresh Breadcrumbs', 'Bubble Crumbs', 'Consumer Pack'];
    public function get_produk_json(Request $request)
    {
        try {
            $produk = Produk::findOrFail($request->produk_id);
            return response()->json($produk, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['produks'] = Produk::all();
        return view('admin.produk.index', $data);
    }
    // public function import(Request $request)
    // {
    //     $file = $request->file('file')->store('public/import');
    //     $import = new ProdukImport;
    //     $import->import($file);
    //     return redirect()->back()->with('success', 'Berhasil Menyimpan di Data Produk');
    // }
    public function import(Request $request)
    {
        try {

            DB::beginTransaction();
            Excel::import(new ProdukImport, request()->file('file'));
            DB::commit();
            return redirect('admin/produk')->with('success', 'Berhasil Mengimpor Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah saat Mengimpor Data');
        }
    }

    public function export()
    {
        // Menghitung tanggal 3 bulan yang lalu dari sekarang
        $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-d');

        // Menyusun nama file dengan tanggal dan waktu saat ini
        $fileName = 'daftar_produk_' . Carbon::now()->format('l_d_F_Y-H_i') . '.xlsx';

        // Mengekspor data yang sesuai ke file Excel
        return (new ProdukExport($threeMonthsAgo))->download($fileName);
    }

    // public function exportr()
    // {
    //     // Path ke file Excel yang telah ada
    //     $filePath = storage_path('app/public/daftar-produk.xlsx');

    //     // Membaca file Excel yang ada
    //     $spreadsheet = IOFactory::load($filePath);

    //     // Mendapatkan sheet aktif
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // Mengambil data yang sudah ada dalam file Excel dan menyimpannya dalam array
    //     $existingData = [];
    //     foreach ($sheet->getRowIterator() as $row) {
    //         $rowData = [];
    //         foreach ($row->getCellIterator() as $cell) {
    //             $rowData[] = $cell->getValue();
    //         }
    //         $existingData[] = $rowData;
    //     }

    //     // Mengambil data dari database yang belum ada dalam file Excel
    //     $newDataFromDatabase = Produk::where('created_at', '>=', Carbon::now()->subMonths(3))->get();

    //     // Menambahkan data baru ke dalam sheet jika belum ada dalam data yang ada
    //     $row = $sheet->getHighestRow() + 1;
    //     foreach ($newDataFromDatabase as $data) {
    //         // Memeriksa apakah data sudah ada dalam file Excel
    //         $isDataExist = false;
    //         foreach ($existingData as $existingRow) {
    //             if ($existingRow[0] == $data->name && $existingRow[1] == $data->template->name && $existingRow[2] == $data->expired) {
    //                 $isDataExist = true;
    //                 break;
    //             }
    //         }

    //         // Jika data belum ada, tambahkan ke dalam file Excel
    //         if (!$isDataExist) {
    //             $sheet->setCellValue('A' . $row, $data->id);
    //             $sheet->setCellValue('B' . $row, $data->name);
    //             $sheet->setCellValue('C' . $row, $data->template->name);
    //             $sheet->setCellValue('D' . $row, $data->expired);
    //             // ...
    //             $row++;
    //         }
    //     }

    //     // Menyimpan file Excel kembali
    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save($filePath);

    //     // Kembalikan respons yang sesuai (misalnya, pemberitahuan berhasil)
    //     return redirect()->back()->with('message', 'Data berhasil ditambahkan ke file Excel.');
    // }
    public function exportr()
    {
        try {
            // Path ke file Excel yang akan diperbarui
            $filePath = storage_path('app/public/daftar-produk.xlsx');

            // Membaca file Excel yang ada atau membuat yang baru jika tidak ada
            $spreadsheet = null;
            if (Storage::exists('public/daftar-produk.xlsx')) {
                $spreadsheet = IOFactory::load($filePath);
            } else {
                $spreadsheet = new Spreadsheet();
            }
            $sheet = $spreadsheet->getActiveSheet();

            // Menghapus semua baris kecuali baris pertama (header)
            if ($sheet->getHighestRow() > 1) {
                $sheet->deleteRows(2, $sheet->getHighestRow() - 1);
            }

            // Ambil data dari database
            $dataFromDatabase = Produk::all();

            // Mulai baris awal di spreadsheet
            $row = 2;

            // Menulis data dari database ke dalam spreadsheet
            foreach ($dataFromDatabase as $data) {
                $sheet->setCellValue('A' . $row, $data->name);
                $sheet->setCellValue('B' . $row, $data->template->name);
                // ...
                $row++;
            }

            // Simpan spreadsheet ke dalam file Excel
            $writer = new Xlsx($spreadsheet);
            $writer->save($filePath);

            // Kembalikan respons yang sesuai (misalnya, pemberitahuan berhasil)
            return redirect()->route('template.index')->with('message', 'Data berhasil diperbarui di file Excel.');
        } catch (\Throwable $th) {
            // Tangani kesalahan jika terjadi
            return redirect()->route('export.data')->with('error', 'Terjadi masalah: ' . $th->getMessage());
        }
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Produk';
        $data['templates'] = Template::all();
        $data['jenis'] = $this->jenis;
        return view('admin.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:produks,name'],
                'jenis' => ['required', 'string'],
                'kode_produk' => ['required', 'string', 'unique:produks,kode_produk'],
                'template_id' => ['required', 'numeric'],
                'expired' => ['required', 'integer'],
                'color' => ['required', 'string'],
                'texture' => ['required', 'string'],
                'flavor' => ['required', 'string'],
                'granule' => ['nullable', 'string'],
                'appearance' => ['nullable', 'string'],
                'packaging' => ['required', 'string'],
                'taste' => ['required', 'string'],
                'partical_size' => ['nullable', 'string'],
                'screen_mm' => ['nullable', 'string'],
                'filth_insect' => ['nullable', 'string']
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            Produk::create($data);

            DB::commit();

            return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan di Keranjang');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $data['title'] = 'Detail Produk';
        $data['produks'] = $produk;
        return view('admin.produk.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $data['title'] = 'Edit Produk';
        $data['produk'] = $produk;
        $data['jenis'] = $this->jenis;
        $data['templates'] = Template::all();
        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    { {
            try {
                DB::beginTransaction();

                $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'unique:produks,name,' . $produk->id],
                    'jenis' => ['required', 'string'],
                    'template_id' => ['required', 'numeric'],
                    'expired' => ['required', 'integer'],
                    'color' => ['required', 'string'],
                    'texture' => ['required', 'string'],
                    'flavor' => ['required', 'string'],
                    'granule' => ['nullable', 'string'],
                    'appearance' => ['nullable', 'string'],
                    'packaging' => ['required', 'string'],
                    'taste' => ['required', 'string'],
                    'partical_size' => ['nullable', 'string'],
                    'screen_mm' => ['nullable', 'string'],
                    'filth_insect' => ['nullable', 'string']
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
                }

                $data = $validator->validated();

                $produk->update($data);

                DB::commit();

                return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan di Update');
            } catch (Throwable $th) {
                DB::rollback();
                Log::debug($th->getMessage());
                return redirect()->back()->with('error', 'Terjadi masalah');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
{
    try {
        DB::beginTransaction();
        $produk->delete();
        DB::commit();
        return redirect()->route('produk.index')->with('success', 'Berhasil Menghapus Data');
    } catch (QueryException $e) {
        DB::rollback();
        if ($e->getCode() == '23000') { // SQLSTATE code for integrity constraint violation
            return redirect()->back()->with('error', 'Tidak dapat menghapus produk karena masih ada pengujian yang terkait.');
        }
        Log::debug('ProdukController::destroy()' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi Masalah saat menghapus produk.');
    } catch (Throwable $th) {
        DB::rollback();
        Log::debug('ProdukController::destroy()' . $th->getMessage());
        return redirect()->back()->with('error', 'Terjadi Masalah');
    }
}

}
