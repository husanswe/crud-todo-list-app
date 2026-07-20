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

    public function handle(): void
    {
        foreach($this->titles as $title) {
            if(trim($title) === '') {
                continue;
            }
            
            Task::create([
                'title' => $title,
                'user_id' => $this->userId
            ]);
        }

    }
}
