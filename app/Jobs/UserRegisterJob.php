<?php

namespace App\Jobs;

use App\Models\Log;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log as Logger;

class UserRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::query()->create([
            'user_id' => $this->user->id,
            'user_ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'action' => 'register',
            'model' => get_class($this->user),
            'inputs' => [
                'name' => $this->user->name,
                'email' => $this->user->email
                ]
        ]);

        Logger::info('New User Created : ', $this->user->toArray());

    }
}
