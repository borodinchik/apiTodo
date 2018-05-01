<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 50)->create();
        factory(Task::class, 100)->create();

    }
}
