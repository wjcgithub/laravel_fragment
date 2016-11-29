<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('pipe', 'PipeController@index');
Route::get('reduce', 'PipeController@reduce');

//queue
Route::get('addqueue', 'QueueController@reduce');
Route::get('mail/send/queue/{id}', 'QueueController@sendReminderEmail');

//email
Route::get('mail/send','MailController@send');