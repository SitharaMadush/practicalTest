<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TicketController;
use App\Mail\MailNotify;
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function(){
    Route::get('/public', [PublicController::class, 'index'])->name('public.index');
    // Route::get('/public/create_token', [PublicController::class, 'createToken']);
    Route::post('public/check_status', [PublicController::class, 'check_status'])->name('public.check_status');
    Route::post('public/store_ticket', [PublicController::class, 'store_ticket'])->name('public.store_ticket');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::patch('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update');
    Route::post('/tickets/search', [TicketController::class, 'search'])->name('tickets.search');
});


