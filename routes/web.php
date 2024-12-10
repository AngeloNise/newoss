<?php


use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PreApprovalSubmissionController;
use App\Http\Controllers\AnnexDSubmissionController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\Faculty\FacultyHomeController;
use App\Http\Controllers\Faculty\FacultyLoginController;
use App\Http\Controllers\Faculty\FacultyFRAAnnexAController;
use App\Http\Controllers\Faculty\FacultyOrgAcctManagementController;
use App\Http\Controllers\Faculty\secretformController;
use App\Http\Controllers\Faculty\CreateApplicationController;
use App\Http\Controllers\Faculty\FacultyOffCampusAnnexAController;
use App\Http\Controllers\Faculty\FacultyOffCampusAnnexDController;
use App\Http\Controllers\Faculty\DashboardController;


use App\Http\Controllers\Dean\DeanLoginController;
use App\Http\Controllers\Dean\DeanFRAAnnexAController;


use App\Http\Controllers\org\ApplicationHistoryController;
use App\Http\Controllers\org\AccountSettingsController;

use App\Http\Controllers\preeval\AnnexAController;
use App\Http\Controllers\preeval\AnnexBController;
use App\Http\Controllers\preeval\AnnexCController;
use App\Http\Controllers\preeval\GeneratePDFController;
use App\Http\Controllers\preeval\OffCampusController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\FacultyMiddleware;
use App\Http\Middleware\FacultyDeanMiddleware;
use App\Http\Middleware\DeanMiddleware;
use App\Http\Middleware\ShareNotifications;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// GUEST Routes
Route::get('/', function () {
    return view('/guest/welcome');
});
Route::get('/In-Campus!', [EventController::class, 'showGuestInCampus'])->name('guest.incampus');
Route::get('/incampus', [EventController::class, 'showGuestInCampus'])->name('guest.auth.incampus');

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
        Route::post('/Application/create', [CreateApplicationController::class, 'store'])->name('application.store');
        Route::get('/Application-Admin', [CreateApplicationController::class, 'applicationAdmin'])->name('application.admin');

        Route::get('/Application', [CreateApplicationController::class, 'index'])->name('application.index');
        Route::get('/Applications/{id}', [CreateApplicationController::class, 'show'])->name('applications.show');
        
        Route::put('/Applications/{id}', [CreateApplicationController::class, 'update'])->name('application.update');
        Route::get('/Applications/{id}/comments', [CreateApplicationController::class, 'createComment'])->name('applications.comments.create');
        Route::post('/Applications/{id}/comments', [CreateApplicationController::class, 'storeComment'])->name('applications.comments.store');
       // Route::post('/Application', [CreateApplicationController::class, 'store'])->name('application.store');
        Route::get('/search/organizations', [CreateApplicationController::class, 'searchOrganizations'])->name('search.organizations');
        Route::get('/search/branches', [CreateApplicationController::class, 'searchBranches'])->name('search.branches');
        Route::get('/Application-Admin/pdf', [CreateApplicationController::class, 'generateApplicationsPDF'])->name('application-admin.pdf');
        Route::get('/Generate-Report', [CreateApplicationController::class, 'showPdfOptions'])->name('Generate-Report.pdf');
        Route::get('/Application-Admin/generate-pdf', [CreateApplicationController::class, 'generateApplicationsPDF'])->name('application-admin.generate-pdf');
        Route::get('/Application-Admin/generate-pdf/in-campus', [CreateApplicationController::class, 'generateInCampusPDF'])->name('application-admin.generate-pdf.in-campus');
        Route::get('/Application-Admin/generate-pdf/off-campus', [CreateApplicationController::class, 'generateOffCampusPDF'])->name('application-admin.generate-pdf.off-campus');
        Route::get('/Application-Admin/generate-pdf/fund-raising', [CreateApplicationController::class, 'generateFundRaisingPDF'])->name('application-admin.generate-pdf.fund-raising');
        

        
        // New Routes for Evaluation Activities
        Route::get('/FRA-A-Evaluation', [FacultyFRAAnnexAController::class, 'index'])->name('fra-a-evaluation.index');
        Route::get('/FRA-A-Evaluation/{id}', [FacultyFRAAnnexAController::class, 'show'])->name('fra-a-evaluation.show');
        Route::put('/FRA-A-Evaluation/{id}/update-status', [FacultyFRAAnnexAController::class, 'updateStatus'])->name('fra-a-evaluation.update-status');
        Route::get('/FRA-A-Evaluation/{id}/suggestion', [FacultyFRAAnnexAController::class, 'suggestion'])->name('fra-a-evaluation.suggestion');
        Route::post('/FRA-A-Evaluation/{id}/suggestions', [FacultyFRAAnnexAController::class, 'storeSuggestion'])->name('fra-a-evaluation.store-suggestion');
        Route::put('/FRA-A-Evaluation/suggestions/{id}', [FacultyFRAAnnexAController::class, 'updateSuggestion'])->name('fra-a-evaluation.update-suggestion');
        Route::get('/search/organization', [FacultyFRAAnnexAController::class, 'searchOrganization'])->name('search.organization');


        Route::post('/FRA-A-Evaluation/{id}/suggestions', [FacultyFRAAnnexAController::class, 'storeSuggestion'])->name('fra-a-evaluation.store-suggestion');

        //Route::get('/Dashboard-Admin', [FacultyFRAAnnexAController::class, 'sidenotif'])->name('dbadmin');
        Route::get('faculty/fraannexa/{id}', [FacultyFRAAnnexAController::class, 'show'])->name('faculty.fraannexa.show');

        Route::get('/Dashboard-Admin', [DashboardController::class, 'index'])->name('dbadmin');

        Route::get('/In-Campus-Evaluation', function () {
            return view('/faculty/auth/incampus-evaluation'); // Create this view
        })->name('incampus.evaluation');

        Route::get('/Off-Campus-Evaluation', [FacultyOffCampusAnnexAController::class, 'index'])->name('offcampus.evaluation');

        Route::get('/offcampuseval/offcampusannexa', [FacultyOffCampusAnnexAController::class, 'index'])
        ->name('auth.offcampuseval.offcampusannexa');

        // Route to list all submissions for faculty
        Route::get('/offcampus-annex-a', [FacultyOffCampusAnnexAController::class, 'index'])->name('offcampus.annex.a.index');

        // Route to show details of a specific submission
        Route::get('/offcampus-annex-a/{id}', [FacultyOffCampusAnnexAController::class, 'show'])->name('offcampus.annex.a.show');

        Route::get('/faculty/offcampus-annex-a/{id}/download/{attachmentNumber}', [FacultyOffCampusAnnexAController::class, 'downloadAttachment'])
        ->name('faculty.offcampus.annex.a.download');

        Route::put('/faculty/offcampus/status/update/{id}', [FacultyOffCampusAnnexAController::class, 'updateStatus'])->name('faculty.offcampus.status.update');

        Route::put('/offcampus/annex-a/{id}/update-status', [FacultyOffCampusAnnexAController::class, 'updateStatus'])->name('faculty.offcampus.annex-a.update-status');
        Route::get('/offcampus/annex-a/{id}/evaluate', [FacultyOffCampusAnnexAController::class, 'evaluate'])->name('faculty.offcampus.annex-a.evaluate');
        Route::post('/offcampus/annex-a/{id}/evaluate', [FacultyOffCampusAnnexAController::class, 'storeEvaluation'])->name('faculty.offcampus.annex-a.store-evaluation');

        //Annex D
        Route::get('/offcampuseval/offcampusannexd', [FacultyOffCampusAnnexDController::class, 'index'])
        ->name('auth.offcampuseval.offcampusannexd');

        // Route to list all submissions for faculty
        Route::get('/offcampus-annex-d', [FacultyOffCampusAnnexDController::class, 'index'])->name('offcampus.annex.d.index');

        // Route to show details of a specific submission
        Route::get('/offcampus-annex-d/{id}', [FacultyOffCampusAnnexDController::class, 'show'])->name('offcampus.annex.d.show');

        Route::get('/faculty/offcampus-annex-d/{id}/download/{attachmentNumber}', [FacultyOffCampusAnnexDController::class, 'downloadAttachment'])
        ->name('faculty.offcampus.annex.d.download');   
        
        Route::get('/Organization-Account-Management', [FacultyOrgAcctManagementController::class, 'index'])->name('orgs.index');
        Route::get('/orgs/create', [FacultyOrgAcctManagementController::class, 'create'])->name('orgs.create');
        Route::post('/orgs', [FacultyOrgAcctManagementController::class, 'store'])->name('orgs.store');


        Route::get('/Post-Report', function() {
            return view('/faculty/auth/postreport');
        })->name('dbadmin2');

        Route::get('/Post-Activity-FRA', [CreateApplicationController::class, 'showApprovedApplications'])->name('post-activity-fra');
        Route::put('/application/{id}/update-frapost', [CreateApplicationController::class, 'updateFrapost'])->name('updateFrapost');
        // In web.php
        Route::get('/application/frapost', [CreateApplicationController::class, 'showApprovedApplications'])->name('application.frapost');


        
        Route::get('/Pre-Evaluation-Status', function() {
            return view('/faculty/auth/preevalstatus');
        })->name('dbadmin4');


        Route::get('/Faculty-Manage-Post', [EventController::class, 'adminIndex'])->name('managepost');

        Route::get('/Organization-Account-Management/edit/{id}', [FacultyOrgAcctManagementController::class, 'edit'])->name('orgs.edit');
        Route::put('/Organization-Account-Management/update/{id}', [FacultyOrgAcctManagementController::class, 'update'])->name('orgs.update');
        Route::get('/Organization-Account-Management/remove/{id}', [FacultyOrgAcctManagementController::class, 'remove'])->name('orgs.remove');

        //Off-Campus download
        Route::get('/annex-a/{id}/download/{attachmentNumber}', [PreApprovalSubmissionController::class, 'viewAttachment'])->name('preApproval.download');
    });
});

Route::put('/organizations/{id}/update-status', [EventController::class, 'updateStatus'])->name('faculty.updateStatus');
Route::put('/organizations/{id}/update-remarks', [EventController::class, 'updateRemarks'])->name('faculty.updateRemarks');

Route::prefix('faculty')->name('faculty.')->middleware(['auth', FacultyMiddleware::class])->group(function () {
    Route::get('/managepost', [EventController::class, 'adminIndex'])->name('managePost');
    Route::delete('/events/destroy/{id}', [EventController::class, 'facultyDestroy'])->name('events.destroy');
});

Route::get('/faculty/preApproval/download/{id}/{attachmentNumber}', [PreApprovalSubmissionController::class, 'viewAttachment'])->name('faculty.preApproval.download');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('org.history.homepage')->middleware(UserMiddleware::class);
Route::get('/login', [LoginController::class, 'orgLogin'])->name('login');


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

    Route::get('/Submitted-Forms', function () {
        return view('/org/auth/sidebar/submittedforms');
    });

    Route::get('/Fund-Raising-History', [ApplicationHistoryController::class, 'frahistory'])->name('org.history.frahistory');
    Route::get('Fund-Raising-History/applications/{id}/comments', [CreateApplicationController::class, 'showComments'])->name('fundraising.comments');

    Route::get('/In-Campus-History', [ApplicationHistoryController::class, 'icahistory'])->name('org.history.icahistory');
    Route::get('/Off-Campus-History', [ApplicationHistoryController::class, 'ocahistory'])->name('org.history.ocahistory');

    //Route::get('/Pre-Evaluation-PDF', [GeneratePDFController::class, 'index']);
    Route::get('/offcampus-annex-a/{id}', [FacultyOffCampusAnnexAController::class, 'show'])->name('offcampus.annex.a.show');
    Route::get('/generate-pdf/{id}', [GeneratePDFController::class, 'generatePDF'])->name('generate-pdf'); // Ensure this matches the usage
    Route::get('/download-pdf/{id}', [GeneratePDFController::class, 'downloadPDF'])->name('pdf.download');
    Route::get('/FRA-A-Evaluation/{id}', [GeneratePDFController::class, 'show'])->name('org.fra-a-evaluation.show');
    Route::get('/pre-eval-pdf', [GeneratePDFController::class, 'showPreEvalPDF'])->name('pre-eval-pdf');


    // Route for In-Campus Activity
    Route::get('/Events', [EventController::class, 'showInCampus'])->name('events.incampus');
    Route::get('/Events/incampus', [EventController::class, 'showInCampus'])->name('org.auth.incampus');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/edit/{id}', [EventController::class, 'update'])->name('events.update');    
    Route::delete('/events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/manage', [EventController::class, 'manageEvents'])->name('events.manage');


    Route::prefix('FRA')->name('fra.')->group(function () {
        Route::get('/Annex-A', function () {
            return view('/org/auth/sidebar/fraeval/annex-a');
        })->name('fra.annex-a');
    });

    Route::prefix('Off-Campus')->group(function () {
        Route::get('/Annex-A', function () {
            return view('org.auth.sidebar.offcampus.annex-a');
        })->name('org.auth.sidebar.annex-a');
    
        // Route for displaying the form
        Route::get('/annex-a', [PreApprovalSubmissionController::class, 'showForm'])->name('org.auth.sidebar.annex.a.form');
    
        // Route for submitting the form
        Route::post('/annex-a', [PreApprovalSubmissionController::class, 'submitForm'])->name('org.auth.sidebar.annex.a.submit');
    
        Route::get('/Annex-D', function () {
            return view('org.auth.sidebar.offcampus.annex-d');
        })->name('org.auth.sidebar.annex-d');        
        Route::get('/annex-d', [AnnexDSubmissionController::class, 'showForm'])->name('org.auth.sidebar.annex.d.form');

        Route::post('/annex-d', [AnnexDSubmissionController::class, 'submitForm'])->name('org.auth.sidebar.annex.d.submit');
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

    Route::get('/Fund-Raising-SF', [GeneratePDFController::class, 'index']);

    Route::get('/Off-Campus-Activity-SF', [OffCampusController::class, 'index']);
	
    Route::get('/user/offcampus-evaluation-detail/{id}', [PreApprovalSubmissionController::class, 'showForUser'])
        ->name('user.offcampus.evaluation.detail');
    Route::get('/offcampus/detail/{id}', [PreApprovalSubmissionController::class, 'showForUser'])->name('org.auth.sidebar.offcampus.detail');
    // Route for Off-Campus Edit
    Route::get('/offcampus-annex-a/edit/{id}', [PreApprovalSubmissionController::class, 'edit'])
        ->name('org.auth.sidebar.offcampus.edit');
    Route::put('/offcampus-annex-a/update/{id}', [PreApprovalSubmissionController::class, 'update'])
        ->name('org.auth.sidebar.offcampus.update');
    // Account Settings routes
    Route::get('/Account-Settings', [AccountSettingsController::class, 'index'])->name('accset');
    Route::post('/Account-Settings', [AccountSettingsController::class, 'update'])->name('accset.update');
});