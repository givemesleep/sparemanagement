<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\primary;
use App\Http\Controllers\SpareManagement;
use App\Http\Controllers\DropDownItemsController;
// use App\Http\Controllers\MaintenanceController;

// Index route for the primary controller
Route::get('/', [primary::class, 'index'])->name('primary.index');

// For Viewing
Route::get('/spares', [SpareManagement::class, 'sparesInventory'])->name('spares.sparesTable');
Route::get('/spares/sparesPending',[SpareManagement::class, 'sparesPending'])->name('spares.sparesPending');
Route::get('/spares/sparesReceived', [SpareManagement::class, 'sparesReceived'])->name('spares.sparesReceived');
Route::get('/spares/sparesPullout', [SpareManagement::class, 'sparesPullout'])->name('spares.sparesPullout');
Route::get('/spares/sparesEOSL', [SpareManagement::class, 'sparesEOSL'])->name('spares.sparesEOSL');
Route::get('/spares/sparesDefect', [SpareManagement::class, 'sparesDefect'])->name('spares.sparesDefect');

// Viewing with unique ID
Route::get('/spares/sparesPending/{ViewSparesID}', [SpareManagement::class, 'showDetails'])->name('spares.showDetails');

//Approved Spares
Route::get('/spares/AppSpares/{ApprovedSparesID}', [SpareManagement::class, 'AppSpares'])->name('spares.AppSpares');
Route::get('/spares/RejSpares/{RejectSparesID}', [SpareManagement::class, 'RejSpares'])->name('spares.RejSpares');
Route::get('/spares/PullOutSpares/{PullOutSparesID}', [SpareManagement::class, 'AddPullOut'])->name('spares.PullOutSpares');

//For Archive
Route::get('/spares/SpareArchive/{ArchiveSparesID}', [SpareManagement::class, 'SpareArchive'])->name('spares.SpareArchive');

//For DropDowns
Route::get('/spares/sparesReceived', [DropDownItemsController::class, 'getDropDown'])->name('spares.sparesReceived');

//For Adding Spares
Route::post('/spares/addSpares', [SpareManagement::class, 'createTicket'])->name('spares.createTicket.store');

//Barcode Scann
Route::get('/spares/barcodeScanned/{id}', [SpareManagement::class, 'barcodeScanned'])->name('spares.barcodeScanned');

