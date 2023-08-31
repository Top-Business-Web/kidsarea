<?php

namespace App\Console;

use App\Console\Commands\ExitChildren;
use App\Console\Commands\SyncNewRecords;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel{

    protected $commands = [ExitChildren::class,SyncNewRecords::class];


    protected function schedule(Schedule $schedule){

        // $schedule->command('exit:children')->dailyAt('14:10');
        $schedule->command('sync:new-records')->everyMinute(); // Adjust the schedule as needed

    }


    protected function commands(){

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
