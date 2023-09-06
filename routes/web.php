<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;



// Route to generate a PDF
// Route::get('/', [PDFController::class, 'home'])->name('pdf.home');
// Route::post('/generate-pdf', [PDFController::class, 'generatepdf'])->name('pdf.generate');


Route::get('/', [PDFController::class, 'showUploadForm'])->name('upload.docx');
Route::post('/convert-docx-to-pdf', [PDFController::class, 'generateDocument'])->name('convert.docx.to.pdf');
