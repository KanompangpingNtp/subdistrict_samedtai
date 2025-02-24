<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProcurementResultsController;
use App\Http\Controllers\AveragePriceController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ShowDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckinSpotController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\performance_results\AdminPerformanceReportController;
use App\Http\Controllers\performance_results\PerformanceReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages.home.app');
// })->name('home_index');

Route::get('/admin', function () {
    return view('admin.layout.layout');
});

Route::get('/', [ShowDataController::class, 'HomeIndex'])->name('HomeIndex');
Route::get('/ShowDataButton/page', [ShowDataController::class, 'ShowDataButton'])->name('ShowDataButton');

//ประชาสัมพันธ์
Route::get('/PressRelease/ShowData', [PressReleaseController::class, 'PressReleaseShowData'])->name('PressReleaseShowData');
Route::get('/PressRelease/ShowDetails/{id}', [PressReleaseController::class, 'PressReleaseShowDetails'])->name('PressReleaseShowDetails');

//กิจกรรม
Route::get('/Activity/ShowData', [ActivityController::class, 'ActivityShowData'])->name('ActivityShowData');
Route::get('/Activity/ShowDetails/{id}', [ActivityController::class, 'ActivityShowDetails'])->name('ActivityShowDetails');

//จุดเช็คอินกินเที่ยว
Route::get('/Checkin/ShowData', [CheckinSpotController::class, 'CheckinSpotShowData'])->name('CheckinSpotShowData');
Route::get('/Checkin/ShowDetails/{id}', [CheckinSpotController::class, 'CheckinSpotShowDetails'])->name('CheckinSpotShowDetails');

//ป้ายประกาศ
Route::get('/NoticeBoard/ShowData', [NoticeBoardController::class, 'NoticeBoardShowData'])->name('NoticeBoardShowData');
Route::get('/NoticeBoard/ShowDetails/{id}', [NoticeBoardController::class, 'NoticeBoardShowDetails'])->name('NoticeBoardShowDetails');

Route::middleware(['check.auth'])->group(function () {
    //admin PressRelease
    Route::get('/PressRelease/page', [PressReleaseController::class, 'PressReleaseHome'])->name('PressReleaseHome');
    Route::post('/PressRelease/create', [PressReleaseController::class, 'PressReleaseCreate'])->name('PressReleaseCreate');
    Route::delete('/PressRelease/delete{id}', [PressReleaseController::class, 'PressReleaseDelete'])->name('PressReleaseDelete');
    Route::put('/PressRelease/update/{id}', [PressReleaseController::class, 'PressReleaseUpdate'])->name('PressReleaseUpdate');
    Route::put('/PressRelease/{id}/updatefile', [PressReleaseController::class, 'updateFile'])->name('updateFile');

    //admin Activity
    Route::get('/Activity/page', [ActivityController::class, 'ActivityHome'])->name('ActivityHome');
    Route::post('/Activity/create', [ActivityController::class, 'ActivityCreate'])->name('ActivityCreate');
    Route::delete('/Activity/delete{id}', [ActivityController::class, 'ActivityDelete'])->name('ActivityDelete');
    Route::put('/Activity/update/{id}', [ActivityController::class, 'ActivityUpdate'])->name('ActivityUpdate');

    //admin Procurement
    Route::get('/Procurement/page', [ProcurementController::class, 'ProcurementHome'])->name('ProcurementHome');
    Route::post('/Procurement/create', [ProcurementController::class, 'ProcurementCreate'])->name('ProcurementCreate');
    Route::delete('/Procurement/delete{id}', [ProcurementController::class, 'ProcurementDelete'])->name('ProcurementDelete');
    Route::put('/procurement/update/{id}', [ProcurementController::class, 'ProcurementUpdate'])->name('ProcurementUpdate');

    //admin ProcurementResults
    Route::get('/ProcurementResults/page', [ProcurementResultsController::class, 'ProcurementResultsHome'])->name('ProcurementResultsHome');
    Route::post('/ProcurementResults/create', [ProcurementResultsController::class, 'ProcurementResultsCreate'])->name('ProcurementResultsCreate');
    Route::delete('/ProcurementResults/delete{id}', [ProcurementResultsController::class, 'ProcurementResultsDelete'])->name('ProcurementResultsDelete');
    Route::put('/ProcurementResults/update/{id}', [ProcurementResultsController::class, 'ProcurementResultsUpdate'])->name('ProcurementResultsUpdate');

    //admin AveragePrice
    Route::get('/AveragePrice/page', [AveragePriceController::class, 'AveragePriceHome'])->name('AveragePriceHome');
    Route::post('/AveragePrice/create', [AveragePriceController::class, 'AveragePriceCreate'])->name('AveragePriceCreate');
    Route::delete('/AveragePrice/delete{id}', [AveragePriceController::class, 'AveragePriceDelete'])->name('AveragePriceDelete');
    Route::put('/AveragePrice/update/{id}', [AveragePriceController::class, 'AveragePriceUpdate'])->name('AveragePriceUpdate');

    //admin Revenue
    Route::get('/Revenue/page', [RevenueController::class, 'RevenueHome'])->name('RevenueHome');
    Route::post('/Revenue/create', [RevenueController::class, 'RevenueCreate'])->name('RevenueCreate');
    Route::delete('/Revenue/delete{id}', [RevenueController::class, 'RevenueDelete'])->name('RevenueDelete');
    Route::put('/Revenue/update/{id}', [RevenueController::class, 'RevenueUpdate'])->name('RevenueUpdate');

    //admin CheckinSpot
    Route::get('/CheckinSpot/page', [CheckinSpotController::class, 'CheckinSpotHome'])->name('CheckinSpotHome');
    Route::post('/CheckinSpot/create', [CheckinSpotController::class, 'CheckinSpotCreate'])->name('CheckinSpotCreate');
    Route::delete('/CheckinSpot/delete{id}', [CheckinSpotController::class, 'CheckinSpotDelete'])->name('CheckinSpotDelete');

    //admin NoticeBoard
    Route::get('/NoticeBoard/page', [NoticeBoardController::class, 'NoticeBoardHome'])->name('NoticeBoardHome');
    Route::post('/NoticeBoard/create', [NoticeBoardController::class, 'NoticeBoardCreate'])->name('NoticeBoardCreate');
    Route::delete('/NoticeBoard/delete{id}', [NoticeBoardController::class, 'NoticeBoardDelete'])->name('NoticeBoardDelete');

    //PerformanceReport
    Route::get('/Admin/PerformanceReport/page', [AdminPerformanceReportController::class, 'PerformanceReportAdmin'])->name('PerformanceReportAdmin');
    Route::post('/Admin/PerformanceReport/create', [AdminPerformanceReportController::class, 'PerformanceReportCreate'])->name('PerformanceReportCreate');
    Route::put('/Admin/PerformanceReport/{id}/update', [AdminPerformanceReportController::class, 'PerformanceReportUpdate'])->name('PerformanceReportUpdate');
    Route::delete('/Admin/PerformanceReport/{id}/delete', [AdminPerformanceReportController::class, 'PerformanceReportDelete'])->name('PerformanceReportDelete');
    Route::get('/Admin/PerformanceReport/show/details/{id}', [AdminPerformanceReportController::class, 'PerformanceReportShowDertails'])->name('PerformanceReportShowDertails');
    Route::post('/Admin/PerformanceReport/details/{id}/create', [AdminPerformanceReportController::class, 'PerformanceReportDertailsCreate'])->name('PerformanceReportDertailsCreate');
    Route::put('/Admin/PerformanceReport/details/{id}/update', [AdminPerformanceReportController::class, 'PerformanceReportDertailsUpdate'])->name('PerformanceReportDertailsUpdate');
    Route::delete('/Admin/PerformanceReport/details/{id}/delete', [AdminPerformanceReportController::class, 'PerformanceReportDertailsDelete'])->name('PerformanceReportDertailsDelete');
    Route::get('/Admin/PerformanceReport/show/details/results/{id}', [AdminPerformanceReportController::class, 'PerformanceReportShowDertailResults'])->name('PerformanceReportShowDertailResults');
    Route::post('/Admin/PerformanceReport/details/{id}/create/results', [AdminPerformanceReportController::class, 'PerformanceReportDertailsCreateResults'])->name('PerformanceReportDertailsCreateResults');
    Route::delete('/Admin/PerformanceReport/details/{id}/results/delete', [AdminPerformanceReportController::class, 'PerformanceReportDertailsDeleteResults'])->name('PerformanceReportDertailsDeleteResults');
});

Route::get('/showLoginForm', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
