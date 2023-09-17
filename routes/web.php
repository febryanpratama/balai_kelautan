<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HsoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificatorController;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::get('auth/register', [FrontController::class, 'indexRegister']);
Route::post('auth/register', [FrontController::class, 'postRegister']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:Admin'],
    'controller' => AdminController::class
], function(){

    // Dokumen Route
    Route::prefix('dokumen-kewajiban')->group(function(){
        Route::get('/', 'indexDokumen');
        Route::post('/', 'postDokumen');
    });

    Route::prefix('tahun')->group(function(){
        Route::get('/', 'indexTahun');
        Route::post('/', 'storeTahun');

        Route::get('/status', 'ubahStatus');
    });
});


// Route User

Route::group([
    'prefix' => 'user',
    'middleware' => ['auth', 'role:User'],
    'controller' => UserController::class
],function(){
    Route::prefix('permohonan-dokumen')->group(function(){
        Route::get('/', 'indexPermohonan');
        Route::post('/', 'storePermohonan');

        Route::get('/detail/{detail_id}', 'detailPermohonan');
    });
});

// Route Verificator

Route::group([
    'prefix' => 'verifikator',
    'middleware' => ['auth', 'role:Verificator'],
    'controller' => VerificatorController::class
], function(){

    Route::prefix('permohonan-dokumen')->group(function(){
        Route::get('/', 'indexPermohonan');
        Route::get('/detail/{detail_id}', 'detailPermohonan');

        Route::post('/ubah', 'ubahStatus');
    });
});

Route::group([
    'prefix' => 'hso',
    'middleware' => ['auth', 'role:Hso'],
    'controller' => HsoController::class,   
], function(){

    Route::prefix('permohonan-dokumen')->group(function(){
        Route::get('/', 'indexPermohonan');
        Route::get('/{laporan_tahunan}/laporan', 'LaporanTahunan');
        Route::get('/{laporan_tahunan}/laporan/{detail_id}/detail', 'DetailLaporanTahunan');
    });
});

require __DIR__.'/auth.php';
