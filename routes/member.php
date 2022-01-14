<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Member\Auth\LoginController;
use App\Http\Controllers\Member\MemberController;
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

Route::group(['prefix' => 'member'], function () {
//////////////// Register Member////////////////////////////

    Route::get('register', [RegisterController::class, 'getRegister'])->name('member.register');
    Route::post('register', [RegisterController::class, 'postRegister']);

//////////////// Login Member////////////////////////////

    Route::get('login', [LoginController::class, 'getLogin'])->name('member.login');
    Route::post('login', [LoginController::class, 'postLogin']);

//////////////// Auth Member////////////////////////////

    Route::group(['middleware' => 'auth.guard:member'], function () {

//////////////// home Member////////////////////////////

    Route::get('/', [MemberController::class, 'index'])->name('member');

//////////////// logout Member////////////////////////////

    Route::get('logout', [MemberController::class, 'logout'])->name('member.logout');
    Route::post('logout', [MemberController::class, 'logout']);

////////////////   Member////////////////////////////


});
});
