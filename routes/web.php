<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;



// Route to generate a PDF
Route::get('/', [PDFController::class, 'home'])->name('pdf.home');
Route::post('/generate-pdf', [PDFController::class, 'generatepdf'])->name('pdf.generate');
