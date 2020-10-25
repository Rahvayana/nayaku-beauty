<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\TreatmentController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Treatments
    Route::get('treatments',[TreatmentController::class,'index'])->name('treatments');
    Route::get('TambahTreatments',[TreatmentController::class,'add'])->name('add-treatments');
    Route::post('SimpanTreatments',[TreatmentController::class,'store'])->name('insert-treatments');

    //Complaints
    Route::get('complaints',[ComplaintController::class,'index'])->name('complaints');
    Route::get('TambahComplaints',[ComplaintController::class,'add'])->name('add-complaints');
    Route::post('SimpanComplaint',[ComplaintController::class,'store'])->name('insert-complaints');

});
