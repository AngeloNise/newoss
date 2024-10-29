<?php


use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\Faculty\FacultyHomeController;
use App\Http\Controllers\Faculty\FacultyLoginController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexAController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexBController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexCController;
use App\Http\Controllers\Faculty\FacultyOrgAcctManagementController;
use App\Http\Controllers\Faculty\secretformController;
use App\Http\Controllers\faculty\CreateApplicationController;

use App\Http\Controllers\Dean\DeanLoginController;
use App\Http\Controllers\Dean\DeanFRAAnnexAController;


use App\Http\Controllers\org\ApplicationHistoryController;
use App\Http\Controllers\org\AccountSettingsController;

use App\Http\Controllers\preeval\AnnexAController;
use App\Http\Controllers\preeval\AnnexBController;
use App\Http\Controllers\preeval\AnnexCController;
use App\Http\Controllers\preeval\GeneratePDFController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\FacultyMiddleware;
use App\Http\Middleware\FacultyDeanMiddleware;
use App\Http\Middleware\DeanMiddleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// GUEST Routes
Route::get('/', function () {
    return view('/guest/welcome');
});

Route::get('/In-Campus!', function () {
    $events = \App\Models\Event::where('category', 'In-Campus')->get(); // Fetch events
    return view('guest.incampusg', compact('events')); // Pass events to the view
});

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

// Faculty routes
Route::prefix('faculty')->name('faculty.')->group(function () {
    Route::middleware([FacultyDeanMiddleware::class])->group(function () {
        Route::get('/login', [FacultyLoginController::class, 'index']);
        Route::post('/login', [FacultyLoginController::class, 'login'])->name('login');
    });

    Route::middleware(['auth', FacultyMiddleware::class])->group(function () {
        Route::get('/home', [FacultyHomeController::class, 'index'])->name('home');

        Route::get('/secretform123', function () {
            return view('faculty.auth.secretform');
        })->name('secretform123');
        Route::post('/secretform123', [secretformController::class, 'store'])->name('secretform123.store');

        Route::get('/FRA-Evaluation', function () {
            return view('/faculty/auth/fraeval/fra-evaluation'); // Create this view
        })->name('fra.evaluation');

        Route::get('/Application/create', [CreateApplicationController::class, 'create'])->name('application.create');
        Route::post('/Application', [CreateApplicationController::class, 'store'])->name('application.store');
        Route::get('/Applications', [CreateApplicationController::class, 'index'])->name('applications.index');
        Route::get('/Applications/{id}', [CreateApplicationController::class, 'show'])->name('applications.show');
        Route::put('/Applications/{id}', [CreateApplicationController::class, 'update'])->name('application.update');
        Route::get('/application/admin', [CreateApplicationController::class, 'applicationAdmin'])->name('applicationadmin'); // Make sure this matches

        // New Routes for Evaluation Activities
        Route::get('/FRA-A-Evaluation', [FacultyFRAAnnexAController::class, 'index'])->name('fra-a-evaluation.index');
        Route::get('/FRA-A-Evaluation/{id}', [FacultyFRAAnnexAController::class, 'show'])->name('fra-a-evaluation.show');
        Route::put('/FRA-A-Evaluation/{id}/update-status', [FacultyFRAAnnexAController::class, 'updateStatus'])->name('fra-a-evaluation.update-status');
        Route::get('/FRA-A-Evaluation/{id}/suggestion', [FacultyFRAAnnexAController::class, 'suggestion'])->name('fra-a-evaluation.suggestion');
        Route::post('/FRA-A-Evaluation/{id}/suggestions', [FacultyFRAAnnexAController::class, 'storeSuggestion'])->name('fra-a-evaluation.store-suggestion');
        Route::put('/FRA-A-Evaluation/suggestions/{id}', [FacultyFRAAnnexAController::class, 'updateSuggestion'])->name('fra-a-evaluation.update-suggestion');



        Route::post('/FRA-A-Evaluation/{id}/suggestions', [FacultyFRAAnnexAController::class, 'storeSuggestion'])->name('fra-a-evaluation.store-suggestion');

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

Route::get('/dean/login', [DeanLoginController::class, 'index'])->name('dean.login');
Route::post('/dean/login', [DeanLoginController::class, 'login']);

Route::middleware(['auth', DeanMiddleware::class])->group(function () {
    Route::get('/dean/Homepage', function () {
        return view('dean.auth.homepage'); // Path to the dean homepage
    })->name('dean.homepage');
    
    Route::get('/dean/Pre-Evaluation-Forms', [DeanFRAAnnexAController::class, 'index'])->name('dean.fra-a-evaluation.index');
    Route::get('/dean/FRA-A-Evaluation/{id}', [DeanFRAAnnexAController::class, 'show'])->name('dean.fra-a-evaluation.show');
    Route::get('/dean/FRA-A-Evaluation/{id}/suggestion', [DeanFRAAnnexAController::class, 'suggestion'])->name('dean.fra-a-evaluation.suggestion');
    Route::post('/dean/FRA-A-Evaluation/{id}/suggestions', [DeanFRAAnnexAController::class, 'storeSuggestion'])->name('dean.fra-a-evaluation.store-suggestion');
    Route::put('/dean/FRA-A-Evaluation/suggestions/{id}', [DeanFRAAnnexAController::class, 'updateSuggestion'])->name('dean.fra-a-evaluation.update-suggestion');
    Route::put('/dean/FRA-A-Evaluation/{id}/update-status', [DeanFRAAnnexAController::class, 'updateStatus'])->name('dean.fra-a-evaluation.update-status');
    Route::get('/dean/Dashboard', [DeanFRAAnnexAController::class, 'sidenotif'])->name('dashboard');
});

Route::prefix('faculty')->name('faculty.')->middleware(['auth', FacultyMiddleware::class])->group(function () {
    Route::get('/auth/managepost', [EventController::class, 'adminIndex'])->name('managePost');

    Route::get('/events/create', [EventController::class, 'facultyCreate'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'facultyStore'])->name('events.store');
    Route::get('/events/edit/{id}', [EventController::class, 'facultyEdit'])->name('events.edit');
    Route::put('/events/update/{id}', [EventController::class, 'facultyUpdate'])->name('events.update');
    Route::delete('/events/destroy/{id}', [EventController::class, 'facultyDestroy'])->name('events.destroy');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Homepage')->middleware(UserMiddleware::class);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'orgLogin'])->name('login');

// Organization routes
Route::middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/Homepage', function () {
        return view('/org/auth/sidebar/homepage');
    });

    Route::get('/Application', function () {
        return view('/org/auth/sidebar/application');
    });

    Route::get('/test', function () {
        return view('test');
    });

    Route::get('/Download', function () {
        return view('/org/auth/sidebar/download');
    });

    Route::get('/Pre-Evaluation', function () {
        return view('/org/auth/sidebar/preeval');
    });

    Route::get('/Fund-Raising-History', [ApplicationHistoryController::class, 'frahistory'])->name('org.history.frahistory');
    Route::get('/In-Campus-History', [ApplicationHistoryController::class, 'icahistory'])->name('org.history.icahistory');
    Route::get('/Off-Campus-History', [ApplicationHistoryController::class, 'ocahistory'])->name('org.history.ocahistory');

    Route::get('/Pre-Evaluation-PDF', [GeneratePDFController::class, 'index']);
    Route::get('/generate-pdf/{id}', [GeneratePDFController::class, 'generatePDF'])->name('generate-pdf'); // Ensure this matches the usage
    Route::get('/download-pdf/{id}', [GeneratePDFController::class, 'downloadPDF'])->name('pdf.download');
    Route::get('/FRA-A-Evaluation/{id}', [GeneratePDFController::class, 'show'])->name('org.fra-a-evaluation.show');


    // Route for In-Campus Activity
    Route::get('/In-Campus', [EventController::class, 'showInCampus'])->name('events.incampus');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit'); 
    Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');

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
    Route::get('/Pre-Evaluation', function () {
        return view('/org/auth/sidebar/preeval');
    })->name('org.auth.sidebar.preeval');

    Route::get('/Off-Campus-Activity', function () {
        return view('/org/auth/sidebar/preevaloffcamp');
    })->name('org.auth.sidebar.preevaloffcamp');

    Route::post('/annex-a', [AnnexAController::class, 'store'])->name('annexa.submit');
    Route::get('/preevalfra/{id}/edit', [AnnexAController::class, 'edit'])->name('org.auth.sidebar.preevalfra.edit');
    Route::put('/annex-a/{id}', [AnnexAController::class, 'update'])->name('org.auth.sidebar.preevalfra.update');
    Route::post('/annex-b', [AnnexBController::class, 'store'])->name('annexb.submit');
    Route::post('/annex-c', [AnnexCController::class, 'store'])->name('annexc.submit');

    // Other routes related to pre-evaluation status and documents

    // Account Settings routes
    Route::get('/Account-Settings', [AccountSettingsController::class, 'index'])->name('accset');
    Route::post('/Account-Settings', [AccountSettingsController::class, 'update'])->name('accset.update');
});
