<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;
use App\Comment;

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
        factory(User::class, 2)->create();
        factory(Task::class, 50)->create();
        factory(Comment::class, 100)->create();

    }
}
