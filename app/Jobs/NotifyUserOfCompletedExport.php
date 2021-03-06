<?php

namespace App\Jobs;

use App\Notifications\ExportReady;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $fileName;

    /**
     * Create a new job instance.
     *
     * @param \App\User $user
     * @param string $fileName
     * @return void
     */
    public function __construct(User $user, $fileName)
    {
        $this->user = $user;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new ExportReady($this->fileName));
    }
}
