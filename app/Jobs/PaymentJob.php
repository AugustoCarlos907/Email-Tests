<?php

namespace App\Jobs;

use App\Mail\PaymentMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class PaymentJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected User $user)
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email , $this->user->name)->send(
            new PaymentMail($this->user));
        
    }
}
