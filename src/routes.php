<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/massive-upload/get-actions', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadController@getActions');
Route::get('/api/massive-upload/get-action', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadController@getAction');
Route::get('/api/massive-upload/get-models', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadController@getModels');
Route::post('/api/massive-upload/uploader', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadController@uploader');

Route::get('/api/massive-upload-log/show', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadLogController@show');
Route::get('/api/massive-upload-log/get', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadLogController@get');
Route::get('/api/massive-upload-log/list', 'Delfosteam\FCHA-Massive\Controllers\MassiveUploadLogController@list');
