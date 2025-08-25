<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-unverified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete accounts that have not been verified for more than 7 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = User::whereNull('email_verified_at')
            ->where('created_at', '<', Carbon::now()->subDays(1))
            ->delete();

        $this->info("Deleted {$deleted} unverified users.");
    }
}
