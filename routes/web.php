<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\Faculty\FacultyHomeController;
use App\Http\Controllers\Faculty\FacultyLoginController;
use App\Http\Controllers\preeval\FRAController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\FacultyMiddleware;
use App\Http\Middleware\GuestFacultyMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AnnexAController;
use App\Http\Controllers\AnnexBController;

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
        
        // New Routes for Evaluation Activities
        Route::get('/FRA-Evaluation', function () {
            return view('/faculty/auth/fra-evaluation'); // Create this view
        })->name('fra.evaluation');

        Route::get('/In-Campus-Evaluation', function () {
            return view('/faculty/auth/incampus-evaluation'); // Create this view
        })->name('incampus.evaluation');

        Route::get('/Off-Campus-Evaluation', function () {
            return view('/faculty/auth/offcampus-evaluation'); // Create this view
        })->name('offcampus.evaluation');

        Route::get('/Dashboard-Admin', function() {
            return view('/faculty/auth/dbadmin');
        })->name('dbadmin');
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
    });
});

// Auth routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Homepage')->middleware(UserMiddleware::class);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'orgLogin'])->name('login');

// Organization routes
Route::middleware(['auth'])->group(function () {
    Route::get('/Homepage', function () {
        return view('/org/auth/homepage');
    });

    Route::get('/Application', function () {
        return view('/org/auth/application');
    });

    Route::get('/test', function () {
        return view('test');
    });

    Route::get('/Dashboard', function () {
        return view('/org/auth/dborg');
    });

    Route::get('/Download', function () {
        return view('/org/auth/download');
    });

    Route::get('/Pre-Evaluation', function () {
        return view('/org/auth/preeval');
    });

    Route::get('/In-Campus', function () {
        return view('/org/auth/incampus');
    });

    Route::get('/Annex-A', function () {
        return view('/org/auth/fraeval/annex-a');
    });

    Route::get('/Annex-B', function () {
        return view('/org/auth/fraeval/annex-b');
    });

    // Fund-Raising routes
    Route::get('/Fund-Raising', function () {
        return view('/org/auth/preevalfra');
    })->name('org.auth.preevalfra');

    Route::post('/Fund-Raising', [AnnexAController::class, 'store'])->name('fund-raising.store');

    // Other routes related to pre-evaluation status and documents

    // Account Settings routes
    Route::get('/Account-Settings', [AccountSettingsController::class, 'index'])->name('accset');
    Route::post('/Account-Settings', [AccountSettingsController::class, 'update'])->name('accset.update');
});
