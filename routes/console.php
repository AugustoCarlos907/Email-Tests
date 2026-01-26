<?php

use App\Jobs\ExemploJob;
use App\Jobs\GerarRelatorioJob;
use App\Mail\RelatorioDiarioMail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('logs:clear')->dailyAt('02:00');

Schedule::job(new GerarRelatorioJob())->daily();

Schedule::call(function () {
    \Log::info('Rodou no Laravel 12');
})->everyFifteenSeconds();

Schedule::call(function () {
    Mail::to('admin@email.com')
        ->send(new RelatorioDiarioMail());
})->dailyAt('08:00');

// ->everyMinute()
// ->everyFiveMinutes()
// ->hourly()
// ->daily()
// ->dailyAt('08:00')
// ->weekly()
// ->monthly()
// ->yearly()


// Laravel 12 sem Cron (quando usar)
// Executar manualmente
// php artisan schedule:run

// Executar em background
// php artisan schedule:work


// Fluxo real:
// Schedule
//   ↓
// Job
//   ↓
// Queue
//   ↓
// Supervisor
// Supervisor monitora a fila e executa os jobs conforme agendado




Schedule::job(new ExemploJob())->everyMinute();

// Schedule::call(function () {
//     DB::table('recent_users')->delete();
// })->daily();