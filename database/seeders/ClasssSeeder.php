<?php

namespace Database\Seeders;

use App\Models\Classs;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Classs::upsert([
            [
                'id' => 1,
                'name' => 'Class 1',
                 'active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Class 2',
                'active' => true,
            ],
            [
                'id' => 3,
                'name' => 'Class 3',
                'active' => true,
            ],
        ], ['id', 'name', 'active']);
    }
}
