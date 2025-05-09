<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\primary;
use App\Http\Controllers\SpareManagement;
use App\Http\Controllers\DropDownItemsController;
use App\Http\Controllers\AuthenticateUser;
use Illuminate\Http\Request;

// Login Routes
Route::get('/logins/login', [AuthenticateUser::class, 'AuthLogin'])->name('logins.login');
Route::post('/logins/login_user', [AuthenticateUser::class, 'AuthUserLog'])->name('logins.user_login');
Route::get('/logins/logout', [AuthenticateUser::class, 'AuthLogout'])->name('logins.logout');

// Group for admin routes
Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(primary::class)->index();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('primary.index');

    Route::get('/spares', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesInventory();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesTable');

    Route::get('/spares/sparesPending', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesPending();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesPending');

    Route::get('/spares/sparesReceived', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesReceived();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesReceived');

    Route::get('/spares/sparesPullout', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesPullout();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesPullout');

    Route::get('/spares/sparesEOSL', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesEOSL();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesEOSL');

    Route::get('/spares/sparesDefect', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(SpareManagement::class)->sparesDefect();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesDefect');

    Route::get('/spares/sparesReceived', function () {
        // Check if the user is logged in and has the correct role
        if (Session::has('user') && Session::get('role') === 1) {
            return app(DropDownItemsController::class)->getDropDown();
        }
        // Redirect to login if not authenticated
        return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
    })->name('spares.sparesReceived');


    Route::controller(SpareManagement::class)->group(function () {
        Route::get('/spares/sparesPending/{ViewSparesID}', 'showDetails')->name('spares.showDetails');
        Route::get('/spares/AppSpares/{ApprovedSparesID}', 'AppSpares')->name('spares.AppSpares');
        Route::get('/spares/RejSpares/{RejectSparesID}', 'RejSpares')->name('spares.RejSpares');
        Route::get('/spares/PullOutSpares/{PullOutSparesID}', 'AddPullOut')->name('spares.PullOutSpares');
        Route::get('/spares/SpareArchive/{ArchiveSparesID}', 'SpareArchive')->name('spares.SpareArchive');
        Route::post('/spares/addSpares', 'createTicket')->name('spares.createTicket.store');
    });

});

// Default route for the index
Route::get('/', function () {
    // Redirect to login if the user is not logged in
    if (!Session::has('user')) {
        return redirect()->route('logins.login');
    }

    // Redirect to the appropriate dashboard based on the user's role
    $role = Session::get('role');
    if ($role === 1) {
        return redirect()->route('primary.index');
    } elseif ($role === 2) {
        return redirect()->route('primary.landing');
    }

    return redirect()->route('logins.login')->withErrors(['error' => 'Role not recognized.']);
});




//Primary
// Index route for the primary controller
// Route::get('/', [primary::class, 'index'])->name('primary.index');
// Route::get('/primary/landingPage', [primary::class, 'landingPage'])->name('primary.landing');


// //Spares
// // For Viewing
// Route::get('/spares', [SpareManagement::class, 'sparesInventory'])->name('spares.sparesTable');
// Route::get('/spares/sparesPending',[SpareManagement::class, 'sparesPending'])->name('spares.sparesPending');
// Route::get('/spares/sparesReceived', [SpareManagement::class, 'sparesReceived'])->name('spares.sparesReceived');
// Route::get('/spares/sparesPullout', [SpareManagement::class, 'sparesPullout'])->name('spares.sparesPullout');
// Route::get('/spares/sparesEOSL', [SpareManagement::class, 'sparesEOSL'])->name('spares.sparesEOSL');
// Route::get('/spares/sparesDefect', [SpareManagement::class, 'sparesDefect'])->name('spares.sparesDefect');

// // Viewing with unique ID
// Route::get('/spares/sparesPending/{ViewSparesID}', [SpareManagement::class, 'showDetails'])->name('spares.showDetails');

// //Approved Spares
// Route::get('/spares/AppSpares/{ApprovedSparesID}', [SpareManagement::class, 'AppSpares'])->name('spares.AppSpares');
// Route::get('/spares/RejSpares/{RejectSparesID}', [SpareManagement::class, 'RejSpares'])->name('spares.RejSpares');
// Route::get('/spares/PullOutSpares/{PullOutSparesID}', [SpareManagement::class, 'AddPullOut'])->name('spares.PullOutSpares');

// //For Archive
// Route::get('/spares/SpareArchive/{ArchiveSparesID}', [SpareManagement::class, 'SpareArchive'])->name('spares.SpareArchive');

// //For DropDowns
// Route::get('/spares/sparesReceived', [DropDownItemsController::class, 'getDropDown'])->name('spares.sparesReceived');

// //For Adding Spares
// Route::post('/spares/addSpares', [SpareManagement::class, 'createTicket'])->name('spares.createTicket.store');

// //Barcode Scann
// Route::get('/spares/barcodeScanned/{id}', [SpareManagement::class, 'barcodeScanned'])->name('spares.barcodeScanned');


// //Login Design Muna
// Route::get('/logins/login', [AuthenticateUser::class, 'AuthLogin'])->name('logins.login');

// // Login Routes
// Route::controller(AuthenticateUser::class)->group(function () {
//     Route::get('/logins/login', 'AuthLogin')->name('logins.login');
//     Route::post('/logins/login_user', 'AuthUserLog')->name('logins.user_login');
//     Route::get('/logins/logout', 'AuthLogout')->name('logins.logout');
// });

// // Admin Routes
// Route::prefix('admin')->group(function () {
//     Route::get('/', function () {
//         if (Session::has('user') && Session::get('role') === 1) {
//             return app(primary::class)->index();
//         }
//         return redirect()->route('logins.login')->withErrors(['error' => 'Unauthorized Access. Please log in.']);
//     })->name('primary.index');

    // Route::controller(SpareManagement::class)->group(function () {
    //     Route::get('/spares', 'sparesInventory')->name('spares.sparesTable');
    //     Route::get('/spares/sparesPending', 'sparesPending')->name('spares.sparesPending');
    //     Route::get('/spares/sparesReceived', 'sparesReceived')->name('spares.sparesReceived');
    //     Route::get('/spares/sparesPullout', 'sparesPullout')->name('spares.sparesPullout');
    //     Route::get('/spares/sparesEOSL', 'sparesEOSL')->name('spares.sparesEOSL');
    //     Route::get('/spares/sparesDefect', 'sparesDefect')->name('spares.sparesDefect');
    //     Route::get('/spares/sparesPending/{ViewSparesID}', 'showDetails')->name('spares.showDetails');
    //     Route::get('/spares/AppSpares/{ApprovedSparesID}', 'AppSpares')->name('spares.AppSpares');
    //     Route::get('/spares/RejSpares/{RejectSparesID}', 'RejSpares')->name('spares.RejSpares');
    //     Route::get('/spares/PullOutSpares/{PullOutSparesID}', 'AddPullOut')->name('spares.PullOutSpares');
    //     Route::get('/spares/SpareArchive/{ArchiveSparesID}', 'SpareArchive')->name('spares.SpareArchive');
    //     Route::post('/spares/addSpares', 'createTicket')->name('spares.createTicket.store');
    // });

//     Route::get('/spares/sparesReceived', [DropDownItemsController::class, 'getDropDown'])->name('spares.sparesReceived');
// });

// // Default Route
// Route::get('/', function () {
//     if (!Session::has('user')) {
//         return redirect()->route('logins.login');
//     }

//     $role = Session::get('role');
//     if ($role === 1) {
//         return redirect()->route('primary.index');
//     } elseif ($role === 2) {
//         return redirect()->route('primary.landing');
//     }

//     return redirect()->route('logins.login')->withErrors(['error' => 'Role not recognized.']);
// });
