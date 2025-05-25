<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BacklogController;

Route::get('/', function () {
    return view('welcome');
});


//Preview Import Routes
Route::post('/spares/preview', [ReportController::class, 'preview'])->name('spares.preview');
Route::get('/spares/preview-page', [ReportController::class, 'showPreview'])->name('spares.preview.view');
Route::post('/spares/confirm-upload', [ReportController::class, 'confirmUpload'])->name('spares.confirm');
Route::post('/spares/discard-preview', [ReportController::class, 'discardPreview'])->name('spares.discard');


//sparesinfo route
Route::get('sparesinfo_report', [ReportController::class, 'spares'])->name('sparesinfo_report.spares');
Route::get('sparesinfo_report-export', [ReportController::class, 'export'])->name('spares.export');

//sparesinfo backlog
Route::get('sparesinfo_backlog',[BacklogController::class, 'backlog'])->name('sparesinfo_backlog');
Route::post('sparesinfo_backlog-store',[BacklogController::class, 'store'])->name('backlog.store');