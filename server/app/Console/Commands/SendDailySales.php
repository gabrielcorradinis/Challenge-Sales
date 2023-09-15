<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sale;
use App\Models\Seller; 
use App\Mail\DailySalesReport;
use Illuminate\Support\Facades\Mail;

class SendDailySales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:daily-sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily sales to seller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $sales = Sale::with('seller')->whereDate('created_at', today())->get();
        
        Mail::to('gabrielcorradinisiqueira@gmail.com')->send(new DailySalesReport($sales));

        $this->info('Sales email sent successfully!');
    }
    
}
