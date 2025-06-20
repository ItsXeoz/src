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
                'name' => 'Khabibs',
                'email' => 'b',
                'nim' => '1227050004',
                'role' => 'user',
                'password' => bcrypt('admin1234') 
            ],
        ];
        

        foreach($userdata as $key => $val){
            User::create($val);
        }

    }
}
