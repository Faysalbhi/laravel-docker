<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhonebookController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});


// Phone Book Route 
Route::get('phonebooklist',[PhonebookController::class,'index']);
Route::post('addphonebook',[PhonebookController::class,'insert'])->name('addphonebook');
Route::get('deletephonebook/{id}',[PhonebookController::class,'delete'])->name('deletephonebook');
Route::get('updatephonebook/{id}/{phone}',[PhonebookController::class,'update']);
Route::post('phonebook/download',[PhonebookController::class,'export'])->name('phonebook.download');
Route::post('phonebook/upload',[PhonebookController::class,'import'])->name('phonebook.upload');

// Person Route 
Route::get('personlist',[PersonController::class,'index']);
Route::post('addperson',[PersonController::class,'insert'])->name('addperson');
Route::get('deleteperson/{id}',[PersonController::class,'delete'])->name('deleteperson');
Route::post('persons/download',[PersonController::class,'export'])->name('persons.download');
Route::post('persons/upload',[PersonController::class,'import'])->name('persons.upload');

// Contact Route 
Route::get('addcontact',[ContactController::class,'index'])->name('add.contact');
Route::get('showcontact',[ContactController::class,'show'])->name('showcontact');
Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('contact/delete/{id}',[ContactController::class,'delete'])->name('contact.delete');
Route::get('contact/edit/{id}',[ContactController::class,'edit'])->name('contact.edit');
Route::post('contact/update/{id}',[ContactController::class,'update'])->name('contact.update');
Route::post('contacts/download',[ContactController::class,'export'])->name('contacts.download');

