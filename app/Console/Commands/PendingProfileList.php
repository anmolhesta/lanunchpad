<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Console\Command;
use App\Notifications\UserProfilePendingList;

class PendingProfileList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:pending-profile-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utility command to list all pending profiles.';

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
        $userList = UserProfile::with('user')->whereNull('ref_status_id')->orWhere('ref_status_id',1)->get();
        $admin = User::whereHas('roles', function($q) {
            return $q->where('name', 'Admin');
        })->first();
        if(!$userList->isEmpty()) {
            $admin->notify(new UserProfilePendingList($userList));
        }
    }
}
