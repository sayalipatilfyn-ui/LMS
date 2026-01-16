<?php

namespace App\Console\Commands;

use App\Models\Courses;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CourseMinuteSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course-minute-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run course related task every minute';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         Courses::where('status', 'draft')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->update(['status' => 'published']);

        Cache::flush();

        $this->info('Course scheduler executed successfully.');
    }
}
