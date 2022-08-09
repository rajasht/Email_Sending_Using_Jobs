<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\BirthdayReminder;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class BirthadyWish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Customer $customer;

    /**
     * Create a new job instance.
     * initialised local variable customer with passed customer value
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     * Uses Mail class of facades to execute mail sending operation
     * to() method takes email of customer variable
     * BirthdayRemainder is the Mail class whose instance is created with customer object
     * @return void
     */
    public function handle()
    {
        Mail::to($this->customer->email)
        ->send(new BirthdayReminder($this->customer));
    }
}
