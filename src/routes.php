<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/massive-upload/get-actions', 'Delfosteam\Massive\Controllers\MassiveUploadController@getActions');
Route::get('/api/massive-upload/get-action', 'Delfosteam\Massive\Controllers\MassiveUploadController@getAction');
Route::get('/api/massive-upload/get-models', 'Delfosteam\Massive\Controllers\MassiveUploadController@getModels');
Route::post('/api/massive-upload/uploader', 'Delfosteam\Massive\Controllers\MassiveUploadController@uploader');

Route::get('/api/massive-upload-log/show', 'Delfosteam\Massive\Controllers\MassiveUploadLogController@show');
Route::get('/api/massive-upload-log/get', 'Delfosteam\Massive\Controllers\MassiveUploadLogController@get');
Route::get('/api/massive-upload-log/list', 'Delfosteam\Massive\Controllers\MassiveUploadLogController@list');
