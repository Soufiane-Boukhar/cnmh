<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\SimpleExcelController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.inscription');
})->name('inscription');





Route::get('/connexion', function () {
    return view('auth.connexion');
})->name('login');

Route::get('/dashbord', function () {
    return view('home');
});

Route::get('/patient/ajouter', function () {
    return view('patient.create');
})->name('patient.create');

Route::get('/simple-excel/import', function () {
    return view('patient.index');
});

Route::post('/inscription',[UserController::class ,'create'])->name('create.user');
Route::post('/check',[AuthController::class ,'login'])->name('check.login');
Route::post('/connexion',[AuthController::class ,'logout'])->name('logout');
Route::post('/patient/ajouter',[PatientsController::class ,'create'])->name('create.patient');
Route::get('/liste/patients',[PatientsController::class ,'getAll'])->name('listPatient');
Route::get('/patient/{id}',[PatientsController::class ,'find'])->name('patient.show');
Route::PATCH('/patient/{id}',[PatientsController::class ,'update'])->name('edit.patient');
Route::post('/liste/patients/{id}',[PatientsController::class ,'delete'])->name('delete');

Route::post("/liste/patients", [SimpleExcelController::class,'import'])->name('excel.import');
Route::post("simple-excel/export", [SimpleExcelController::class,'export'])->name('excel.export');















