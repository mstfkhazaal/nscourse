<?php

namespace Database\Seeders;

use App\Models\Classs;
use App\Models\SectionClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionClass::upsert([
            [
                'id' => 1,
                'name' => 'A',
                'classs_id'=>1,
                'active' => true,
            ],
            [
                'id' => 2,
                'name' => 'B',
                'classs_id'=>1,
                'active' => true,
            ],
            [
                'id' => 3,
                'name' => 'A',
                'classs_id'=>2,
                'active' => true,
            ],
        ], ['id', 'name','classs_id', 'active']);
    }
}
