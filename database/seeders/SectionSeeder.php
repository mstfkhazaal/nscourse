<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Section::upsert([
           [
               'id' => 1,
               'name' => json_encode(['en' => 'HTML',
                   'ar' => 'HTML']),
               'active' => true,
               'course_id'=> 1,
               'order'=>1,
               'parent_id'=> null,
           ],
           [
               'id' => 2,
               'name' => json_encode([
                   'en' => 'CSS',
                   'ar' => 'CSS']),
               'active' => true,
               'course_id'=> 1,
               'order'=>2,
               'parent_id'=> null,
           ],
           [
               'id' => 3,
               'name' => json_encode([
                   'en' => 'Javascript',
                   'ar' => 'Javascript']),
                'active' => true,
               'course_id'=> 1,
               'order'=>3,
               'parent_id'=> null,
           ],
           [
               'id' => 4,
               'name' => json_encode([
                   'en' => 'Web Development Sample Project [Step by step guidance]',
                   'ar' => 'مشروع نموذج تطوير الويب [إرشادات خطوة بخطوة]']),
                'active' => true,
               'course_id'=> 1,
               'order'=>4,
               'parent_id'=> null,
           ],

           [
               'id' => 5,
               'name' => json_encode(['en' => 'Understand Artificial Intelligence',
                   'ar' => 'افهم الذكاء الاصطناعي']),
               'active' => true,
               'course_id'=> 2,
               'order'=>1,
               'parent_id'=> null,
           ],
           [
               'id' => 6,
               'name' => json_encode([
                   'en' => 'Understand Machine Learning',
                   'ar' => 'افهم تعلم الآلة']),
               'active' => true,
               'course_id'=> 2,
               'order'=>2,
               'parent_id'=> null,
           ],
           [
               'id' => 7,
               'name' => json_encode([
                   'en' => 'Machine Learning techniques',
                   'ar' => 'تقنيات التعلم الآلي']),
               'active' => true,
               'course_id'=> 2,
               'order'=>3,
               'parent_id'=> null,
           ],
           [
               'id' => 8,
               'name' => json_encode([
                   'en' => 'IMPORTANT: Bonus lecture',
                   'ar' => 'هام: محاضرة إضافية']),
               'active' => true,
               'course_id'=> 2,
               'order'=>4,
               'parent_id'=> null,
           ],
       ], ['id', 'name', 'description','course_id', 'parent_id', 'active']);
    }
}
