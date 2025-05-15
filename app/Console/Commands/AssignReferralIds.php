<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class AssignReferralIds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'referrals:assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign unique referral IDs to users who don\'t have one';

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
        $users = \App\Models\User::whereNull('referral_id')->get();

        foreach ($users as $user) {
            $user->referral_id = \App\Models\User::generateReferralId();
            $user->save();
        }

        $this->info('Referral IDs assigned to existing users.');
    }

}
