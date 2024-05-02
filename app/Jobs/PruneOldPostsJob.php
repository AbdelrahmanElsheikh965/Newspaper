<?php

namespace App\Jobs;

use App\Models\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Throwable;

class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $tries = 3;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * The code to be executed in the background
     * PruneOldPostsJob that when dispatched it: [deletes posts that are created from 1 hour ago]
     * @return void
     */
    public function handle()
    {
        Post::where('created_at', '=', Carbon::now()->subHour())->delete();
        // throw new Exception("asd");
    }

    public function failed(Exception $e) 
    {
        info($e . "Failed Job");
    }
}
