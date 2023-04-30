<?php

namespace Database\Seeders;

use App\Models\SectionClass;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::upsert([
            [
                'id' => 1,
                'name' => 'Student 1',
                'section_class_id'=>1,
                'active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Student 2',
                'section_class_id'=>1,
                'active' => true,
            ],
            [
                'id' => 3,
                'name' => 'Student 3',
                'section_class_id'=>2,
                'active' => true,
            ],
        ], ['id', 'name','classs_id', 'active']);
    }
}
