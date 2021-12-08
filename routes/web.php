<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\OpenidController;
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

Route::get('/', function () {
    return view('welcome');
});

// 顯示登入畫面（表單）
Route::get('login', function(){
    return view('login');
});

NTPCOpenID::routes();

// 假設設定之 login_allow 為 showdata
Route::get('auth/openid-login', [AuthController::class, 'openidLogin']);
Route::get('profile', [OpenidController::class, 'profile']);

Route::get('auth/logout', [AuthController::class, 'logout']);


