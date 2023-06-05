<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhonebookController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('phonebooklist',[PhonebookController::class,'index']);
Route::post('addphonebook',[PhonebookController::class,'insert'])->name('addphonebook');
Route::get('deletephonebook/{id}',[PhonebookController::class,'delete'])->name('deletephonebook');
Route::get('updatephonebook/{id}/{phone}',[PhonebookController::class,'update']);
Route::view('phonebook','phonebook.index');