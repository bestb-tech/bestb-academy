<?php
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\Auth\LoginController;

//Route::match(['get', 'post'], '/login', [LoginController::class, ['showLoginForm','login']])->name('login');
Route::get('/login',[LoginController::class,'showLoginForm'])->name('getLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'login'])->name('postLogin');
//Route::middleware('auth:admin')->group(function (){
//    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
//});
Route::get('/',function (){
    return redirect('/admin/home');
})->name('root_admin');
Route::get('{path}', HomeController::class)->where('path', '(.*)');
//    ->middleware('auth:admin');

