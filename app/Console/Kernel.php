<?php

namespace App\Console;

use App\Console\Commands\MakeInterface;
use App\Console\Commands\QueueWorker;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        // database backup into google drive
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('01:30');

        $schedule->command('backup:monitor')->daily()->at('03:00');
        $schedule->command('app:queue-worker')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $commands = [
        // ...
        MakeInterface::class,
        QueueWorker::class
    ];
}
