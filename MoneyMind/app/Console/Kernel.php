<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('salary:add')->dailyAt('12:00'); // ->everyMinute()
        $schedule->command('app:depenses_recurrentes')->everyMinute();//dailyAt('12:00'); // ->everyMinute()
        // $schedule->command('wish:buy')->everyMinute();//dailyAt('12:00'); // ->everyMinute()
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}



// php artisan salary:add
// php artisan app:depenses_recurrentes

// pour executer les commendes
