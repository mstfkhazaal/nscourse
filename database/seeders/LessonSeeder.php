<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::upsert([
            [
                'id' => 1,
                'title' => json_encode([
                    'en' => 'Introduction to HTML (HTML Basics) Part 1',
                    'ar' => 'مقدمة إلى HTML (أساسيات HTML) الجزء الأول']),
                'section_id'=> 1,
                'duration'=> null,
                'active' => true,
            ],
            [
                'id' => 2,
                'title' => json_encode([
                    'en' => 'Introduction to HTML (HTML Basics) Part 2',
                    'ar' => 'مقدمة إلى HTML (أساسيات HTML) الجزء الثاني']),
                'section_id'=> 1,
                'duration'=> null,
                'active' => true,

            ],
            [
                'id' => 3,
                'title' => json_encode([
                    'en' => 'Introduction to HTML (HTML Basics) Part ٣',
                    'ar' => 'مقدمة إلى HTML (أساسيات HTML) الجزء الثالث']),
                'section_id'=> 1,
                'duration'=> null,
                'active' => true,
            ],
            [
                'id' => 4,
                'title' => json_encode([
                    'en' => 'Introduction to HTML (HTML Basics) Part 4',
                    'ar' => 'مقدمة إلى HTML (أساسيات HTML) الجزء الرابع']),
                'section_id'=> 1,
                'duration'=> null,
                'active' => true,

            ],
            [
                'id' => 5,
                'title' => json_encode([
                    'en' => 'Introduction to HTML (HTML Basics) Part 5',
                    'ar' => 'مقدمة إلى HTML (أساسيات HTML) الجزء الخامس']),
                'section_id'=> 1,
                'duration'=> null,
                'active' => true,
            ],
            [
                'id' => 6,
                'title' => json_encode([
                    'en' => 'CSS - Introduction',
                    'ar' => 'CSS - مقدمة']),
                'section_id'=> 2,
                'duration'=> null,
                'active' => true,

            ],
            [
                'id' => 7,
                'title' => json_encode([
                    'en' => 'CSS - Video 2',
                    'ar' => 'CSS - فيديو 2']),
                'section_id'=> 2,
                'duration'=> null,
                'active' => true,

            ],
            [
                'id' => 8,
                'title' => json_encode([
                    'en' => 'CSS - Video 3',
                    'ar' => 'CSS - فيديو 3']),
                'section_id'=> 2,
                'duration'=> null,
                'active' => true,
            ],
        ], ['id', 'title', 'description', 'duration', 'section_id', 'active']);
    }
}
