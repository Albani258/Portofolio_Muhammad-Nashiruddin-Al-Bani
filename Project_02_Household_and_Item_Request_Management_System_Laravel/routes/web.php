<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengadaanUserController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/signin', function () {
    return view('sign.sign-in');
})->name('login');

Route::post('/signin', function (Request $request) {

    $request->validate([
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    $login = $request->login;

    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    $credentials = [
        $field => $login,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->role === 'user') {
            return redirect()->route('user.pengajuan.index');
        }

        Auth::logout();

        return redirect()
            ->route('login')
            ->with('error', 'Role akun tidak dikenali.');
    }

    return back()
        ->with('error', 'Email/Username atau password salah.')
        ->onlyInput('login');

})->name('login.process');

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| DEFAULT ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if (Auth::user()->role === 'user') {
        return redirect()->route('user.dashboard');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/dashboard/export/pdf', [AdminDashboardController::class, 'exportPdf'])
            ->name('dashboard.export.pdf');

        Route::get('/dashboard/export/excel', [AdminDashboardController::class, 'exportExcel'])
            ->name('dashboard.export.excel');

        /*
        |--------------------------------------------------------------------------
        | Admin Akun
        |--------------------------------------------------------------------------
        */

        Route::get('/akun', [UserController::class, 'index'])
            ->name('akun.index');

        Route::get('/akun/create', [UserController::class, 'create'])
            ->name('akun.create');

        Route::post('/akun', [UserController::class, 'store'])
            ->name('akun.store');

        Route::delete('/akun/{id}', [UserController::class, 'destroy'])
            ->name('akun.destroy');

        /*
        |--------------------------------------------------------------------------
        | Admin Stock — CRUD DINAMIS
        |--------------------------------------------------------------------------
        */

        Route::get('/stock', [StockController::class, 'index'])
            ->name('stock.index');

        Route::get('/stock/create', [StockController::class, 'create'])
            ->name('stock.create');

        Route::post('/stock', [StockController::class, 'store'])
            ->name('stock.store');

        Route::get('/stock/edit/{id}', [StockController::class, 'edit'])
            ->name('stock.edit');

        Route::put('/stock/update/{id}', [StockController::class, 'update'])
            ->name('stock.update');

        Route::delete('/stock/delete/{id}', [StockController::class, 'destroy'])
            ->name('stock.destroy');

        /*
        |--------------------------------------------------------------------------
        | Admin Pengajuan / Pendistribusian
        |--------------------------------------------------------------------------
        */

        Route::get('/pengajuan', [PengajuanController::class, 'index'])
            ->name('pengajuan.index');

        Route::post('/pengajuan', [PengajuanController::class, 'store'])
            ->name('pengajuan.store');

        Route::patch('/pengajuan/{id}/status', [PengajuanController::class, 'updateStatus'])
            ->name('pengajuan.updateStatus');

        /*
        |--------------------------------------------------------------------------
        | Admin Pengadaan — TETAP DIPERTAHANKAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pengadaan', [PengadaanController::class, 'index'])
            ->name('pengadaan.index');

        Route::get('/pengadaan/create', [PengadaanController::class, 'create'])
            ->name('pengadaan.create');

        Route::post('/pengadaan', [PengadaanController::class, 'store'])
            ->name('pengadaan.store');

        /*
        |--------------------------------------------------------------------------
        | Admin Permintaan User
        |--------------------------------------------------------------------------
        */

        Route::get('/permintaan_user', [PengadaanUserController::class, 'index'])
            ->name('permintaan_user.index');

        Route::patch('/permintaan_user/{id}/update-status', [PengadaanUserController::class, 'updateStatus'])
            ->name('permintaan_user.updateStatus');
    });

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('user.pengajuan.index');
        })->name('dashboard');

        Route::get('/pengajuan', [PengajuanController::class, 'index_user'])
            ->name('pengajuan.index');

        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])
            ->name('pengajuan.create');

        Route::post('/pengajuan', [PengajuanController::class, 'store'])
            ->name('pengajuan.store');

        Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])
            ->name('pengajuan.destroy');

        Route::get('/pengadaan', [PengadaanUserController::class, 'index_user'])
            ->name('pengadaan.index');

        Route::get('/pengadaan/create', [PengadaanUserController::class, 'create'])
            ->name('pengadaan.create');

        Route::post('/pengadaan', [PengadaanUserController::class, 'store'])
            ->name('pengadaan.store');

        Route::delete('/pengadaan/{id}', [PengadaanController::class, 'destroy'])
            ->name('pengadaan.destroy');
    });