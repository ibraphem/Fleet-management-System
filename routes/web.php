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

    Route::resource('vehicleusers', 'VehicleUserController');
    Route::match(['post'], 'vehicleusers/{$id}', 'VehicleUserController@show');

    Route::resource('maintenance', 'MaintenanceController');
    Route::resource('maintenanceroutine', 'MaintenanceRoutineController');

    Route::resource('schedulemaintenance', 'ScheduleMaintenanceController');
    Route::match(['post'], 'schedulemaintenance/complete', 'SchedulemaintenanceController@complete')->name('schedulemaintenance.complete');

    Route::resource('assignment', 'assignmentController');
    Route::resource('withdrew', 'WithdrawController');
    Route::match(['post'], 'assignment/withdrawal', 'assignmentController@withdrawal')->name('assignment.withdrawal');

    Route::resource('milleage', 'milleageController');
    Route::match(['post'], 'milleage/costchange', 'milleageController@costchange')->name('milleage.costchange');

    Route::get('reports/getvehicle', 'VehiclereportController@getVehicle')->name('reports.printvehicles');
    Route::get('reports/getvehiclereport', 'VehicleReportController@getVehicleReport')->name('reports.getvehiclereport');

    Route::get('reports/getaccident', 'AccidentreportController@getAccident')->name('reports.printaccidents');
    Route::get('reports/getaccidentreport', 'AccidentReportController@getAccidentReport')->name('reports.getaccidentreport');

    Route::get('reports/getmaintenance', 'MaintenancereportController@getMaintenance')->name('reports.printmaintenances');
    Route::get('reports/getmaintenancereport', 'MaintenanceReportController@getMaintenanceReport')->name('reports.getmaintenancereport');

    Route::get('reports/generalreport', 'GeneralreportController@getGeneral')->name('reports.printgenerals');
    Route::get('reports/getgeneralreports', 'GeneralreportController@getgeneralReport')->name('reports.getgeneralreports');

    Route::resource('accident', 'AccidentController');
    Route::get('accident/{id}/{vehicle_id}', 'AccidentController@show')->name('accident.show');;

    Route::resource('fuel', 'FuelController');

    Route::resource('document', 'DocumentController');
   
   
});

Route::get('/test', 'HomeController@test');
