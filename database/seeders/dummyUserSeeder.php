<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class dummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'nim' => '1227051234',
                'role' => 'admin',
                'password' => bcrypt('admin1234') 
            ],
        ];
        

        foreach($userdata as $key => $val){
            User::create($val);
        }

    }
}
