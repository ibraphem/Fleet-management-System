<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'languange'], function () {
    Route::get('/', 'HomeController@index');

    Auth::routes();





    Route::resource('employees', 'EmployeeController');
    Route::post('/employees/assignroles', 'EmployeeController@assignRoles')->name('assign.roles');
    Route::post('/employeerole/create', 'EmployeeController@roleCreate')->name('employeerole.create');
    Route::get('/allpermissions/{role_id?}', 'EmployeeController@permissionList')->name('permissions.list');
    Route::post('permissions/create', 'EmployeeController@createPermission')->name('permissions.create');
    Route::post('permissionrole/create', 'EmployeeController@rolePermissionMapping')->name('permissionrole.create');

    

    Route::resource('flexiblepossetting', 'FlexiblePosSettingController');

    Route::resource('salepayments', 'SalePaymentController');
    Route::resource('customerpayments', 'CustomerPaymentController');

    Route::resource('vehicles', 'VehicleController');
    Route::match(['post'], '/vehicle/report', 'MaintenanceController@report')->name('vehicle.report');
    Route::match(['post'], '/report/getexpense', 'MaintenanceController@getExpense')->name('report.getexpense');
    Route::match(['post'], '/expense/report', 'MaintenanceController@expense')->name('expense.report');

    Route::resource('vehicleusers', 'VehicleUserController');
    Route::match(['post'], 'vehicleusers/{$id}', 'VehicleUserController@show');

    Route::resource('maintenance', 'MaintenanceController');
    Route::get('/maint', 'MaintenanceController@maint')->name('fetch.maint');
    Route::resource('maintenanceroutine', 'MaintenanceRoutineController');
    Route::match(['post'], 'maintenanceroutine/{$id}', 'MaintenanceRoutineController@show');

    Route::resource('schedulemaintenance', 'ScheduleMaintenanceController');
    Route::match(['post'], 'schedulemaintenance/complete', 'SchedulemaintenanceController@complete')->name('schedulemaintenance.complete');

    Route::resource('assignment', 'assignmentController');
    Route::resource('withdrew', 'WithdrawController');
    Route::match(['post'], 'assignment/withdrawal', 'assignmentController@withdrawal')->name('assignment.withdrawal');

    Route::resource('milleage', 'milleageController');
    Route::match(['post'], 'milleage/costchange', 'milleageController@costchange')->name('milleage.costchange');

    Route::get('reports/getvehicle', 'VehiclereportController@getVehicle')->name('reports.printvehicles');
    Route::match(['post'], '/reports/vehicle', 'VehiclereportController@getVehicleReport')->name('report.vehicle');

    Route::get('reports/getaccident', 'AccidentreportController@getAccident')->name('reports.printaccidents');
    Route::match(['post'], '/reports/accident', 'AccidentreportController@getAccidentReport')->name('report.accident');

    Route::get('reports/getmaintenance', 'MaintenancereportController@getMaintenance')->name('reports.printmaintenances');
    Route::match(['post'], '/reports/maintenance', 'MaintenancereportController@getMaintenanceReport')->name('report.maintenance');

    Route::get('reports/generalreport', 'GeneralreportController@getGeneral')->name('reports.printgenerals');
    Route::match(['post'], '/reports/general', 'GeneralreportController@getGeneralReport')->name('report.general');

    Route::resource('accident', 'AccidentController');
    Route::get('accident/{id}/{vehicle_id}', 'AccidentController@show')->name('accident.show');;

    Route::resource('fuel', 'FuelController');

    Route::resource('document', 'DocumentController');
    Route::resource('vehiclepaper', 'VehiclePaperController');
    Route::match(['post'], 'vehiclepaper/{$id}', 'VehiclePaperController@show');
   
   
});

Route::get('/test', 'HomeController@test');
