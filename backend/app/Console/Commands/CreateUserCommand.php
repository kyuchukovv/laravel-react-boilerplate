<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--u|username= : string Username} {--e|email= : string E-Mail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

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
    public function handle(): int
    {
        $name = $this->option('username');
        if ($name === null) {
            $name = $this->ask('Please enter your username.');
        }

        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter your E-Mail.');
        }
        $password = $this->secret('Please enter a new password.');

        $input = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];
        try {
            $user = (new CreateNewUser())->create($input);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 0;
        }

        $this->info(sprintf("User:[%s] created successfully!", $user->id));
        return 1;
    }
}
