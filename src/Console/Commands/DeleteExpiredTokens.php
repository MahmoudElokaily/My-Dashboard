<?php

namespace Elokaily\Dashboard\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'tokens:clean-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tokens older than 10 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredTime = Carbon::now()->subMinutes(10);
        \DB::table('password_reset_tokens')
            ->where('created_at', '<', $expiredTime)
            ->delete();
        $this->info('Expired tokens deleted successfully.');
    }
}
