<?php

use App\Models\Customer;
use App\Jobs\BirthadyWish;
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
 * executing sending of mail in a closure function with BirthdayRemainder Mail file
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

// -------------------------------- Sending Mail using Job - Method 2 and 3 -----------------------------------

/**
 * Route to send Mail using Job
 * In Method 2 and Method 3 dispatch function is used to queue the BirthdayWish Job
 * made the dispatch function execute after 5 seconds
 * return an Acknowledge message "Mail Sent." on successfull execution of dispatch function by Method 2
 * return an Acknowledge message "Birthday wish Sent successfully." on successfull execution of dispatch function by Method 3
 */

/*
Route::get('/send-mail', function () {
    
    // dispatch(new BirthadyWish)->delay(now()->addSeconds(5));             // Method 2
    // echo "Mail Sent.";

    BirthadyWish::dispatch()->delay(now()->addSeconds(5));                  // Method 3
    echo "Birthday wish Sent successfully.";
    
});
*/

//----------------------Sending Mail using Job - Method 4-------------------------------

/**
 * Route to send Mail using Job
 * In Method 4 we are getting the all data of customer having user id 5
 * and storing it in our local customer variable
 * Dispatch function is used to queue the BirthdayWish Job
 * the findorFail method will trrow error if the model is not present
 * made the dispatch function execute after 5 seconds
 * return an Acknowledge message "Birthday wish Sent." on successfull execution of dispatch function
 */


Route::get('/send-mail', function () {
    $customer = Customer::findorFail(5);        // getiing the data of customer having id 5
    BirthadyWish::dispatch($customer)->delay(now()->addSeconds(5));
    echo "Birthday wish Sent.";
});
