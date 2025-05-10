<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HariBesarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KultumController;
use App\Http\Controllers\MajelisController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\PayloadExcavatorController;
use App\Http\Controllers\PengajianController;
use App\Http\Controllers\TPAController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detailKegiatan/{kategori}/{uuid}', [HomeController::class, 'detail'])->name('home.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/contact/post', [HomeController::class, 'contactPost'])->name('home.contact.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'register_post'])->name('register.post');

Route::post('/verification', [AuthController::class, 'verification'])->name('daftar.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){

    //Dashboard
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    //Verifikasi
    Route::get('/verifikasi/index', [VerifikasiController::class, 'index'])->name('verifikasi.index');
    Route::get('/verifikasi/verified/{uuid}', [VerifikasiController::class, 'verified'])->name('verifikasi.verified');

    //Masjid
    Route::get('/masjid/index', [MasjidController::class, 'index'])->name('masjid.index');
    Route::post('/masjid/insert', [MasjidController::class, 'insert'])->name('masjid.insert');
    Route::get('/masjid/delete/{uuid}', [MasjidController::class, 'delete'])->name('masjid.delete');
    Route::post('/masjid/update/{uuid}', [MasjidController::class, 'update'])->name('masjid.update');
    Route::post('/masjid/updateGambar/{uuid}', [MasjidController::class, 'updateGambar'])->name('masjid.updateGambar');

    //Pengajian
    Route::get('/pengajian/index', [PengajianController::class, 'index'])->name('pengajian.index');
    Route::get('/pengajian/insert', [PengajianController::class, 'insert'])->name('pengajian.insert')->middleware('CheckRole'.':Pengurus');
    Route::post('/pengajian/post', [PengajianController::class, 'post'])->name('pengajian.post')->middleware('CheckRole'.':Pengurus');
    Route::get('/pengajian/delete/{uuid}', [PengajianController::class, 'delete'])->name('pengajian.delete')->middleware('CheckRole'.':Pengurus');
    Route::get('/pengajian/edit/{uuid}', [PengajianController::class, 'edit'])->name('pengajian.edit')->middleware('CheckRole'.':Pengurus');
    Route::post('/pengajian/update/{uuid}', [PengajianController::class, 'update'])->name('pengajian.update')->middleware('CheckRole'.':Pengurus');

    //TPA
    Route::get('/tpa/index', [TPAController::class, 'index'])->name('tpa.index');
    Route::get('/tpa/insert', [TPAController::class, 'insert'])->name('tpa.insert')->middleware('CheckRole'.':Pengurus');
    Route::post('/tpa/post', [TPAController::class, 'post'])->name('tpa.post')->middleware('CheckRole'.':Pengurus');
    Route::get('/tpa/delete/{uuid}', [TPAController::class, 'delete'])->name('tpa.delete')->middleware('CheckRole'.':Pengurus');
    Route::get('/tpa/edit/{uuid}', [TPAController::class, 'edit'])->name('tpa.edit')->middleware('CheckRole'.':Pengurus');
    Route::post('/tpa/update/{uuid}', [TPAController::class, 'update'])->name('tpa.update')->middleware('CheckRole'.':Pengurus');

    //Kultum
    Route::get('/kultum/index', [KultumController::class, 'index'])->name('kultum.index');
    Route::get('/kultum/insert', [KultumController::class, 'insert'])->name('kultum.insert')->middleware('CheckRole'.':Pengurus');
    Route::post('/kultum/post', [KultumController::class, 'post'])->name('kultum.post')->middleware('CheckRole'.':Pengurus');
    Route::get('/kultum/delete/{uuid}', [KultumController::class, 'delete'])->name('kultum.delete')->middleware('CheckRole'.':Pengurus');
    Route::get('/kultum/edit/{uuid}', [KultumController::class, 'edit'])->name('kultum.edit')->middleware('CheckRole'.':Pengurus');
    Route::post('/kultum/update/{uuid}', [KultumController::class, 'update'])->name('kultum.update')->middleware('CheckRole'.':Pengurus');

    //Majelis
    Route::get('/majelis/index', [MajelisController::class, 'index'])->name('majelis.index');
    Route::get('/majelis/insert', [MajelisController::class, 'insert'])->name('majelis.insert')->middleware('CheckRole'.':Pengurus');
    Route::post('/majelis/post', [MajelisController::class, 'post'])->name('majelis.post')->middleware('CheckRole'.':Pengurus');
    Route::get('/majelis/delete/{uuid}', [MajelisController::class, 'delete'])->name('majelis.delete')->middleware('CheckRole'.':Pengurus');
    Route::get('/majelis/edit/{uuid}', [MajelisController::class, 'edit'])->name('majelis.edit')->middleware('CheckRole'.':Pengurus');
    Route::post('/majelis/update/{uuid}', [MajelisController::class, 'update'])->name('majelis.update')->middleware('CheckRole'.':Pengurus');

    //Hari Besar
    Route::get('/haribesar/index', [HariBesarController::class, 'index'])->name('haribesar.index');
    Route::get('/haribesar/insert', [HariBesarController::class, 'insert'])->name('haribesar.insert')->middleware('CheckRole'.':Pengurus');
    Route::post('/haribesar/post', [HariBesarController::class, 'post'])->name('haribesar.post')->middleware('CheckRole'.':Pengurus');
    Route::get('/haribesar/delete/{uuid}', [HariBesarController::class, 'delete'])->name('haribesar.delete')->middleware('CheckRole'.':Pengurus');
    Route::get('/haribesar/edit/{uuid}', [HariBesarController::class, 'edit'])->name('haribesar.edit')->middleware('CheckRole'.':Pengurus');
    Route::post('/haribesar/update/{uuid}', [HariBesarController::class, 'update'])->name('haribesar.update')->middleware('CheckRole'.':Pengurus');

    //Contact
    Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/delete/{uuid}', [ContactController::class, 'delete'])->name('contact.delete')->middleware('CheckRole'.':Admin');

    //Account
    Route::get('/account/index', [AccountController::class, 'index'])->name('account.index');
    Route::post('/account/ubahPassword/{uuid}', [AccountController::class, 'ubahPassword'])->name('account.ubahPassword');

    //Users
    Route::get('/users/index', [UserController::class, 'index'])->name('user.index')->middleware('CheckRole'.':Admin');
    Route::post('/users/insert', [UserController::class, 'insert'])->name('user.insert')->middleware('CheckRole'.':Admin');
    Route::get('/users/statusEnabled/{uuid}', [UserController::class, 'statusEnabled'])->name('user.statusEnabled')->middleware('CheckRole'.':Admin');
    Route::get('/users/resetPassword/{uuid}', [UserController::class, 'resetPassword'])->name('user.resetPassword')->middleware('CheckRole'.':Admin');

});
