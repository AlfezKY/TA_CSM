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
        // Generate tagihan periode berjalan (aman karena updateOrCreate).
        $schedule->command('tagihan:generate')->dailyAt('00:05');

        // Kirim reminder H-1/H/H+1 (jalankan berkala agar tidak miss).
        $schedule->command('tagihan:remind')->hourly();
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

