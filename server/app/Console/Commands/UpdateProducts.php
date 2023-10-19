<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TrayController;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update products from the store';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $trayController = new TrayController;
        $trayController->getAndImportProducts();
        $this->info('Products updated successfully.');
    }
}
