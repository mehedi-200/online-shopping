<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyFirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:first_command {name?} {age?} {--greet} {--excited}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my first command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name')?? $this->ask('What is your name?');
        $age = $this->argument('age') ?? 'Unknown';

        if ($this->option('greet')) {
            $message = 'Greetings, ' . $name;
        } else {
            $message = 'Hello, ' . $name;
        }

        if ($this->option('excited')) {
            $message .= '!!!'; // message শেষে তেজ বা excitement যোগ
        } else {
            $message .= '.';
        }

        $this->info($message . ' Your age is ' . $age);
    }

}
