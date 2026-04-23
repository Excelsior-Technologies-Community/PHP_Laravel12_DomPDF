<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', [PDFController::class, 'index']);

Route::get('/download-pdf', [PDFController::class, 'generatePDF']);
Route::get('/stream-pdf', [PDFController::class, 'streamPDF']);

Route::post('/bulk-pdf', [PDFController::class, 'bulkPDF']);

