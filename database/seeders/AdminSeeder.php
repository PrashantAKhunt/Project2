<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin10',
            'email' => 'admin10@gmail.com',
            'branch_id'=>0,
            'password' => Hash::make('admin@1234'),
        ]);
        $user->attachRole(1);
    }
}
