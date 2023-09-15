<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\Sales;
use Illuminate\Queue\SerializesModels;

class DailySalesReport extends Mailable
{
    use SerializesModels;

    public $sales;

    public function __construct($sales)
    {
        $this->sales = $sales;
    }

    public function build()
    {
        return $this->subject('Daily Sales Report')->view('emails.daily-sales-report');
    }
}
