<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

// Route to generate a PDF
Route::get('/generate-pdf', [PDFController::class, 'index']);
