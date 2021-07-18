<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id', '!=' , 1)->orWhereNull('id')->get();
        foreach ($users as $user){
            $user->attachRole('administrator');
        }
    }
}
