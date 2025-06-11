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
use App\Http\Controllers\performance_results\AdminPerformanceResultsController;
use App\Http\Controllers\performance_results\PerformanceResultsController;
use App\Http\Controllers\operational_plan\AdminOperationalPlanController;
use App\Http\Controllers\operational_plan\OperationalPlanController;
use App\Http\Controllers\laws_and_regulations\AdminLawsAndRegulationsController;
use App\Http\Controllers\laws_and_regulations\LawsAndRegulationsController;
use App\Http\Controllers\authority\AdminAuthorityController;
use App\Http\Controllers\authority\AuthorityController;
use App\Http\Controllers\agency\ManagePersonnelController;
use App\Http\Controllers\agency\PersonnelAgencyController;
use App\Http\Controllers\ITA\AdminITAController;
use App\Http\Controllers\ITA\ITAController;
use App\Http\Controllers\menu_for_public\AdminMenuForPublicController;
use App\Http\Controllers\menu_for_public\MenuForPublicController;
use App\Http\Controllers\TreasuryAnnouncementController;
use App\Http\Controllers\web_intro\AdminWebIntroController;
use App\Http\Controllers\web_intro\WebIntroController;
use App\Http\Controllers\basic_information\history\AdminHistoryController;
use App\Http\Controllers\basic_information\history\HistoryController;
use App\Http\Controllers\basic_information\general_information\AdminGeneralInformationController;
use App\Http\Controllers\basic_information\general_information\GeneralInformationController;
use App\Http\Controllers\basic_information\landscape_gallery\AdminLandscapeGalleryController;
use App\Http\Controllers\basic_information\landscape_gallery\LandscapeGalleryController;
use App\Http\Controllers\basic_information\community_products\AdminCommunityProductsController;
use App\Http\Controllers\basic_information\community_products\CommunityProductsController;
use App\Http\Controllers\basic_information\important_places\AdminImportantPlacesController;
use App\Http\Controllers\basic_information\important_places\ImportantPlacesController;

use App\Http\Controllers\eservice\TestController;
use App\Http\Controllers\eservice\TemporaryController;
use App\Http\Controllers\eservice\health_hazard_applications\HealthHazardApplicationController;
use App\Http\Controllers\eservice\health_hazard_applications\AdminHealthHazardApplicationController;
use App\Http\Controllers\eservice\food_storage_license\FoodStorageLicenseController;
use App\Http\Controllers\eservice\food_storage_license\AdminFoodStorageLicenseController;
use App\Http\Controllers\eservice\building_modification\BuildingChangeController;
use App\Http\Controllers\eservice\building_modification\AdminBuildingChangeController;
use App\Http\Controllers\eservice\construction_certification\ConstructionController;
use App\Http\Controllers\eservice\construction_certification\AdminConstructionController;
use App\Http\Controllers\eservice\commercial_registration\TradeRegistryController;
use App\Http\Controllers\eservice\commercial_registration\AdminTradeRegistryController;
use App\Http\Controllers\eservice\general_requests\GeneralRequestsController;
use App\Http\Controllers\eservice\general_requests\AdminGeneralRequestsController;
use App\Http\Controllers\eservice\elderly_allowance\ElderlyAllowanceController;
use App\Http\Controllers\eservice\elderly_allowance\AdminElderlyAllowanceController;
use App\Http\Controllers\eservice\disability\DisabilityController;
use App\Http\Controllers\eservice\disability\AdminDisabilityController;
use App\Http\Controllers\eservice\receive_assistance\ReceiveAssistanceController;
use App\Http\Controllers\eservice\receive_assistance\AdminReceiveAssistanceController;
use App\Http\Controllers\eservice\trash_bin_requests\TrashBinRequestController;
use App\Http\Controllers\eservice\trash_bin_requests\AdminTrashBinRequestController;

use App\Http\Controllers\forum\ForumController;
use App\Http\Controllers\forum\AdminForumController;
use App\Http\Controllers\evaluation_questions\EvaluationQuestionsController;
use App\Http\Controllers\evaluation_questions\AdminEvaluationQuestionsController;

use App\Http\Controllers\VisitorsController;

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
//แบบสอบถาม
Route::get('/evaluation_questions/page', [EvaluationQuestionsController::class, 'QuestionsPage'])->name('QuestionsPage');
Route::post('/evaluation_questions/create', [EvaluationQuestionsController::class, 'EvaluationQuestionsCreate'])->name('EvaluationQuestionsCreate');

//Forum
Route::get('/forum/pages', [ForumController::class, 'ForumPages'])->name('ForumPages');
Route::post('/forum/create/form', [ForumController::class, 'ForumFormCreate'])->name('ForumFormCreate');
Route::get('/forum/details/{id}', [ForumController::class, 'ForumDeatils'])->name('ForumDeatils');
Route::post('/forum/create/comments/{id}', [ForumController::class, 'ForumCommentsCreate'])->name('ForumCommentsCreate');

//eservice
Route::get('/eservice/form/page_data', [TemporaryController::class, 'page_data'])->name('page_data');

//รับเรื่องราวร้องทุกข์
Route::get('/ReceiveComplaints/form', [TestController::class, 'ReceiveComplaintsForm'])->name('ReceiveComplaintsForm');

//รับแจ้งร้องเรียนทุจริตประพฤติมิชอบ
Route::get('/Satisfaction/form', [TestController::class, 'SatisfactionForm'])->name('SatisfactionForm');

//ข้อมูลพื้นฐาน
Route::get('/history/page', [HistoryController::class, 'HistoryPage'])->name('HistoryPage');
Route::get('/general_information/page', [GeneralInformationController::class, 'GeneralInformationPage'])->name('GeneralInformationPage');
Route::get('/landscape_gallery/page', [LandscapeGalleryController::class, 'LandscapeGalleryPage'])->name('LandscapeGalleryPage');
Route::get('/CommunityProducts/page', [CommunityProductsController::class, 'CommunityProductsPage'])->name('CommunityProductsPage');
Route::get('/CommunityProducts/showdetails/index/{id}', [CommunityProductsController::class, 'ShowDetails'])->name('ShowDetails');
Route::get('/ImportantPlaces/page', [ImportantPlacesController::class, 'ImportantPlacesPage'])->name('ImportantPlacesPage');
Route::get('/ImportantPlaces/showdetails/index/{id}', [ImportantPlacesController::class, 'ImportantPlacesShowDetails'])->name('ImportantPlacesShowDetails');

// Route::get('/', function () {
//     return view('pages.home.app');
// })->name('home_index');

Route::get('/', [WebIntroController::class, 'WebIntroPage'])->name('WebIntroPage');
Route::get('/home', [ShowDataController::class, 'HomeIndex'])->name('HomeIndex');
Route::get('/contact', [ShowDataController::class, 'contact'])->name('contact');

//ผลการดำเนินงาน
Route::get('/PerformanceResults/show/section/{id}', [PerformanceResultsController::class, 'PerformanceResultsSectionPages'])->name('PerformanceResultsSectionPages');
Route::get('/PerformanceResults/show/section/topic/{id}', [PerformanceResultsController::class, 'PerfResultsSubTopicPages'])->name('PerfResultsSubTopicPages');
Route::get('/PerformanceResults/show/section/topic/details/{id}', [PerformanceResultsController::class, 'PerfResultsShowDetailsPages'])->name('PerfResultsShowDetailsPages');

//ita
Route::get('/ita/page', [ITAController::class, 'itaPage'])->name('itaPage');

//เมนูบุคลากร
Route::get('/personnel_chart', [PersonnelAgencyController::class, 'PersonnelChart'])->name('PersonnelChart');
Route::get('/agency/{id}', [PersonnelAgencyController::class, 'AgencyShow'])->name('AgencyShow');

//อำนาจหน้าที่
Route::get('/Authority/show/detail/{id}', [AuthorityController::class, 'AuthorityShowDetailsPages'])->name('AuthorityShowDetailsPages');

//แผนงานพัฒนาท้องถิ่น
Route::get('/OperationalPlan/show/section/{id}', [OperationalPlanController::class, 'OperationalPlanSectionPages'])->name('OperationalPlanSectionPages');
Route::get('/OperationalPlan/show/section/details/{id}', [OperationalPlanController::class, 'OperationalPlanShowDetailsPages'])->name('OperationalPlanShowDetailsPages');

//กฏหมายและกฏระเบียบ
Route::get('/LawsAndRegulations/show/section/{id}', [LawsAndRegulationsController::class, 'LawsAndRegulationsSectionPages'])->name('LawsAndRegulationsSectionPages');
Route::get('/LawsAndRegulations/show/section/details/{id}', [LawsAndRegulationsController::class, 'LawsAndRegulationsShowDetailsPages'])->name('LawsAndRegulationsShowDetailsPages');

//เมนูสำหรับประชาชน
Route::get('/MenuForPublic/show/section/{id}', [MenuForPublicController::class, 'MenuForPublicSectionPages'])->name('MenuForPublicSectionPages');
Route::get('/MenuForPublic/show/section/details/{id}', [MenuForPublicController::class, 'MenuForPublicShowDetailsPages'])->name('MenuForPublicShowDetailsPages');

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

//ประกาศของคลัง
Route::get('/TreasuryAnnouncement/ShowData', [TreasuryAnnouncementController::class, 'TreasuryAnnouncementData'])->name('TreasuryAnnouncementData');

//ประกาศจัดซื้อจัดจ้าง
Route::get('/procurement/detail/{id}', [ProcurementController::class, 'ProcurementDetail'])->name('ProcurementDetail');
Route::get('/procurement/ShowData', [ProcurementController::class, 'ProcurementShowData'])->name('ProcurementShowData');

//ผลจัดซื้อจัดจ้าง
Route::get('/procurement-results/detail/{id}', [ProcurementResultsController::class, 'ProcurementResultsDetail'])->name('ProcurementResultsDetail');
Route::get('/procurement-results/ShowData', [ProcurementResultsController::class, 'ProcurementResultsShowData'])->name('ProcurementResultsShowData');

//งานเก็บรายได้
Route::get('/revenue/detail/{id}', [RevenueController::class, 'RevenueDetail'])->name('RevenueDetail');
Route::get('/revenue/ShowData', [RevenueController::class, 'RevenueShowData'])->name('RevenueShowData');

//ประกาศราคากลาง
Route::get('/AveragePrice/detail/{id}', [AveragePriceController::class, 'AveragePriceDetail'])->name('AveragePriceDetail');
Route::get('/AveragePrice/ShowData', [AveragePriceController::class, 'AveragePriceShowData'])->name('AveragePriceShowData');

Route::middleware(['auth', 'check.auth:1'])->group(function () {
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

    //PerformanceResults
    Route::get('/Admin/PerformanceResults/page', [AdminPerformanceResultsController::class, 'PerformanceResultsType'])->name('PerformanceResultsType');
    Route::post('/Admin/PerformanceResults/create/name', [AdminPerformanceResultsController::class, 'PerformanceResultsTypeCreate'])->name('PerformanceResultsTypeCreate');
    Route::put('/Admin/PerformanceResults/{id}/update', [AdminPerformanceResultsController::class, 'PerformanceResultsUpdate'])->name('PerformanceResultsUpdate');
    Route::delete('/Admin/PerformanceResults/{id}/delete', [AdminPerformanceResultsController::class, 'PerformanceResultsDelete'])->name('PerformanceResultsDelete');

    Route::get('/Admin/PerformanceResults/show/section/{id}', [AdminPerformanceResultsController::class, 'PerformanceResultsShowSection'])->name('PerformanceResultsShowSection');
    Route::post('/Admin/PerformanceResults/show/section/create/{id}', [AdminPerformanceResultsController::class, 'PerformanceResultsSectionCreate'])->name('PerformanceResultsSectionCreate');
    Route::put('/Admin/PerformanceResults/show/section/update/{id}', [AdminPerformanceResultsController::class, 'PerformanceResultsSectionUpdate'])->name('PerformanceResultsSectionUpdate');
    Route::delete('/Admin/PerformanceResults/show/section/delete/{id}', [AdminPerformanceResultsController::class, 'PerformanceResultsSectionDelete'])->name('PerformanceResultsSectionDelete');

    Route::get('/Admin/PerformanceResults/show/section/topic/{id}', [AdminPerformanceResultsController::class, 'PerfResultsSubTopicShowSection'])->name('PerfResultsSubTopicShowSection');
    Route::post('/Admin/PerformanceResults/show/section/topic/create/{id}', [AdminPerformanceResultsController::class, 'PerfResultsSubTopicCreate'])->name('PerfResultsSubTopicCreate');
    Route::put('/Admin/PerformanceResults/show/section/topic/update/{id}', [AdminPerformanceResultsController::class, 'PerfResultsSubTopicUpdate'])->name('PerfResultsSubTopicUpdate');
    Route::delete('/Admin/PerformanceResults/show/section/topic/delete/{id}', [AdminPerformanceResultsController::class, 'PerfResultsSubTopicDelete'])->name('PerfResultsSubTopicDelete');

    Route::get('/Admin/PerformanceResults/show/section/topic/detail/{id}', [AdminPerformanceResultsController::class, 'PerfResultsShowDetails'])->name('PerfResultsShowDetails');
    Route::post('/Admin/PerformanceResults/show/section/topic/detail/create/{id}', [AdminPerformanceResultsController::class, 'PerfResultsDetailsCreate'])->name('PerfResultsDetailsCreate');
    Route::delete('/Admin/PerformanceResults/show/section/topic/detail/delete/{id}', [AdminPerformanceResultsController::class, 'PerfResultsDetailsDelete'])->name('PerfResultsDetailsDelete');

    //OperationalPlan
    Route::get('/Admin/OperationalPlan/page', [AdminOperationalPlanController::class, 'OperationalPlanType'])->name('OperationalPlanType');
    Route::post('/Admin/OperationalPlan/create/name', [AdminOperationalPlanController::class, 'OperationalPlanTypeCreate'])->name('OperationalPlanTypeCreate');
    Route::put('/Admin/OperationalPlan/{id}/update', [AdminOperationalPlanController::class, 'OperationalPlanUpdate'])->name('OperationalPlanUpdate');
    Route::delete('/Admin/OperationalPlan/{id}/delete', [AdminOperationalPlanController::class, 'OperationalPlanDelete'])->name('OperationalPlanDelete');

    Route::get('/Admin/OperationalPlan/show/section/{id}', [AdminOperationalPlanController::class, 'OperationalPlanShowSection'])->name('OperationalPlanShowSection');
    Route::post('/Admin/OperationalPlan/show/section/create/{id}', [AdminOperationalPlanController::class, 'OperationalPlanSectionCreate'])->name('OperationalPlanSectionCreate');
    Route::put('/Admin/OperationalPlan/show/section/update/{id}', [AdminOperationalPlanController::class, 'OperationalPlanSectionUpdate'])->name('OperationalPlanSectionUpdate');
    Route::delete('/Admin/OperationalPlan/show/section/delete/{id}', [AdminOperationalPlanController::class, 'OperationalPlanSectionDelete'])->name('OperationalPlanSectionDelete');

    Route::get('/Admin/OperationalPlan/show/section/detail/{id}', [AdminOperationalPlanController::class, 'OperationalPlanShowDetails'])->name('OperationalPlanShowDetails');
    Route::post('/Admin/OperationalPlan/show/section/detail/create/{id}', [AdminOperationalPlanController::class, 'OperationalPlanDetailCreate'])->name('OperationalPlanDetailCreate');
    Route::delete('/Admin/OperationalPlan/show/section/detail/delete/{id}', [AdminOperationalPlanController::class, 'OperationalPlanDetailDelete'])->name('OperationalPlanDetailDelete');

    //LawsAndRegulations
    Route::get('/Admin/LawsAndRegulations/page', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsType'])->name('LawsAndRegulationsType');
    Route::post('/Admin/LawsAndRegulations/create/name', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsTypeCreate'])->name('LawsAndRegulationsTypeCreate');
    Route::put('/Admin/LawsAndRegulations/{id}/update', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsUpdate'])->name('LawsAndRegulationsUpdate');
    Route::delete('/Admin/LawsAndRegulations/{id}/delete', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsDelete'])->name('LawsAndRegulationsDelete');

    Route::get('/Admin/LawsAndRegulations/show/section/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsShowSection'])->name('LawsAndRegulationsShowSection');
    Route::post('/Admin/LawsAndRegulations/show/section/create/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsSectionCreate'])->name('LawsAndRegulationsSectionCreate');
    Route::put('/Admin/LawsAndRegulations/show/section/update/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsSectionUpdate'])->name('LawsAndRegulationsSectionUpdate');
    Route::delete('/Admin/LawsAndRegulations/show/section/delete/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsSectionDelete'])->name('LawsAndRegulationsSectionDelete');

    Route::get('/Admin/LawsAndRegulations/show/section/detail/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsShowDetails'])->name('LawsAndRegulationsShowDetails');
    Route::post('/Admin/LawsAndRegulations/show/section/detail/create/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsDetailCreate'])->name('LawsAndRegulationsDetailCreate');
    Route::delete('/Admin/LawsAndRegulations/show/section/detail/delete/{id}', [AdminLawsAndRegulationsController::class, 'LawsAndRegulationsDetailDelete'])->name('LawsAndRegulationsDetailDelete');

    //authority
    Route::get('/Admin/authority/page', [AdminAuthorityController::class, 'AuthorityType'])->name('AuthorityType');
    Route::post('/Admin/authority/create/name', [AdminAuthorityController::class, 'AuthorityTypeCreate'])->name('AuthorityTypeCreate');
    Route::put('/Admin/authority/{id}/update', [AdminAuthorityController::class, 'AuthorityTypeUpdate'])->name('AuthorityTypeUpdate');
    Route::delete('/Admin/authority/{id}/delete', [AdminAuthorityController::class, 'AuthorityTypeDelete'])->name('AuthorityTypeDelete');
    Route::get('/Admin/authority/show/detail/{id}', [AdminAuthorityController::class, 'AuthorityShowDetail'])->name('AuthorityShowDetail');
    Route::post('/Admin/authority/show/detail/create/{id}', [AdminAuthorityController::class, 'AuthorityDetailCreate'])->name('AuthorityDetailCreate');
    Route::delete('/Admin/authority/show/detail/delete/{id}', [AdminAuthorityController::class, 'AuthorityDetailDelete'])->name('AuthorityDetailDelete');

    //admin ManagePersonnel
    Route::get('/Personnel/page', [ManagePersonnelController::class, 'ManagePersonnel'])->name('ManagePersonnel');
    Route::post('/Personnel/agency/create', [ManagePersonnelController::class, 'agencyCreate'])->name('agencyCreate');
    Route::put('/Personnel/agency/update/{id}', [ManagePersonnelController::class, 'agencyUpdate'])->name('agencyUpdate');
    Route::delete('/Personnel/agency/delete{id}', [ManagePersonnelController::class, 'agencyDelete'])->name('agencyDelete');

    Route::get('/PersonnelRankDetails/page/{id}', [ManagePersonnelController::class, 'PersonnelRankDetails'])->name('PersonnelRankDetails');
    Route::post('/Personnel/PersonnelRank/create/{id}', [ManagePersonnelController::class, 'PersonnelRankCreate'])->name('PersonnelRankCreate');
    Route::put('/Personnel/PersonnelRank/update/{id}', [ManagePersonnelController::class, 'PersonnelRankUpdate'])->name('PersonnelRankUpdate');
    Route::delete('/Personnel/PersonnelRank/delete{id}', [ManagePersonnelController::class, 'PersonnelRankDelete'])->name('PersonnelRankDelete');

    Route::get('/Personnel/PersonnelRank/PersonnelDetails/page/{id}', [ManagePersonnelController::class, 'PersonnelDetails'])->name('PersonnelDetails');
    Route::post('/Personnel/PersonnelRank/PersonnelDetails/create/{id}', [ManagePersonnelController::class, 'PersonnelDetailsCreate'])->name('PersonnelDetailsCreate');
    Route::put('/Personnel/PersonnelRank/PersonnelDetails/update/{id}', [ManagePersonnelController::class, 'PersonnelDetailsUpdate'])->name('PersonnelDetailsUpdate');
    Route::delete('/Personnel/PersonnelRank/PersonnelDetails/delete{id}', [ManagePersonnelController::class, 'PersonnelDetailsDelete'])->name('PersonnelDetailsDelete');

    Route::get('/PersonnelGroupPhotoPage/page/{id}', [ManagePersonnelController::class, 'PersonnelGroupPhotoPage'])->name('PersonnelGroupPhotoPage');
    Route::post('/PersonnelGroupPhotoPage/create/{id}', [ManagePersonnelController::class, 'PersonnelGroupPhotoCreate'])->name('PersonnelGroupPhotoCreate');
    Route::delete('/PersonnelGroupPhotoPage/delete{id}', [ManagePersonnelController::class, 'PersonnelGroupPhotoDelete'])->name('PersonnelGroupPhotoDelete');

    //ITA
    Route::get('/Admin/ITA/type/page', [AdminITAController::class, 'AdminITAType'])->name('AdminITAType');
    Route::post('/Admin/ITA/type/create', [AdminITAController::class, 'ITATypeCreate'])->name('ITATypeCreate');
    Route::put('/Admin/ITA/type/update/{id}', [AdminITAController::class, 'ITATypeUpdate'])->name('ITATypeUpdate');
    Route::delete('/Admin/ITA/type/delete/{id}', [AdminITAController::class, 'ITATypeDelete'])->name('ITATypeDelete');

    Route::get('/Admin/ITA/type/detail/page/{id}', [AdminITAController::class, 'AdminITA'])->name('AdminITA');
    Route::post('/Admin/ITA/create/{id}', [AdminITAController::class, 'ITACreate'])->name('ITACreate');
    Route::put('/Admin/ITA/update/{id}', [AdminITAController::class, 'ITAUpdate'])->name('ITAUpdate');
    Route::delete('/Admin/ITA/delete/{id}', [AdminITAController::class, 'ITADelete'])->name('ITADelete');
    Route::delete('iTALink/{id}', [AdminITAController::class, 'destroy'])->name('ITAlink.destroy');

    //MenuForPublic
    Route::get('/Admin/MenuForPublic/page', [AdminMenuForPublicController::class, 'MenuForPublicType'])->name('MenuForPublicType');
    Route::post('/Admin/MenuForPublic/create/name', [AdminMenuForPublicController::class, 'MenuForPublicTypeCreate'])->name('MenuForPublicTypeCreate');
    Route::put('/Admin/MenuForPublic/{id}/update', [AdminMenuForPublicController::class, 'MenuForPublicUpdate'])->name('MenuForPublicUpdate');
    Route::delete('/Admin/MenuForPublic/{id}/delete', [AdminMenuForPublicController::class, 'MenuForPublicDelete'])->name('MenuForPublicDelete');

    Route::get('/Admin/MenuForPublic/show/section/{id}', [AdminMenuForPublicController::class, 'MenuForPublicShowSection'])->name('MenuForPublicShowSection');
    Route::post('/Admin/MenuForPublic/show/section/create/{id}', [AdminMenuForPublicController::class, 'MenuForPublicSectionCreate'])->name('MenuForPublicSectionCreate');
    Route::put('/Admin/MenuForPublic/show/section/update/{id}', [AdminMenuForPublicController::class, 'MenuForPublicSectionUpdate'])->name('MenuForPublicSectionUpdate');
    Route::delete('/Admin/MenuForPublic/show/section/delete/{id}', [AdminMenuForPublicController::class, 'MenuForPublicSectionDelete'])->name('MenuForPublicSectionDelete');

    Route::get('/Admin/MenuForPublic/show/section/detail/{id}', [AdminMenuForPublicController::class, 'MenuForPublicShowDetails'])->name('MenuForPublicShowDetails');
    Route::post('/Admin/MenuForPublic/show/section/detail/create/{id}', [AdminMenuForPublicController::class, 'MenuForPublicDetailCreate'])->name('MenuForPublicDetailCreate');
    Route::delete('/Admin/MenuForPublic/show/section/detail/delete/{id}', [AdminMenuForPublicController::class, 'MenuForPublicDetailDelete'])->name('MenuForPublicDetailDelete');

    //WebIntro
    Route::get('/Admin/WebIntro/page', [AdminWebIntroController::class, 'AdminWebIntro'])->name('AdminWebIntro');
    Route::post('/Admin/WebIntro/create', [AdminWebIntroController::class, 'WebIntroCreate'])->name('WebIntroCreate');
    Route::delete('/Admin/WebIntro/delete/{id}', [AdminWebIntroController::class, 'WebIntroDelete'])->name('WebIntroDelete');

    //History
    Route::get('/Admin/History/page', [AdminHistoryController::class, 'HistoryAdmin'])->name('HistoryAdmin');
    Route::post('/Admin/History/create', [AdminHistoryController::class, 'HistoryCreate'])->name('HistoryCreate');
    Route::delete('/Admin/History/delete/{id}', [AdminHistoryController::class, 'HistoryDelete'])->name('HistoryDelete');

    //GeneralInformation
    Route::get('/Admin/GeneralInformation/page', [AdminGeneralInformationController::class, 'GeneralInformationAdmin'])->name('GeneralInformationAdmin');
    Route::post('/Admin/GeneralInformation/create', [AdminGeneralInformationController::class, 'GeneralInformationCreate'])->name('GeneralInformationCreate');
    Route::delete('/Admin/GeneralInformation/delete/{id}', [AdminGeneralInformationController::class, 'GeneralInformationDelete'])->name('GeneralInformationDelete');

    //LandscapeGallery
    Route::get('/Admin/LandscapeGallery/page', [AdminLandscapeGalleryController::class, 'LandscapeGalleryAdmin'])->name('LandscapeGalleryAdmin');
    Route::post('/Admin/LandscapeGallery/create', [AdminLandscapeGalleryController::class, 'LandscapeGalleryCreate'])->name('LandscapeGalleryCreate');
    Route::delete('/Admin/LandscapeGallery/delete/{id}', [AdminLandscapeGalleryController::class, 'LandscapeGalleryDelete'])->name('LandscapeGalleryDelete');

    //CommunityProducts
    Route::get('/Admin/CommunityProducts/page', [AdminCommunityProductsController::class, 'CommunityProductsAdmin'])->name('CommunityProductsAdmin');
    Route::post('/Admin/CommunityProducts/create/name', [AdminCommunityProductsController::class, 'CommunityProductsNameCreate'])->name('CommunityProductsNameCreate');
    Route::delete('/Admin/CommunityProducts/{id}/delete', [AdminCommunityProductsController::class, 'CommunityProductDelete'])->name('CommunityProductDelete');
    Route::post('/Admin/CommunityProducts/{id}/update', [AdminCommunityProductsController::class, 'CommunityProductsNameUpdate'])->name('CommunityProductsNameUpdate');
    Route::get('/Admin/CommunityProducts/show/details/{id}', [AdminCommunityProductsController::class, 'CommunityProductShowDertails'])->name('CommunityProductShowDertails');
    Route::post('/Admin/CommunityProducts/show/details/{id}/create', [AdminCommunityProductsController::class, 'CommunityProductDertailsCreate'])->name('CommunityProductDertailsCreate');
    Route::delete('/Admin/CommunityProducts/show/details/{id}/delete', [AdminCommunityProductsController::class, 'CommunityProductDetailsDelete'])->name('CommunityProductDetailsDelete');

    //ImportantPlaces
    Route::get('/Admin/ImportantPlaces/page', [AdminImportantPlacesController::class, 'ImportantPlacesAdmin'])->name('ImportantPlacesAdmin');
    Route::post('/Admin/ImportantPlaces/create/name', [AdminImportantPlacesController::class, 'ImportantPlacesNameCreate'])->name('ImportantPlacesNameCreate');
    Route::delete('/Admin/ImportantPlaces/{id}/delete', [AdminImportantPlacesController::class, 'ImportantPlacesDelete'])->name('ImportantPlacesDelete');
    Route::post('/Admin/ImportantPlaces/{id}/update', [AdminImportantPlacesController::class, 'ImportantPlacesNameUpdate'])->name('ImportantPlacesNameUpdate');
    Route::get('/Admin/ImportantPlaces/show/details/{id}', [AdminImportantPlacesController::class, 'ImportantPlacesShowDertails'])->name('ImportantPlacesShowDertails');
    Route::post('/Admin/ImportantPlaces/show/details/{id}/create', [AdminImportantPlacesController::class, 'ImportantPlacesDertailsCreate'])->name('ImportantPlacesDertailsCreate');
    Route::delete('/Admin/ImportantPlaces/show/details/{id}/delete', [AdminImportantPlacesController::class, 'ImportantPlacesDetailsDelete'])->name('ImportantPlacesDetailsDelete');

    //Forum
    Route::get('/Admin/Forum/page', [AdminForumController::class, 'ForumAdminPages'])->name('ForumAdminPages');
    Route::get('/Admin/Forum/details/{id}', [AdminForumController::class, 'ForumAdminDeatils'])->name('ForumAdminDeatils');
    Route::post('/Admin/Forum/comments/{id}', [AdminForumController::class, 'ForumAdminCommentsCreate'])->name('ForumAdminCommentsCreate');
    Route::delete('/Admin/Forum/delete/{id}', [AdminForumController::class, 'ForumAdminDetailsDelete'])->name('ForumAdminDetailsDelete');

     //แบบสอบถามความพึงพอใจ
     Route::get('/user-account/evaluation_questions/show-details', [AdminEvaluationQuestionsController::class, 'AdminQuestions'])->name('AdminQuestions');
     Route::get('/user-account/evaluation_questions/show-details/requester_name/{id}', [AdminEvaluationQuestionsController::class, 'AdminShowEvaluator'])->name('AdminShowEvaluator');
});

Route::middleware(['auth', 'check.auth:2'])->group(function () {
    Route::get('/admin/index', [TemporaryController::class, 'EserviceAdminAccount'])->name('EserviceAdminAccount');

    //คำร้องทั่วไป
    Route::get('/admin/general-requests/showdata', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminShowData'])->name('GeneralRequestsAdminShowData');
    Route::get('/admin/general-requests/export-pdf/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminExportPDF'])->name('GeneralRequestsAdminExportPDF');
    Route::post('/admin/general-requests/admin-reply/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsAdminReply'])->name('GeneralRequestsAdminReply');
    Route::post('/admin/general-requests/update-status/{id}', [AdminGeneralRequestsController::class, 'GeneralRequestsUpdateStatus'])->name('GeneralRequestsUpdateStatus');

    //แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
    Route::get('/admin/disability/showdata', [AdminDisabilityController::class, 'DisabilityAdminShowData'])->name('DisabilityAdminShowData');
    Route::get('/admin/disability/export-pdf/{id}', [AdminDisabilityController::class, 'DisabilityExportPDF'])->name('DisabilityExportPDF');
    Route::post('/admin/disability/admin-reply/{id}', [AdminDisabilityController::class, 'DisabilityAdminReply'])->name('DisabilityAdminReply');
    Route::post('/admin/disability/update-status/{id}', [AdminDisabilityController::class, 'DisabilityUpdateStatus'])->name('DisabilityUpdateStatus');

    //แบบยืนยันสิทธิผู้สูงอายุ
    Route::get('/admin/elderly-allowance/showdata', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminShowData'])->name('ElderlyAllowanceAdminShowData');
    Route::get('/admin/elderly-allowance/export-pdf/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminExportPDF'])->name('ElderlyAllowanceAdminExportPDF');
    Route::post('/admin/elderly-allowance/admin-reply/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceAdminReply'])->name('ElderlyAllowanceAdminReply');
    Route::post('/admin/elderly-allowance/update-status/{id}', [AdminElderlyAllowanceController::class, 'ElderlyAllowanceUpdateStatus'])->name('ElderlyAllowanceUpdateStatus');

    //admin ReceiveAssistance
    Route::get('/TablePages/ReceiveAssistance', [AdminReceiveAssistanceController::class, 'TableReceiveAssistanceAdminPages'])->name('TableReceiveAssistanceAdminPages');
    Route::post('/TablePages/ReceiveAssistance/AdminReply/{id}', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceAdminReply'])->name('ReceiveAssistanceAdminReply');
    Route::get('/TablePages/ReceiveAssistance/ExportPdf/{id}', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceAdminExportPDF'])->name('ReceiveAssistanceAdminExportPDF');
    Route::post('/TablePages/ReceiveAssistance/{id}/update-status', [AdminReceiveAssistanceController::class, 'ReceiveAssistanceUpdateStatus'])->name('ReceiveAssistanceUpdateStatus');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/admin/health_hazard_applications/show-details', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminShowData'])->name('HealthHazardApplicationAdminShowData');
    Route::get('/admin/health_hazard_applications/export-pdf/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminExportPDF'])->name('HealthHazardApplicationAdminExportPDF');
    Route::post('/admin/health_hazard_applications/reply/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationAdminReply'])->name('HealthHazardApplicationAdminReply');
    Route::post('/admin/health_hazard_applications/update-status/{id}', [AdminHealthHazardApplicationController::class, 'HealthHazardApplicationUpdateStatus'])->name('HealthHazardApplicationUpdateStatus');

    //คำร้องขอแจ้งจำหน่ายหรือสะสมอาหาร
    Route::get('/admin/food_storage_license/show-details', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseShowData'])->name('FoodStorageLicenseShowData');
    Route::get('/admin/food_storage_license/export-pdf/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminExportPDF'])->name('FoodStorageLicenseAdminExportPDF');
    Route::post('/admin/food_storage_license/reply/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseAdminReply'])->name('FoodStorageLicenseAdminReply');
    Route::post('/admin/food_storage_license/update-status/{id}', [AdminFoodStorageLicenseController::class, 'FoodStorageLicenseUpdateStatus'])->name('FoodStorageLicenseUpdateStatus');

    //admin Certification
    Route::get('/TablePages/Certification', [AdminConstructionController::class, 'TableCertificationAdminPages'])->name('TableCertificationAdminPages');
    Route::get('/TablePages/Certification/ExportPdf/{id}', [AdminConstructionController::class, 'CertificationAdminExportPDF'])->name('CertificationAdminExportPDF');
    Route::post('/TablePages/Certification/AdminReply/{id}', [AdminConstructionController::class, 'CertificationAdminReply'])->name('CertificationAdminReply');
    Route::post('/TablePages/Certification/{id}/update-status', [AdminConstructionController::class, 'CertificationUpdateStatus'])->name('CertificationUpdateStatus');

    //admin TradeRegistry
    Route::get('/TablePages/TradeRegistry', [AdminTradeRegistryController::class, 'TableTradeRegistryAdminPages'])->name('TableTradeRegistryAdminPages');
    Route::post('/TablePages/TradeRegistry/AdminReply/{id}', [AdminTradeRegistryController::class, 'TradeRegistryUpdateStatus'])->name('TradeRegistryUpdateStatus');
    Route::post('/TablePages/TradeRegistry/{id}/update-status', [AdminTradeRegistryController::class, 'TradeRegistryAdminReply'])->name('TradeRegistryAdminReply');
    Route::get('/TablePages/TradeRegistry/ExportPdf/{id}', [AdminTradeRegistryController::class, 'TradeRegistryAdminExportPDF'])->name('TradeRegistryAdminExportPDF');

    //แบบคำร้องขอใช้ถังขยะ
    Route::get('/admin/trash_bin_requests/showdata', [AdminTrashBinRequestController::class, 'TrashBinRequestAdminShowData'])->name('TrashBinRequestAdminShowData');
    Route::get('/admin/trash_bin_requests/export-pdf/{id}', [AdminTrashBinRequestController::class, 'TrashBinRequestAdminExportPDF'])->name('TrashBinRequestAdminExportPDF');
    Route::post('/admin/trash_bin_requests/admin-reply/{id}', [AdminTrashBinRequestController::class, 'TrashBinRequestAdminReply'])->name('TrashBinRequestAdminReply');
    Route::post('/admin/trash_bin_requests/update-status/{id}', [AdminTrashBinRequestController::class, 'TrashBinRequestUpdateStatus'])->name('TrashBinRequestUpdateStatus');

    //admin BuildingChange
    Route::get('/TablePages/BuildingChange', [AdminBuildingChangeController::class, 'TableBuildingChangeAdminPages'])->name('TableBuildingChangeAdminPages');
    Route::get('/TablePages/BuildingChange/ExportPdf/{id}', [AdminBuildingChangeController::class, 'BuildingChangeAdminExportPDF'])->name('BuildingChangeAdminExportPDF');
    Route::post('/TablePages/BuildingChange/AdminReply/{id}', [AdminBuildingChangeController::class, 'BuildingChangeAdminReply'])->name('BuildingChangeAdminReply');
    Route::post('/TablePages/BuildingChange/{id}/update-status', [AdminBuildingChangeController::class, 'BuildingChangeUpdateStatus'])->name('BuildingChangeUpdateStatus');
});

//แบบคำร้องใบอณุญาตสะสมอาหาร
Route::get('/food_storage_license', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormPage'])->name('FoodStorageLicenseFormPage');
Route::post('/food_storage_license/form/create', [FoodStorageLicenseController::class, 'FoodStorageLicenseFormCreate'])->name('FoodStorageLicenseFormCreate');

//แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
Route::get('/health_hazard_applications', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormPage'])->name('HealthHazardApplicationFormPage');
Route::post('/health_hazard_applications/form/create', [HealthHazardApplicationController::class, 'HealthHazardApplicationFormCreate'])->name('HealthHazardApplicationFormCreate');

//คำขออนุญาตก่อสร้างอาคารดัดแปลงอาคารหรือรื้อถอนอาคาร
Route::get('/BuildingChange', [BuildingChangeController::class, 'BuildingChangeFormPage'])->name('BuildingChangeFormPage');
Route::post('/BuildingChange/form/create', [BuildingChangeController::class, 'BuildingChangeFormCreate'])->name('BuildingChangeFormCreate');

//คำขอรับรองสิ่งปลูกสร้างอาคาร
Route::get('/Certification', [ConstructionController::class, 'UserCertificationFormPage'])->name('UserCertificationFormPage');
Route::post('/Certification/form/create', [ConstructionController::class, 'CertificationFormCreate'])->name('CertificationFormCreate');

//users TradeRegistry
Route::get('/TradeRegistry', [TradeRegistryController::class, 'TradeRegistryFormPage'])->name('TradeRegistryFormPage');
Route::post('/TradeRegistry/form/create', [TradeRegistryController::class, 'TradeRegistryFormCreate'])->name('TradeRegistryFormCreate');

//คำร้องทั่วไป
Route::get('/general-requests', [GeneralRequestsController::class, 'GeneralRequestsFormPage'])->name('GeneralRequestsFormPage');
Route::post('/general-requests/form/create', [GeneralRequestsController::class, 'GeneralRequestsFormCreate'])->name('GeneralRequestsFormCreate');

//แบบยืนยันสิทธิผู้สูงอายุ
Route::get('/elderly-allowance', [ElderlyAllowanceController::class, 'ElderlyAllowanceFormPage'])->name('ElderlyAllowanceFormPage');
Route::post('/elderly-allowance/form/create', [ElderlyAllowanceController::class, 'ElderlyAllowanceFormCreate'])->name('ElderlyAllowanceFormCreate');

//แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
Route::get('/disability', [DisabilityController::class, 'DisabilityFormPage'])->name('DisabilityFormPage');
Route::post('/disability/form/create', [DisabilityController::class, 'DisabilityFormCreate'])->name('DisabilityFormCreate');

//คำขอรับเงินสงเคราะห์
Route::get('/receive_assistance', [ReceiveAssistanceController::class, 'ReceiveAssistanceFormPage'])->name('ReceiveAssistanceFormPage');
Route::post('/receive_assistance/form/create', [ReceiveAssistanceController::class, 'ReceiveAssistanceFormCreate'])->name('ReceiveAssistanceFormCreate');

//ขอถังขยะ
Route::get('/trash_bin_requests', [TrashBinRequestController::class, 'TrashBinRequestPage'])->name('TrashBinRequestPage');
Route::post('/trash_bin_requests/form/create', [TrashBinRequestController::class, 'TrashBinRequestFormCreate'])->name('TrashBinRequestFormCreate');

Route::middleware(['auth', 'check.auth:3'])->group(function () {
    Route::get('/eservice-useraccount', [TemporaryController::class, 'EserviceUserAccount'])->name('EserviceUserAccount');

    //แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
    Route::get('/user-account/health_hazard_applications/show-details', [HealthHazardApplicationController::class, 'HealthHazardApplicationShowDetails'])->name('HealthHazardApplicationShowDetails');
    Route::get('/user-account/health_hazard_applications/export-pdf/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserExportPDF'])->name('HealthHazardApplicationUserExportPDF');
    Route::post('/user-account/health_hazard_applications/reply/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserReply'])->name('HealthHazardApplicationUserReply');
    Route::get('/user-account/health_hazard_applications/show-edit/{id}', [HealthHazardApplicationController::class, 'HealthHazardApplicationUserShowFormEdit'])->name('HealthHazardApplicationUserShowFormEdit');

    //แบบคำร้องใบอณุญาตสะสมอาหาร
    Route::get('/user-account/food_storage_license/show-details', [FoodStorageLicenseController::class, 'FoodStorageLicenseShowDetails'])->name('FoodStorageLicenseShowDetails');
    Route::get('/user-account/food_storage_license/export-pdf/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserExportPDF'])->name('FoodStorageLicenseUserExportPDF');
    Route::post('/user-account/food_storage_license/reply/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserReply'])->name('FoodStorageLicenseUserReply');
    Route::get('/user-account/food_storage_license/show-edit/{id}', [FoodStorageLicenseController::class, 'FoodStorageLicenseUserShowFormEdit'])->name('FoodStorageLicenseUserShowFormEdit');

    //คำขออนุญาตก่อสร้างอาคารดัดแปลงอาคารหรือรื้อถอนอาคาร
    Route::get('/user-account/BuildingChange/record', [BuildingChangeController::class, 'BuildingChangeUsersPages'])->name('BuildingChangeUsersPages');
    Route::get('/user-account/BuildingChange/{id}/pdf', [BuildingChangeController::class, 'BuildingChangeUserExportPDF'])->name('BuildingChangeUserExportPDF');
    Route::post('/user-account/BuildingChange/{form}/reply', [BuildingChangeController::class, 'BuildingChangeUserReply'])->name('BuildingChangeUserReply');

    //คำขอรับรองสิ่งปลูกสร้างอาคาร
    Route::get('/user/account/Certification/record', [ConstructionController::class, 'TableCertificationUsersPages'])->name('TableCertificationUsersPages');
    Route::get('/user/account/Certification/{id}/pdf', [ConstructionController::class, 'CertificationUserExportPDF'])->name('CertificationUserExportPDF');
    Route::post('/user/account/Certification/{form}/reply', [ConstructionController::class, 'CertificationUserReply'])->name('CertificationUserReply');

    //users TradeRegistry
    Route::get('/user/account/TradeRegistry/record', [TradeRegistryController::class, 'TableTradeRegistryUsersPages'])->name('TableTradeRegistryUsersPages');
    Route::get('/user/account/TradeRegistry/{id}/pdf', [TradeRegistryController::class, 'TradeRegistryUserExportPDF'])->name('TradeRegistryUserExportPDF');
    Route::post('/user/account/TradeRegistry/{form}/reply', [TradeRegistryController::class, 'TradeRegistryUserReply'])->name('TradeRegistryUserReply');

    //คำร้องทั่วไป
    Route::get('/user-account/general-requests/show-details', [GeneralRequestsController::class, 'GeneralRequestsShowDetails'])->name('GeneralRequestsShowDetails');
    Route::get('/user-account/general-requests/export-pdf/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserExportPDF'])->name('GeneralRequestsUserExportPDF');
    Route::post('/user-account/general-requests/reply/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserReply'])->name('GeneralRequestsUserReply');
    Route::get('/user-account/general-requests/show-edit/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserShowFormEdit'])->name('GeneralRequestsUserShowFormEdit');
    Route::put('/user-account/general-requests/update-data/{id}', [GeneralRequestsController::class, 'GeneralRequestsUserUpdateForm'])->name('GeneralRequestsUserUpdateForm');

    //แบบยืนยันสิทธิผู้สูงอายุ
    Route::get('/user-account/elderly-allowance/show-details', [ElderlyAllowanceController::class, 'ElderlyAllowanceShowDetails'])->name('ElderlyAllowanceShowDetails');
    Route::get('/user-account/elderly-allowance/export-pdf/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserExportPDF'])->name('ElderlyAllowanceUserExportPDF');
    Route::post('/user-account/elderly-allowance/reply/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserReply'])->name('ElderlyAllowanceUserReply');
    Route::get('/user-account/elderly-allowance/show-edit/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserShowEdit'])->name('ElderlyAllowanceUserShowEdit');
    Route::put('/user-account/elderly-allowance/update-data/{id}', [ElderlyAllowanceController::class, 'ElderlyAllowanceUserUpdateForm'])->name('ElderlyAllowanceUserUpdateForm');

    //แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
    Route::get('/user/account/Disability/record', [DisabilityController::class, 'TableDisabilityUsersPages'])->name('TableDisabilityUsersPages');
    Route::get('/user/account/Disability/{id}/edit', [DisabilityController::class, 'DisabilityUserShowEdit'])->name('DisabilityUserShowEdit');
    Route::put('/user/account/Disability/{id}/Update', [DisabilityController::class, 'DisabilityUserFormUpdate'])->name('DisabilityUserFormUpdate');
    Route::get('/user/account/Disability/{id}/pdf', [DisabilityController::class, 'DisabilityUserExportPDF'])->name('DisabilityUserExportPDF');
    Route::post('/user/account/Disability/{form}/reply', [DisabilityController::class, 'DisabilityUserReply'])->name('DisabilityUserReply');

    //คำขอรับเงินสงเคราะห์
    Route::get('/user/account/ReceiveAssistance/record', [ReceiveAssistanceController::class, 'TableReceiveAssistanceUsersPages'])->name('TableReceiveAssistanceUsersPages');
    Route::post('/user/account/ReceiveAssistance/{form}/reply', [ReceiveAssistanceController::class, 'ReceiveAssistanceUserReply'])->name('ReceiveAssistanceUserReply');
    Route::get('/user/account/ReceiveAssistance/{id}/pdf', [ReceiveAssistanceController::class, 'ReceiveAssistanceUserExportPDF'])->name('ReceiveAssistanceUserExportPDF');

    //แบบคำร้องขอใช้ถังขยะ
    Route::get('/user/account/TrashBinRequest/show-details', [TrashBinRequestController::class, 'TrashBinRequestShowDetails'])->name('TrashBinRequestShowDetails');
    Route::post('/user/account/TrashBinRequest/{form}/reply', [TrashBinRequestController::class, 'TrashBinRequestUserReply'])->name('TrashBinRequestUserReply');
    Route::get('/user/account/TrashBinRequest/{id}/pdf', [TrashBinRequestController::class, 'TrashBinRequestUserExportPDF'])->name('TrashBinRequestUserExportPDF');
});

//นำจำนวนคนเข้าชมเว็บ
Route::get('/visitor-stats', [VisitorsController::class, 'getVisitorStats']);

Route::get('/showLoginForm', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('Login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
