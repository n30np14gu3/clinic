<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function (){return view('pages.main');});
Route::get('/patient_report', ['uses' => 'InfoController@patientReportPrepare']);
Route::get('/get_report', ['uses' => 'InfoController@getReport']);
Route::get('/new_report', ['uses' => 'InfoController@newReportPrepare']);
Route::get('/new_medic',function (){return view('pages.new_medic');});

Route::group(['prefix' => 'info'], function(){
   Route::get('calls_by_day', ['uses' => 'InfoController@getCallsToday']);
   Route::get('ill', function (){return view('pages.ill'); });
    Route::get('medic_info', ['uses' => 'InfoController@getMedicInfoPrepare']);
    Route::get('medic_info', ['uses' => 'InfoController@getMedicInfoPrepare']);

});

Route::group(['prefix' => 'ajax'], function(){

    Route::get('ill', ['uses' => 'InfoController@getIlls']);
    Route::get('medic_info', ['uses' => 'InfoController@getMedicInfo']);

    Route::post('new_report', ['uses' => 'InfoController@newReport']);
    Route::post('new_medic', ['uses' => 'InfoController@newMedic']);
});
