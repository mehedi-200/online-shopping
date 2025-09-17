<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class secondCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 's:c {name} {--uppercase}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $uppercase = $this->option('uppercase');

        $user = User::where('name', $name)->first();

        if(!$user){
            $this->info('User not found.');
            return 0;
        }

        $message = 'User: ' . $user->name . ' | Email: ' . $user->email;

        if($uppercase){
            $message = strtoupper($message);
        }

        $this->info($message);
    }

}
