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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...



    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Patient
    Route::get('pacientes', 'PacienteController@list')->name('pacientes.list');
    Route::post('pacientes', 'PacienteController@create')->name('pacientes.create');
    Route::get('pacientes/{patient}/edit', 'PacienteController@edit')->name('pacientes.edit');
    Route::put('pacientes/{patient}', 'PacienteController@update')->name('pacientes.update');
    Route::post('patient/search', 'PacienteController@search')->name('paciente.search');
    Route::any('pacientes/{id}/destroy', 'PacienteController@destroy')->name('pacientes.destroy');

    Route::get('pacientes/new', 'PacienteController@new')->name('pacientes.new');
    Route::get('pacientes/{id}', 'PacienteController@show')->name('pacientes.show');

    //Services
    Route::get('servicios/list', 'ServiceController@list')->name('servicios.list');
    Route::get('servicios/new', 'ServiceController@new')->name('servicios.new');
    Route::post('servicios', 'ServiceController@create')->name('servicios.create');
    Route::get('servicios/{service}/edit', 'ServiceController@edit')->name('servicios.edit');
    Route::put('servicios/{service}', 'ServiceController@update')->name('servicios.update');
    Route::any('servicios/{id}/destroy', 'ServiceController@destroy')->name('servicios.destroy');

    //Logs
    Route::get('logs', 'LogController@index')->name('logs.list')->middleware('secretary');

    //Users
    Route::get('users', 'UserController@index')->name('users')->middleware('secretary');
    Route::get('users/restore', 'UserController@restore')->name('users.restore');
    Route::get('users/new', 'UserController@new')->name('users.new');
    Route::get('users/{id}/restore', 'UserController@restoreUser')->name('users.restore-user');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::post('users', 'UserController@create')->name('users.create');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::any('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    // Appointment
    Route::get('appointment', 'AppointmentController@index')->name('appointment.list');
    Route::get('appointment/create/{patient_id}', 'AppointmentController@create')->name('appointment.create');
    Route::post('appointment', 'AppointmentController@store')->name('appointment');
    Route::get('appointment/{appointment_id}', 'AppointmentController@edit')->name('appointment.edit');
    Route::any('appointment/{id}/destroy', 'AppointmentController@destroy')->name('appointment.destroy');
    Route::post('appointment/update', 'AppointmentController@update')->name('appointment.update');
    Route::post('appointment/search', 'AppointmentController@search')->name('appointment.search');

    // Turn
    Route::get('turn', 'TurnController@index')->name('turn');
    Route::get('turn/patient', 'TurnController@patientList')->name('turn.patient');
    Route::get('turn/next/{patient_id}', 'TurnController@nextPatient')->name('turn.next');
    Route::get('turn/appointment', 'TurnController@appointmentList')->name('turn.appointment');
    Route::get('turn/insert/{appointment_id}', 'TurnController@nextAppointment')->name('turn.next.appointment');
    Route::post('turn/search', 'PacienteController@search')->name('turn.search');


    // Consultation
    Route::get('consultation/{turn_id}', 'ConsultationController@store')->name('consultation');
    Route::get('turn/consultation', 'ConsultationController@index')->name('turn.consultation');
    Route::get('consultation', 'ConsultationController@show')->name('consultation.active')->middleware('secretary');
    Route::post('consultation', 'ConsultationController@update')->name('consultation.update');
    Route::get('consultation/pdf/{consultation_id}', 'ConsultationController@createPDF')->name('consultation.pdf');

    // Report
    Route::get('report', 'ReportController@index')->name('report')->middleware('secretary');
    Route::post('report/search', 'ReportController@search')->name('report.search');
    Route::get('report/pdf', 'ReportController@generalReport')->name('report.pdf');

    //Audits
    Route::get('audits', 'AuditController@index')->name('audits');
});

Route::get('/', 'Admin\DashboardController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . 'protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
