<?php


use App\Mail\SendEmail;
use App\Mail\TestEmail;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TemplateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('get-kriteria', [TemplateController::class, 'get_kriteria'])->name('get-kriteria');

Route::get('send-email', function () {

        // $email = new TestEmail();
        // Mail::to('lutfi.mla@gmail.com')->send($email);
        // return 'Email berhasil dikirim!';
        $data['email'] = 'lutfi.mla@gmail.com';
       dispatch(new TestEmailJob($data));
        return 'Email berhasil dikirim!';

});

