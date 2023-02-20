<?php

namespace App\Console\Commands;

use App\Http\Middleware\TrimStrings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommad extends Command
{

    protected $signature = 'shop:refresh';
    protected $description = 'refresh';


    public function handle()
    {
        if(app()->isProduction()){
            return  Command::FAILURE;
        }
        Storage::deleteDirectory('images/products');
        $this->call('migrate:fresh', ['--seed' => true]);
//        Storage::createDirectory('images/products');
        return Command::SUCCESS;
    }
}
