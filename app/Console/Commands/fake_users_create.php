<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class fake_users_create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create {--number=30}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(!User::find(1)?->email == 'pniaps@gmail.com'){
            DB::table('users')->truncate();

            User::create([
                'name' => 'Pedro Peña',
                'email' => 'pniaps@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('demo'),
                'remember_token' => Str::random(10)
            ]);

        }

        User::whereFake(true)->delete();

        User::unguard();

        $number = (int)$this->option('number');

        $password = Hash::make('password');

        for($x = 0 ; $x < $number; $x++){
            $date = fake()->dateTimeBetween('-6 months');
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => $password,
                'remember_token' => Str::random(10),
                'created_at' => $date,
                'updated_at' => $date,
                'fake' => true
            ]);
        }
    }
}
