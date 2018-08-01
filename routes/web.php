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

Route::get('/', function () {
    return view('welcome');
});

Route::get('my-home', 'HomeController@myHome');
Route::get('my-users', 'HomeController@myUsers');
Route::get('my-form', 'HomeController@myForm');

Route::get('document-list', 'DocumentController@getDocuments');
Route::get('create-document', 'DocumentController@createDocumentForm');
Route::post('create-document', 'DocumentController@createDocument');

Route::get('edit-document/{id}', 'DocumentController@getDocument');
Route::post('edit-value/{id}', 'DocumentController@saveValue');
Route::post('delete-document/{id}', 'DocumentController@deleteDocument');

Route::get('export-documents', 'DocumentController@exportDocuments');

Route::get('download-document/{id}', 'DocumentController@downloadDocument');
Route::get('upload-document/{id}', 'DocumentController@uploadDocument');
