<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BirthdayReminder extends Mailable
{
    use Queueable, SerializesModels;

    public Customer $customer;

    /**
     * Create a new message instance.
     * initaliased local customer variable with parsed customer value of job
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     * uses markdown blade view named birthday and send all parsed value there
     * @return $this
     */
    public function build()
    {
        return $this->markdown('birthday');
    }
}
