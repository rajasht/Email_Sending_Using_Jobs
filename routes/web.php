<?php

use App\Mail\BirthdayReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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


// -------------------------------- Sending Mail using Job - Method 1 -----------------------------------

/**
 * Route to send Mail using Job
 * dispatch function is used to queue the job
 * executing sending of mail in a callby function
 * made the dispatch function execute after 5 seconds
 * return an Acknowledge message " Birthday Mail Sent Successfully." on successfull execution of dispatch function
 */

/*
Route::get('/send-mail', function () {
    dispatch(function(){
        Mail::to("sagnik@sht.com")
            ->send(new BirthdayReminder);
    })->delay(now()->addSeconds(5));
    echo "Birthday Mail Sent Successfully.";
});
*/

// -------------------------------- Sending Mail using Job - Method 2 -----------------------------------

/**
 * Route to send Mail using Job
 * dispatch function is used to queue the job
 * executing sending of mail in a callby function
 * made the dispatch function execute after 5 seconds
 * return an Acknowledge message " Birthday Mail Sent Successfully." on successfull execution of dispatch function
 */


Route::get('/send-mail', function () {
    dispatch(function(){
        Mail::to("sagnik@sht.com")
            ->send(new BirthdayReminder);
    })->delay(now()->addSeconds(5));
    echo "Mail Sent.";
});


