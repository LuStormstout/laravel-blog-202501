<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'LuStormstout';
        $user->email = 'lustormstout@gmail.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true; // 指定用户 ID 为 1 的用户为管理员
        $user->save();
    }
}
