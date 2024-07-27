<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::controller(UserController::class)->group(function() {
		Route::get('/dashboard', 'dashboard')->name('dashboard');
		Route::get('/profile', 'profil')->name('profile');
		Route::get('/barang-masuk', 'barangMasuk')->name('barang-masuk');
		Route::get('/barang-keluar', 'barangKeluar')->name('barang-keluar');
		Route::get('/add-data-inventaris', 'addDataInventaris')->name('add-data-inventaris');
		Route::get('/edit-data-inventaris-{id}', 'editDataInventaris')->name('edit-data-inventaris');
		Route::post('/create-data-inventaris', 'createBarang')->name('create-barang');
		Route::patch('/update-data-inventaris{id}', 'updateBarang')->name('update-barang');
		Route::patch('/delete-data-barang{id}', 'deleteBarang')->name('delete-barang');
		Route::get('/print-barang-masuk', 'printBarangMasuk')->name('print-barang-masuk');
		Route::get('/print-barang-keluar', 'printBarangKeluar')->name('print-barang-keluar');
		Route::get('/catatan-riwayat-alat', 'catatanRiwayatAlat')->name('catatan-riwayat-alat');
		Route::get('/add-catatan-riwayat-alat/{id}', 'catatanAlatAdd')->name('catatan-alat-add');
		Route::get('/edit-catatan-riwayat-alat/{id}', 'catatanAlatEdit')->name('catatan-alat-edit');
		Route::get('/print-riwayat-alat{id}', 'printRiwayatAlat')->name('print-riwayat-alat');
		Route::post('/add-formulir-catatan{id}', 'addFormulirCatatan')->name('add-formulir-catatan');
		Route::post('/create-catatan-alat{id}', 'createCatatanAlat')->name('create-catatan-alat');
		Route::patch('/update-catatan-alat{id}', 'updateCatatanAlat')->name('update-catatan-alat');
		Route::patch('/delete-catatan-alat{id}', 'deleteCatatanAlat')->name('delete-catatan-alat');
	});

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::group(['middleware' => 'guest'], function () {
    // Route::get('/register', [RegisterController::class, 'create']);
    // Route::post('/register', [RegisterController::class, 'store']);
    // Route::get('/login', [SessionsController::class, 'create']);
    // Route::post('/session', [SessionsController::class, 'store']);
	// Route::get('/login/forgot-password', [ResetController::class, 'create']);
	// Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	// Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	// Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
	Route::get('/login', [AuthController::class, 'login'])->name('login');
	Route::post('/login-action', [AuthController::class, 'loginAction'])->name('login-action');
});
