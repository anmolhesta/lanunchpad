<?php

namespace App\Console\Commands;

use App\Jobs\PingJob;
use App\Models\User;
use Illuminate\Console\Command;

class PingJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // PingJob::dispatch();
    //    $data=  PingJob::dispatch(User::inRandomOrder()->first()->toArray());
       PingJob::dispatch()->onConnection('rabbitmq');
    }
}
