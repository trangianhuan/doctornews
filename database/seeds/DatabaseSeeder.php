<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $departments = [
            [
                'name' => 'Khoa Ngoai',
            ],
            [
                'name' => 'Co xuong khop',
            ],
            [
                'name' => 'Khoa Noi Tong Hop',
            ]
        ];
        for ($i=0 ; $i < 10; $i++) {
            $department =[
                'name' => 'Ten Khoa ' . ($i+1)
            ];
            Department::create($department);
        }

    }
}
