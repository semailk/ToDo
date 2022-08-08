<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory([
            'email' => 'admin@mail.ru',
            'password' => Hash::make('adminadmin'),
            'name' => 'Admin'
        ])->create();

        for ($i = 0; $i < 20; $i++) {
            $task = Task::factory()->create();
            $user->tasks()->attach($task->id);
        }
    }
}
