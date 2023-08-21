<?php

use App\Charts\HourlyProduksiChart;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityType;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BreakdownController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DedicatedController;
use App\Http\Controllers\DowntimeCategory;
use App\Http\Controllers\EquipCategoriController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipModelController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourlyController;
use App\Http\Controllers\HourMeterController;
use App\Http\Controllers\JointSurveyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationType;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PCAController;
use App\Http\Controllers\PerformanceItemController;
use App\Http\Controllers\PlanDistanceController;
use App\Http\Controllers\PlanFuelRatioController;
use App\Http\Controllers\PlanFuelUsageController;
use App\Http\Controllers\PlanHaulerController;
use App\Http\Controllers\PlanLoaderController;
use App\Http\Controllers\PlanProduksiController;
use App\Http\Controllers\PlanSupportController;
use App\Http\Controllers\PlanWeatherController;
use App\Http\Controllers\ProblemType;

use App\Http\Controllers\RainSlipperyController;
use App\Http\Controllers\RitasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftCode;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatusUnitController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TruckFactor;
use App\Http\Controllers\UserCOntroller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


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














Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();


// Route::get('/dashboard', function () {
//     return view('templating.dashboard');
// });

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


Route::get('/logout',[LogoutController::class,'perform'])->name('logout.perform');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/dashboard/update-date-range',[DashboardController::class, 'update'])->name('dashboard.update');


Route::get('/ritasi',[RitasiController::class,'index'])->name('ritasi.index');
Route::get('/ritasi/create',[RitasiController::class,'create'])->name('ritasi.create');
Route::post('/ritasi/store',[RitasiController::class,'store'])->name('ritasi.store');
Route::post('/ritasi/import',[RitasiController::class,'import'])->name('ritasi.import');
Route::get('/ritasi/export',[RitasiController::class,'export'])->name('ritasi.export');
Route::put('/ritasi/update{id}',[RitasiController::class,'update'])->name('ritasi.update');
Route::get('/ritasi/edit{id}',[RitasiController::class,'edit'])->name('ritasi.edit');
Route::delete('/ritasi/destroy{id}',[RitasiController::class,'destroy'])->name('ritasi.destroy');

Route::get('/customer',[CustomerController::class,'index'])->name('customer.index');
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::post('/customer/import',[CustomerController::class,'import'])->name('customer.import');
Route::get('/customer/export',[CustomerController::class,'export'])->name('customer.export');
Route::put('/customer/update{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/edit{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::delete('/customer/destroy{id}',[CustomerController::class,'destroy'])->name('customer.destroy');
Route::get('/site',[SiteController::class,'index'])->name('site.index');
Route::get('/site/create',[SiteController::class,'create'])->name('site.create');
Route::post('/site/store',[SiteController::class,'store'])->name('site.store');
Route::post('/site/import',[SiteController::class,'import'])->name('site.import');
Route::get('/site/export',[SiteController::class,'export'])->name('site.export');
Route::put('/site/update{id}',[SiteController::class,'update'])->name('site.update');
Route::get('/site/edit{id}',[SiteController::class,'edit'])->name('site.edit');
Route::delete('/site/destroy{id}',[SiteController::class,'destroy'])->name('site.destroy');

Route::get('/operator', [OperatorController::class,'index'])->name('operator.index');
Route::get('/operator/create',[OperatorController::class,'create'])->name('operator.create');
Route::post('/operator/store',[OperatorController::class,'store'])->name('operator.store');
Route::post('/operator/import',[OperatorController::class,'import'])->name('operator.import');
Route::get('/operator/export',[OperatorController::class,'export'])->name('operator.export');
Route::PUT('/operator/update{id}',[OperatorController::class,'update'])->name('operator.update');
Route::get('/operator/edit{id}',[OperatorController::class,'edit'])->name('operator.edit');
Route::delete('/operator/destroy{id}',[OperatorController::class,'destroy'])->name('operator.destroy');

Route::get('/status-update/{id}','EquipmentController@status_update');
Route::get('/equipment',[EquipmentController::class,'index'])->name('equipment.index');
Route::get('/equipment/create',[EquipmentController::class,'create'])->name('equipment.create');
Route::post('/equipment/store',[EquipmentController::class,'store'])->name('equipment.store');
Route::post('/equipment/import',[EquipmentController::class,'import'])->name('equipment.import');
Route::get('/equipment/export',[EquipmentController::class,'export'])->name('equipment.export');
Route::post('/equipment/{id}/toggle-status', [EquipmentController::class, 'toggleStatus'])->name('equipment.toggleStatus');

Route::get('/location',[LocationController::class,'index'])->name('location.index');
Route::get('/location/create',[LocationController::class,'create'])->name('location.create');
Route::post('/location/store',[LocationController::class,'store'])->name('location.store');
Route::post('/location/import',[LocationController::class,'import'])->name('location.import');
Route::get('/location/export',[LocationController::class,'export'])->name('location.export');
Route::get('/location/edit{id}',[LocationController::class,'edit'])->name('location.edit');
Route::put('/location/update{id}',[LocationController::class,'update'])->name('location.update');
Route::delete('/location/destroy{id}',[LocationController::class,'destroy'])->name('location.destroy');
Route::get('/factor',[FactorController::class,'index'])->name('factor.index');
Route::get('/factor/create',[FactorController::class,'create'])->name('factor.create');
Route::post('/factor/store',[FactorController::class,'store'])->name('factor.store');
Route::get('/factor/edit{id}',[FactorController::class,'edit'])->name('factor.edit');
Route::put('/factor/update{id}',[FactorController::class,'update'])->name('factor.update');
Route::delete('/factor/destroy{id}',[FactorController::class,'destroy'])->name('factor.destroy');
Route::post('/factor/import',[FactorController::class,'import'])->name('factor.import');
Route::get('/factor/export',[FactorController::class,'export'])->name('factor.export');
Route::get('/statusunit',[StatusUnitController::class,'index'])->name('statusunit.index');
Route::get('/statusunit/create',[StatusUnitController::class,'create'])->name('statusunit.create');
Route::post('/statusunit/store',[StatusUnitController::class,'store'])->name('statusunit.store');
Route::post('/statusunit/import',[StatusUnitController::class,'import'])->name('statusunit.import');
Route::PUT('/statusunit/update{id}',[StatusUnitController::class,'update'])->name('statusunit.update');
Route::get('/statusunit/edit{id}',[StatusUnitController::class,'edit'])->name('statusunit.edit');
Route::delete('/statusunit/destroy{id}',[StatusUnitController::class,'destroy'])->name('statusunit.destroy');
Route::get('/statusunit/export',[StatusUnitController::class,'export'])->name('statusunit.export');
Route::get('/rainslippery',[RainSlipperyController::class,'index'])->name('rainslippery.index');
Route::get('/rainslippery/create',[RainSlipperyController::class,'create'])->name('rainslippery.create');
Route::post('/rainslippery/store',[RainSlipperyController::class,'store'])->name('rainslippery.store');
Route::post('/rainslippery/import',[RainSlipperyController::class,'import'])->name('rainslippery.import');
Route::get('/rainslippery/export',[RainSlipperyController::class,'export'])->name('rainslippery.export');
Route::PUT('/rainslippery/update{id}',[RainSlipperyController::class,'update'])->name('rainslippery.update');
Route::get('/rainslippery/edit{id}',[RainSlipperyController::class,'edit'])->name('rainslippery.edit');
Route::delete('/rainslippery/destroy{id}',[RainSlipperyController::class,'destroy'])->name('rainslippery.destroy');
Route::get('/breakdown',[BreakdownController::class,'index'])->name('breakdown.index');
Route::get('/breakdown/create',[BreakdownController::class,'create'])->name('breakdown.create');
Route::post('/breakdown/store',[BreakdownController::class,'store'])->name('breakdown.store');
Route::post('/breakdown/import',[BreakdownController::class,'import'])->name('breakdown.import');
Route::get('/breakdown/export',[BreakdownController::class,'export'])->name('breakdown.export');
Route::PUT('/breakdown/update{id}',[BreakdownController::class,'update'])->name('breakdown.update');
Route::get('/breakdown/edit{id}',[BreakdownController::class,'edit'])->name('breakdown.edit');
Route::delete('/breakdown/destroy{id}',[BreakdownController::class,'destroy'])->name('breakdown.destroy');
Route::get('/fuel',[FuelController::class,'index'])->name('fuel.index');
Route::get('/fuel/create',[FuelController::class,'create'])->name('fuel.create');
Route::post('/fuel/store',[FuelController::class,'store'])->name('fuel.store');
Route::post('/fuel/import',[FuelController::class,'import'])->name('fuel.import');
Route::get('/fuel/export',[FuelController::class,'export'])->name('fuel.export');
Route::get('/fuel/edit{id}',[FuelController::class,'edit'])->name('fuel.edit');
Route::put('/fuel/update{id}',[FuelController::class,'update'])->name('fuel.update');
Route::delete('/fuel/destroy{id}',[FuelController::class,'destroy'])->name('fuel.destroy');
Route::get('/hourmeter',[HourMeterController::class,'index'])->name('hourmeter.index');
Route::get('/hourmeter/create',[HourMeterController::class,'create'])->name('hourmeter.create');
Route::post('/hourmeter/store',[HourMeterController::class,'store'])->name('hourmeter.store');
Route::post('/hourmeter/import',[HourMeterController::class,'import'])->name('hourmeter.import');
Route::get('/hourmeter/export',[HourMeterController::class,'export'])->name('hourmeter.export');
Route::get('/hourmeter/edit{id}',[HourMeterController::class,'edit'])->name('hourmeter.edit');
Route::put('/hourmeter/update{id}',[HourMeterController::class,'update'])->name('hourmeter.update');
Route::delete('/hourmeter/destroy{id}',[HourMeterController::class,'destroy'])->name('hourmeter.destroy');
Route::get('/jointsurvey',[JointSurveyController::class,'index'])->name('jointsurvey.index');
Route::get('/jointsurvey/create',[JointSurveyController::class,'create'])->name('jointsurvey.create');
Route::post('/jointsurvey/store',[JointSurveyController::class,'store'])->name('jointsurvey.store');
Route::post('/jointsurvey/import',[JointSurveyController::class,'import'])->name('jointsurvey.import');
Route::get('/jointsurvey/edit{id}',[JointSurveyController::class,'edit'])->name('jointsurvey.edit');
Route::put('/jointsurvey/update{id}',[JointSurveyController::class,'update'])->name('jointsurvey.update');
Route::delete('/jointsurvey/destroy{id}',[JointSurveyController::class,'destroy'])->name('jointsurvey.destroy');
Route::get('/jointsurvey/export',[JointSurveyController::class,'export'])->name('jointsurvey.export');
Route::get('/hourly',[HourlyController::class,'index'])->name('hourly.index');
Route::post('/hourly/refresh', 'HourlyController@refresh')->name('hourly.refresh');
Route::get('/pca',[PCAController::class,'index'])->name('pca.index');
Route::get('/planhauler',[PlanHaulerController::class,'index'])->name('planhauler.index');
Route::get('/planhauler/create',[PlanHaulerController::class,'create'])->name('planhauler.create');
Route::post('/planhauler/store',[PlanHaulerController::class,'store'])->name('planhauler.store');
Route::get('/planhauler/edit{id}',[PlanHaulerController::class,'edit'])->name('planhauler.edit');
Route::put('/planhauler/update{id}',[PlanHaulerController::class,'update'])->name('planhauler.update');
Route::delete('/planhauler/destroy{id}',[PlanHaulerController::class,'destroy'])->name('planhauler.destroy');
Route::post('/planhauler/import',[PlanHaulerController::class,'import'])->name('planhauler.import');
Route::get('/planhauler/export',[PlanHaulerController::class,'export'])->name('planhauler.export');
Route::get('/planloader',[PlanLoaderController::class,'index'])->name('planloader.index');
Route::get('/planloader/create',[PlanLoaderController::class,'create'])->name('planloader.create');
Route::post('/planloader/store',[PlanLoaderController::class,'store'])->name('planloader.store');
Route::get('/planloader/edit{id}',[PlanLoaderController::class,'edit'])->name('planloader.edit');
Route::put('/planloader/update{id}',[PlanLoaderController::class,'update'])->name('planloader.update');
Route::delete('/planloader/destroy{id}',[PlanLoaderController::class,'destroy'])->name('planloader.destroy');
Route::post('/planloader/import',[PlanLoaderController::class,'import'])->name('planloader.import');
Route::get('/planloader/export',[PlanLoaderController::class,'export'])->name('planloader.export');
Route::get('/plansupport',[PlanSupportController::class,'index'])->name('plansupport.index');
Route::get('/plansupport/create',[PlanSupportController::class,'create'])->name('plansupport.create');
Route::post('/plansupport/store',[PlanSupportController::class,'store'])->name('plansupport.store');
Route::get('/plansupport/edit{id}',[PlanSupportController::class,'edit'])->name('plansupport.edit');
Route::put('/plansupport/update{id}',[PlanSupportController::class,'update'])->name('plansupport.update');
Route::delete('/plansupport/destroy{id}',[PlanSupportController::class,'destroy'])->name('plansupport.destroy');
Route::post('/plansupport/import',[PlanSupportController::class,'import'])->name('plansupport.import');
Route::get('/plansupport/export',[PlanSupportController::class,'export'])->name('plansupport.export');
Route::get('/planratio',[PlanFuelRatioController::class,'index'])->name('planratio.index');
Route::get('/planratio/create',[PlanFuelRatioController::class,'create'])->name('planratio.create');
Route::post('/planratio/store',[PlanFuelRatioController::class,'store'])->name('planratio.store');
Route::get('/planratio/edit{id}',[PlanFuelRatioController::class,'edit'])->name('planratio.edit');
Route::put('/planratio/update{id}',[PlanFuelRatioController::class,'update'])->name('planratio.update');
Route::delete('/planratio/destroy{id}',[PlanFuelRatioController::class,'destroy'])->name('planratio.destroy');
Route::post('/planratio/import',[PlanFuelRatioController::class,'import'])->name('planratio.import');
Route::get('/planratio/export',[PlanFuelRatioController::class,'export'])->name('planratio.export');
Route::get('/planusage',[PlanFuelUsageController::class,'index'])->name('planusage.index');
Route::get('/planusage/create',[PlanFuelUsageController::class,'create'])->name('planusage.create');
Route::post('/planusage/store',[PlanFuelUsageController::class,'store'])->name('planusage.store');
Route::get('/planusage/edit{id}',[PlanFuelUsageController::class,'edit'])->name('planusage.edit');
Route::get('/planusage/update{id}',[PlanFuelUsageController::class,'update'])->name('planusage.update');
Route::delete('/planusage/destroy{id}',[PlanFuelUsageController::class,'destroy'])->name('planusage.destroy');
Route::post('/planusage/import',[PlanFuelUsageController::class,'import'])->name('planusage.import');
Route::get('/planusage/export',[PlanFuelUsageController::class,'export'])->name('planusage.export');
Route::get('/plandistance',[PlanDistanceController::class,'index'])->name('plandistance.index');
Route::get('/plandistance/create',[PlanDistanceController::class,'create'])->name('plandistance.create');
Route::post('/plandistance/store',[PlanDistanceController::class,'store'])->name('plandistance.store');
Route::get('/plandistance/edit{id}',[PlanDistanceController::class,'edit'])->name('plandistance.edit');
Route::put('/plandistance/update{id}',[PlanDistanceController::class,'update'])->name('plandistance.update');
Route::delete('/plandistance/destroy{id}',[PlanDistanceController::class,'destroy'])->name('plandistance.destroy');
Route::post('/plandistance/import',[PlanDistanceController::class,'import'])->name('plandistance.import');
Route::get('/plandistance/export',[PlanDistanceController::class,'export'])->name('plandistance.export');
Route::get('/planweather',[PlanWeatherController::class,'index'])->name('planweather.index');
Route::get('/planweather/create',[PlanWeatherController::class,'create'])->name('planweather.create');
Route::post('/planweather/store',[PlanWeatherController::class,'store'])->name('planweather.store');
Route::get('/planweather/edit{id}',[PlanWeatherController::class,'edit'])->name('planweather.edit');
Route::put('/planweather/update{id}',[PlanWeatherController::class,'update'])->name('planweather.update');
Route::delete('/planweather/destroy{id}',[PlanWeatherController::class,'destroy'])->name('planweather.destroy');
Route::post('/planweather/import',[PlanWeatherController::class,'import'])->name('planweather.import');
Route::get('/planweather/export',[PlanWeatherController::class,'export'])->name('planweather.export');
Route::get('/planproduksi',[PlanProduksiController::class,'index'])->name('planproduksi.index');
Route::get('/planproduksi/create',[PlanProduksiController::class,'create'])->name('planproduksi.create');
Route::post('/planproduksi/store',[PlanProduksiController::class,'store'])->name('planproduksi.store');
Route::get('/planproduksi/edit{id}',[PlanProduksiController::class,'edit'])->name('planproduksi.edit');
Route::post('/planproduksi/import',[PlanProduksiController::class,'import'])->name('planproduksi.import');
Route::get('/planproduksi/export',[PlanProduksiController::class,'export'])->name('planproduksi.export');
Route::put('/planproduksi/update{id}',[PlanProduksiController::class,'update'])->name('planproduksi.update');
Route::delete('/planproduksi/destroy{id}',[PlanProduksiController::class,'destroy'])->name('planproduksi.destroy');
Route::get('/time',[TimeController::class,'index'])->name('time.index');
Route::get('/time/create',[TimeController::class,'create'])->name('time.create');
Route::post('/time/store',[TimeController::class,'store'])->name('time.store');
Route::post('/time/import',[TimeController::class,'import'])->name('time.import');
Route::get('/time/export',[TimeController::class,'export'])->name('time.export');
Route::put('/time/update{id}',[TimeController::class,'update'])->name('time.update');
Route::get('/time/edit{id}',[TimeController::class,'edit'])->name('time.edit');
Route::delete('/time/destroy{id}',[TimeController::class,'destroy'])->name('time.destroy');
Route::get('/equipcategori',[EquipCategoriController::class,'index'])->name('equipcategori.index');
Route::get('/equipcategori/create',[EquipCategoriController::class,'create'])->name('equipcategori.create');
Route::post('/equipcategori/store',[EquipCategoriController::class,'store'])->name('equipcategori.store');
Route::post('/equipcategori/import',[EquipCategoriController::class,'import'])->name('equipcategori.import');
Route::get('/equipcategori/export',[EquipCategoriController::class,'export'])->name('equipcategori.export');
Route::get('/equipmodel',[EquipModelController::class,'index'])->name('equipmodel.index');
Route::get('/equipmodel/create',[EquipModelController::class,'create'])->name('equipmodel.create');
Route::post('/equipmodel/store',[EquipModelController::class,'store'])->name('equipmodel.store');
Route::post('/equipmodel/import',[EquipModelController::class,'import'])->name('equipmodel.import');
Route::get('/equipmodel/export',[EquipModelController::class,'export'])->name('equipmodel.export');
Route::post('/equipmodel/edit{id}',[EquipModelController::class,'edit'])->name('equipmodel.edit');
Route::delete('/equipmodel/destroy{id}',[EquipModelController::class,'destroy'])->name('equipmodel.destroy');
Route::get('/dedicated',[DedicatedController::class,'index'])->name('dedicated.index');
Route::get('/dedicated/create',[DedicatedController::class,'create'])->name('dedicated.create');
Route::post('/dedicated/store',[DedicatedController::class,'store'])->name('dedicated.store');
Route::post('/dedicated/import',[DedicatedController::class,'import'])->name('dedicated.import');
Route::get('/dedicated/export',[DedicatedController::class,'export'])->name('dedicated.export');
Route::put('/dedicated/update{id}',[DedicatedController::class,'update'])->name('dedicated.update');
Route::get('/dedicated/edit{id}',[DedicatedController::class,'edit'])->name('dedicated.edit');
Route::delete('/dedicated/destroy{id}',[DedicatedController::class,'destroy'])->name('dedicated.destroy');
Route::get('/faktor',[TruckFactor::class,'index'])->name('faktor.index');
Route::get('/faktor/create',[TruckFactor::class,'create'])->name('faktor.create');
Route::post('/faktor/store',[TruckFactor::class,'store'])->name('faktor.store');
Route::post('/faktor/import',[TruckFactor::class,'import'])->name('faktor.import');
Route::get('/faktor/export',[TruckFactor::class,'export'])->name('faktor.export');
Route::get('/faktor/edit{id}',[TruckFactor::class,'edit'])->name('faktor.edit');
Route::put('/faktor/update{id}',[TruckFactor::class,'update'])->name('faktor.update');
Route::delete('/faktor/destroy{id}',[TruckFactor::class,'destroy'])->name('faktor.destroy');
Route::get('/lokasi',[LocationType::class,'index'])->name('lokasi.index');
Route::get('/lokasi/create',[LocationType::class,'create'])->name('lokasi.create');
Route::post('/lokasi/store',[LocationType::class,'store'])->name('lokasi.store');
Route::post('/lokasi/import',[LocationType::class,'import'])->name('lokasi.import');
Route::get('/lokasi/export',[LocationType::class,'export'])->name('lokasi.export');
Route::get('/material',[MaterialController::class,'index'])->name('material.index');
Route::get('/material/create',[MaterialController::class,'create'])->name('material.create');
Route::post('/material/store',[MaterialController::class,'store'])->name('material.store');
Route::post('/material/import',[MaterialController::class,'import'])->name('material.import');
Route::get('/material/export',[MaterialController::class,'export'])->name('material.export');
Route::get('/material/edit{id}',[MaterialController::class,'edit'])->name('material.edit');
Route::put('/material/update{id}',[MaterialController::class,'update'])->name('material.update');
Route::delete('/material/destroy{id}',[MaterialController::class,'destroy'])->name('material.destroy');
Route::get('/problem',[ProblemType::class,'index'])->name('problem.index');
Route::get('/problem/create',[ProblemType::class,'create'])->name('problem.create');
Route::post('/problem/store',[ProblemType::class,'store'])->name('problem.store');
Route::post('/problem/import',[ProblemType::class,'import'])->name('problem.import');
Route::get('/problem/export',[ProblemType::class,'export'])->name('problem.export');
Route::get('/problem/edit{id}',[ProblemType::class,'edit'])->name('problem.edit');
Route::put('/problem/update{id}',[ProblemType::class,'update'])->name('problem.update');
Route::delete('/problem/destroy{id}',[ProblemType::class,'destroy'])->name('problem.destroy');
Route::get('/shift',[ShiftCode::class,'index'])->name('shift.index');
Route::get('/shift/create',[ShiftCode::class,'create'])->name('shift.create');
Route::post('/shift/store',[ShiftCode::class,'store'])->name('shift.store');
Route::post('/shift/import',[ShiftCode::class,'import'])->name('shift.import');
Route::get('/shift/export',[ShiftCode::class,'export'])->name('shift.export');
Route::get('/shift/edit{id}',[ShiftCode::class,'edit'])->name('shift.edit');
Route::put('/shift/update{id}',[ShiftCode::class,'update'])->name('shift.update');
Route::delete('/shift/destroy{id}',[ShiftCode::class,'destroy'])->name('shift.destroy');
Route::get('/downtime',[DowntimeCategory::class,'index'])->name('downtime.index');
Route::get('/downtime/create',[DowntimeCategory::class,'create'])->name('downtime.create');
Route::post('/downtime/store',[DowntimeCategory::class,'store'])->name('downtime.store');
Route::get('/downtime/edit{id}',[DowntimeCategory::class,'edit'])->name('downtime.edit');
Route::put('/downtime/update{id}',[DowntimeCategory::class,'update'])->name('downtime.update');
Route::delete('/downtime/destroy{id}',[DowntimeCategory::class,'destroy'])->name('downtime.destroy');
Route::post('/downtime/import',[DowntimeCategory::class,'import'])->name('downtime.import');
Route::get('/downtime/export',[DowntimeCategory::class,'export'])->name('downtime.export');
Route::get('/performance',[PerformanceItemController::class,'index'])->name('performance.index');
Route::get('/performance/create',[PerformanceItemController::class,'create'])->name('performance.create');
Route::post('/performance/store',[PerformanceItemController::class,'store'])->name('performance.store');
Route::post('/performance/import',[PerformanceItemController::class,'import'])->name('performance.import');
Route::get('/performance/export',[PerformanceItemController::class,'export'])->name('performance.export');
Route::get('/activity',[ActivityType::class,'index'])->name('activity.index');
Route::get('/activity/create',[ActivityType::class,'create'])->name('activity.create');
Route::post('/activity/store',[ActivityType::class,'store'])->name('activity.store');
Route::post('/activity/import',[ActivityType::class,'import'])->name('activity.import');
Route::get('/activity/export',[ActivityType::class,'export'])->name('activity.export');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






