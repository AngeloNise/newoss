<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\Faculty\FacultyHomeController;
use App\Http\Controllers\Faculty\FacultyLoginController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexAController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexBController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexCController;
use App\Http\Controllers\Faculty\FacultyOrgAcctManagementController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\FacultyMiddleware;
use App\Http\Middleware\GuestFacultyMiddleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\preeval\AnnexAController;
use App\Http\Controllers\preeval\AnnexBController;
use App\Http\Controllers\preeval\AnnexCController;
use App\Http\Controllers\preeval\GeneratePDFController;

// GUEST Routes
Route::get('/', function () {
    return view('/guest/welcome');
});

Route::get('/In-Campus!', function () {
    return view('/guest/incampusg');
});

// Faculty routes
Route::prefix('faculty')->name('faculty.')->group(function () {
    Route::middleware([GuestFacultyMiddleware::class])->group(function () {
        Route::get('/login', [FacultyLoginController::class, 'index']);
        Route::post('/login', [FacultyLoginController::class, 'login'])->name('login');
    });

    Route::middleware(['auth', FacultyMiddleware::class])->group(function () {
        Route::get('/home', [FacultyHomeController::class, 'index'])->name('home');
        

        Route::get('/FRA-Evaluation', function () {
            return view('/faculty/auth/fraeval/fra-evaluation'); // Create this view
        })->name('fra.evaluation');

        // New Routes for Evaluation Activities
        Route::get('/FRA-A-Evaluation', [FacultyFRAAnnexAController::class, 'index'])->name('fra-a-evaluation.index');
        Route::get('/FRA-A-Evaluation/{id}', [FacultyFRAAnnexAController::class, 'show'])->name('fra-a-evaluation.show');
        Route::get('/Dashboard-Admin', [FacultyFRAAnnexAController::class, 'sidenotif'])->name('dbadmin');
        Route::get('faculty/fraannexa/{id}', [FacultyFRAAnnexAController::class, 'show'])->name('faculty.fraannexa.show');

        Route::get('/FRA-B-Evaluation', [FacultyFRAAnnexBController::class, 'index'])->name('fra-b-evaluation.index');
        Route::get('/FRA-B-Evaluation/{id}', [FacultyFRAAnnexBController::class, 'show'])->name('fra-b-evaluation.show');

        
        Route::get('/FRA-C-Evaluation', [FacultyFRAAnnexCController::class, 'index'])->name('fra-c-evaluation.index');
        Route::get('/FRA-C-Evaluation/{id}', [FacultyFRAAnnexCController::class, 'show'])->name('fra-c-evaluation.show');

        Route::get('/In-Campus-Evaluation', function () {
            return view('/faculty/auth/incampus-evaluation'); // Create this view
        })->name('incampus.evaluation');

        Route::get('/Off-Campus-Evaluation', function () {
            return view('/faculty/auth/offcampus-evaluation'); // Create this view
        })->name('offcampus.evaluation');

        
        Route::get('/Organization-Account-Management', function() {
            return view('/faculty/auth/oam');
        })->name('dbadmin1');
        Route::get('/Application-Admin', function() {
            return view('/faculty/auth/applicationadmin');
        })->name('dbadmin2');
        Route::get('/Post-Report', function() {
            return view('/faculty/auth/postreport');
        })->name('dbadmin3');
        Route::get('/Pre-Evaluation-Status', function() {
            return view('/faculty/auth/preevalstatus');
        })->name('dbadmin4');
        Route::get('/Manage-Post', function() {
            return view('/faculty/auth/managepost');
        })->name('dbadmin5');

        Route::get('/Organization-Account-Management', [FacultyOrgAcctManagementController::class, 'index'])->name('orgs.index');
        Route::get('/Organization-Account-Management/edit/{id}', [FacultyOrgAcctManagementController::class, 'edit'])->name('orgs.edit');
        Route::put('/Organization-Account-Management/update/{id}', [FacultyOrgAcctManagementController::class, 'update'])->name('orgs.update');
        Route::get('/Organization-Account-Management/remove/{id}', [FacultyOrgAcctManagementController::class, 'remove'])->name('orgs.remove');
    });
});

// Auth routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Homepage')->middleware(UserMiddleware::class);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'orgLogin'])->name('login');

// Organization routes
Route::middleware(['auth'])->group(function () {
    Route::get('/Homepage', function () {
        return view('/org/auth/sidebar/homepage');
    });

    Route::get('/Application', function () {
        return view('/org/auth/sidebar/application');
    });

    Route::get('/test', function () {
        return view('test');
    });

    Route::get('/Dashboard', function () {
        return view('/org/auth/sidebar/dborg');
    });

    Route::get('/Download', function () {
        return view('/org/auth/sidebar/download');
    });

    Route::get('/Pre-Evaluation', function () {
        return view('/org/auth/sidebar/preeval');
    });

    Route::get('/Pre-Evaluation-PDF', [GeneratePDFController::class, 'index']);
    Route::get('/generate-pdf/{id}', [GeneratePDFController::class, 'generatePDF'])->name('generate-pdf');


    Route::get('/In-Campus', function () {
        return view('/org/auth/sidebar/incampus');
    });

    Route::prefix('FRA')->name('fra.')->group(function () {
        Route::get('/Annex-A', function () {
            return view('/org/auth/sidebar/fraeval/annex-a');
        })->name('fra.annex-a');
    
        Route::get('/Annex-B', function () {
            return view('/org/auth/sidebar/fraeval/annex-b');
        })->name('fra.annex-b');
    
        Route::get('/Annex-C', function () {
            return view('/org/auth/sidebar/fraeval/annex-c');
        })->name('fra.annex-c');
    });

    Route::prefix('Off-Campus')->name('offcampus.')->group(function () {
        Route::get('/Annex-A', function () {
            return view('/org/auth/sidebar/offcampus/annex-a');
        })->name('offcampus.annex-a');
    
        Route::get('/Annex-B', function () {
            return view('/org/auth/sidebar/offcampus/annex-b');
        })->name('offcampus.annex-b');
        
        Route::get('/Annex-C', function () {
            return view('/org/auth/sidebar/offcampus/annex-c');
        })->name('offcampus.annex-c');
        
        Route::get('/Annex-D', function () {
            return view('/org/auth/sidebar/offcampus/annex-d');
        })->name('offcampus.annex-d');
        
        Route::get('/Annex-E', function () {
            return view('/org/auth/sidebar/offcampus/annex-e');
        })->name('offcampus.annex-e');
        
        Route::get('/Annex-F', function () {
            return view('/org/auth/sidebar/offcampus/annex-f');
        })->name('offcampus.annex-f');
        
        Route::get('/Annex-G', function () {
            return view('/org/auth/sidebar/offcampus/annex-g');
        })->name('offcampus.annex-g');
        
        Route::get('/Annex-H', function () {
            return view('/org/auth/sidebar/offcampus/annex-h');
        })->name('offcampus.annex-h');
        
    });
    

    // Fund-Raising routes
    Route::get('/Fund-Raising', function () {
        return view('/org/auth/sidebar/preevalfra');
    })->name('org.auth.sidebar.preevalfra');

    Route::get('/Off-Campus-Activity', function () {
        return view('/org/auth/sidebar/preevaloffcamp');
    })->name('org.auth.sidebar.preevaloffcamp');

    Route::post('/annex-a', [AnnexAController::class, 'store'])->name('annexa.submit');
    Route::post('/annex-b', [AnnexBController::class, 'store'])->name('annexb.submit');
    Route::post('/annex-c', [AnnexCController::class, 'store'])->name('annexc.submit');

    // Other routes related to pre-evaluation status and documents

    // Account Settings routes
    Route::get('/Account-Settings', [AccountSettingsController::class, 'index'])->name('accset');
    Route::post('/Account-Settings', [AccountSettingsController::class, 'update'])->name('accset.update');
});
