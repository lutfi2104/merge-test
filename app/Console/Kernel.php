<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('app:kirim-email-notifikasi-command')->everyMinute();
        $schedule->command('export:pengujians')->everyMinute();
        // $schedule->command('app:send-wa-command')->everyMinute();
        // $schedule->command('db:backup')->everyMinute();
        // $schedule->command('app:send-whatsapp-notification')->everyMinute();
        $schedule->command('report:daily')->dailyAt('18:00');
        $schedule->command('backup:clean')->daily()->at('00:04');
        $schedule->command('backup:run')->dailyAt('17:00');
        $schedule->command('backup:run')->dailyAt('01:00');
        $schedule->command('backup:run')->dailyAt('09:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
