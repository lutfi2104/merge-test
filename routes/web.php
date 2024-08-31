<?php

use App\Models\Spec;
use App\Models\User;
use App\Models\Ujirm;
use App\Models\Lktcor;
use App\Livewire\Produk\Pengujian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoController;
use App\Http\Controllers\LktController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\SpecController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UjirmController;
use App\Http\Controllers\EtiketController;
use App\Http\Controllers\LktcorController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PengujianLivewire;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersopController;
use App\Http\Controllers\BakingEbController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DdCcpdryController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerintahController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Ccp1freshController;
use App\Http\Controllers\KalibrasiController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\NamaProdukController;
use App\Http\Controllers\BintikHitamController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\HoldRejectWipController;
use App\Http\Controllers\JenisInspeksiController;
use App\Http\Controllers\WhatsAppGroupController;
use App\Http\Controllers\ProdukSupplierController;
use App\Http\Controllers\NamaProdukSupplierController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if (auth()->user()) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('produk/import', [ProdukController::class, 'import'])->name('produk.import');
    Route::post('kalibrasi/import', [KalibrasiController::class, 'import'])->name('kalibrasi.import');
    Route::post('sop/import', [SopController::class, 'import'])->name('sop.import');
    Route::post('namaproduksupplier/import', [NamaProdukSupplierController::class, 'import'])->name('namaproduksupplier.import');
    Route::get('reject', [UjirmController::class, 'reject'])->name('reject');
    Route::get('hold/rmpm', [UjirmController::class, 'hold'])->name('hold.rmpm');
    Route::get('standar', [SopController::class, 'standar'])->name('sop.standar');
    Route::get('verifikasi', [SopController::class, 'verifikasi'])->name('sop.verifikasi');
    Route::get('haccp', [SopController::class, 'haccp'])->name('sop.haccp');
    Route::get('wi', [SopController::class, 'wi'])->name('sop.wi');
    Route::get('form', [SopController::class, 'form'])->name('sop.form');
    Route::get('sopfinal', [SopController::class, 'sopfinal'])->name('sop.sopfinal');
    Route::get('draft', [SopController::class, 'draft'])->name('sop.draft');
    Route::get('copy', [SopController::class, 'copy'])->name('sop.copy');
    Route::get('produk/export', [ProdukController::class, 'export'])->name('produk.export');
    Route::get('ccpdry/export', [DdCcpdryController::class, 'export'])->name('ccpdry.export');
    Route::get('export-data', [ProdukController::class, 'exportr'])->name('export.data');
    Route::get('pengujian/export', [PengujianController::class, 'export'])->name('pengujian.export');
    Route::delete('excel-data/{id}', [ProdukController::class, 'destroyFromExcel'])->name('data.destroyFromExcel');
    Route::post('kriteria/import', [KriteriaController::class, 'import'])->name('kriteria.import');
    Route::post('spec/import', [SpecController::class, 'import'])->name('spec.import');
    Route::post('supplier/import', [SupplierController::class, 'import'])->name('supplier.import');
    Route::post('jenis/import', [ProdukSupplierController::class, 'import'])->name('jenis.import');
    Route::post('template/import', [TemplateController::class, 'import'])->name('template.import');
    Route::get('/ujirm/{ujirm}/download', [UjirmController::class, 'download'])->name('ujirm.download');
    Route::get('/kalibrasi/{kalibrasi}/download', [KalibrasiController::class, 'download'])->name('kalibrasi.download');
    Route::get('/sertifikat/{id}', [KalibrasiController::class, 'sertifikat'])->name('kalibrasi.sertifikat');
    Route::get('/sop/{sop}/view', [SopController::class, 'viewDocument'])
        ->name('sop.viewDocument');
    Route::get('/run-notefication', [KalibrasiController::class, 'kirimEmailNotifikasi'])->name('kalibrasi.kirimEmailNotifikasi');
    Route::get('list-sop', [SopController::class, 'list_sop'])->name('list.sop');
    Route::get('revisi-dokumen', [SopController::class, 'revisi_dokumen'])->name('revisi.show');
    Route::get('revisi/dokumen{sopRevision}', [SopController::class, 'detail_revisi'])->name('revisi.detail');
    Route::delete('admin/kriteria/{kriteria}', [KriteriaController::class, 'hapus'])->name('kriteria.hapus');
    Route::get('nama_produk', [NamaProdukController::class, 'index'])->name('nama_produk.index');
    Route::get('nama_produk/create', [NamaProdukController::class, 'create'])->name('nama_produk.create');
    Route::post('nama_produk', [NamaProdukController::class, 'store'])->name('nama_produk.store');
    Route::get('baking/export', [BakingEbController::class, 'export'])->name('baking_eb.export');
    Route::get('bintikhitam/export', [BintikHitamController::class, 'export'])->name('bintikhitam.export');
    Route::get('nama_produk/{id}', [NamaProdukController::class, 'show'])->name('nama_produk.show');
    Route::get('nama_produk/{id}/edit', [NamaProdukController::class, 'edit'])->name('nama_produk.edit');
    Route::put('nama_produk/{id}', [NamaProdukController::class, 'update'])->name('nama_produk.update');
    Route::delete('nama_produk/{id}', [NamaProdukController::class, 'destroy'])->name('nama_produk.destroy');
    Route::post('nama_produk/import', [NamaProdukController::class, 'import'])->name('nama_produk.import');
    Route::get('/fetch-group', [WhatsAppGroupController::class, 'fetchGroup']);
Route::get('/get-whatsapp-group', [WhatsAppGroupController::class, 'getWhatsAppGroup']);



    Route::resources([
        'produk' => ProdukController::class,
        'user' => UserController::class,
        'spec' => SpecController::class,
        'kriteria' => KriteriaController::class,
        'template' => TemplateController::class,
        'pengujian' => PengujianController::class,
        'dd_ccpdry' => DdCcpdryController::class,
        'supplier' => SupplierController::class,
        'produk_supplier' => ProdukSupplierController::class,
        'namaproduksuppliers' => NamaProdukSupplierController::class,
        'ujirm' => UjirmController::class,
        'kalibrasi' => KalibrasiController::class,
        'sop' => SopController::class,
        'hold_reject_wip' => HoldRejectWipController::class,
        'baking_eb' => BakingEbController::class,
        'bintik_hitam' => BintikHitamController::class,
        'log_activity' => LogActivityController::class,
        'etiket' => EtiketController::class,
        'wo' => WoController::class,
        'departement' => DepartementController::class,
        'usersop' => UserSopController::class,
        'lkt' => LktController::class,
        'customer' => CustomerController::class,
        'pengujian_livewire' => PengujianLivewire::class,
        'perintah' => PerintahController::class,
        'jenis_inspeksi' => JenisInspeksiController::class,

    ]);
    Route::get('/pengujian-livewire', Pengujian::class)->name('PengujianLivewire');
    Route::get('spec-coa', [PengujianController::class, 'coa'])->name('pengujian.coa');
    Route::post('cetak-coa', [PengujianController::class, 'cetakcoa'])->name('cetak.coa');
    Route::get('cetak-coa', [PengujianController::class, 'cetakcoa'])->name('cetak.coaa');
    Route::post('get-produk-json', [ProdukController::class, 'get_produk_json'])->name('get-produk-json');
    Route::post('get-nama-produk-json', [NamaProdukSupplierController::class, 'get_nama_produk_json'])->name('get-nama-produk-json');
    // Route::post('get-template-json', [TemplateController::class, 'get_template_json'])->name('get-template-json');
    Route::post('get-kriteria-json', [TemplateController::class, 'get_kriteria'])->name('get_kriteria');
    Route::post('/lkt/{id}', [LktcorController::class, 'tambah'])->name('lktcor.tambah');
    Route::get('/lktcor/{id}/edit', [LktcorController::class, 'edit'])->name('lktcor.edit');
    Route::put('/lktcor/{id}', [LktcorController::class, 'update'])->name('lktcor.update');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
