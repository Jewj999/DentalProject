<?php

use App\Municipality;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('{dpto}/municipalities', 'Admin\MunicipalityController@list');
Route::post('job', 'Admin\ConsultationController@saveJob');
Route::get('detail/{consultation_id}/{tooth_id}', 'Admin\ConsultationController@getJob');
