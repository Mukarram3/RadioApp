<?php

namespace App\Jobs;

use App\Models\sendcode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class deletepincode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email=$email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $table= sendcode::where('email',$this->email)->first();
        $table->delete();
    }
}
