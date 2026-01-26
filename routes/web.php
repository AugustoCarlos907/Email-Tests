<?php

use App\Http\Controllers\ContactController;
use App\Jobs\PaymentJob;
use App\Jobs\TesteJob;
use App\Mail\PaymentMail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Auth::loginUsingId(1);

    return view('welcome');
});


Route::get('/contact', [ContactController::class , 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class , 'sendMail'])->name('contact.sendMail');

Route::get('/payment', function () {
    //pagamento
    //envio email de confirmação

    $user = Auth::user();
    
    // dispatch job para envio do email
    // PaymentJob::dispatch($user);

    TesteJob::dispatch();
    // Definindo a fila 'payments' para o job
    PaymentJob::dispatch($user)->onQueue('payments');

    // Adicionando um atraso de 10 segundos
    // PaymentJob::dispatch($user)->delay(now()->addSeconds(10));

    var_dump('done');

    // php artisan queue:work --queue=default,payments

});