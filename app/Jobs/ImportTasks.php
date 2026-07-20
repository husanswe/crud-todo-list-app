<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Task;

class ImportTasks implements ShouldQueue
{
    use Queueable;

    public function __construct(public array $titles, public int $userId)
    {
        
    }

    public function handle(string $job): void
    {
        $this->job = $job;

        foreach($this->titles as $title) {
            if(trim($title) === '') {
                continue;
            }
        }

        Task::create([$user_id = $this->userId]);
    }
}
