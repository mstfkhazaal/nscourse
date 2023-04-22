<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::upsert([
            [
                'id' => 1,
                'name' => json_encode(['en' => 'Introduction to Web Development',
                    'ar' => 'مقدمة في تطوير الويب']),
                'description' => json_encode([
                    'en' => 'This course covers the basics of web development, including HTML, CSS, and JavaScript, as well as the tools and technologies used to create web applications.',
                    'ar' => 'تغطي هذه الدورة أساسيات تطوير الويب، بما في ذلك HTML و CSS و JavaScript، بالإضافة إلى الأدوات والتقنيات المستخدمة في إنشاء تطبيقات الويب.']),
                'active' => true,
            ],
            [
                'id' => 2,
                'name' => json_encode([
                    'en' => 'Introduction to Machine Learning',
                    'ar' => 'مقدمة في التعلم الآلي']),
                'description' => json_encode([
                    'en' => 'This course provides an introduction to machine learning, including supervised and unsupervised learning, as well as popular algorithms and applications.',
                    'ar' => 'توفر هذه الدورة مقدمة في التعلم الآلي، بما في ذلك التعلم المشرف وغير المشرف، بالإضافة إلى الخوارزميات الشائعة والتطبيقات.']),
                'active' => true,
            ],
            [
                'id' => 3,
                'name' => json_encode([
                    'en' => 'Introduction to Digital Marketing',
                    'ar' => 'مقدمة في التسويق الرقمي']),
                'description' => json_encode([
                    'en' => 'This course introduces the principles and practices of digital marketing, including search engine optimization, social media marketing, and email marketing.',
                    'ar' => 'تعرف هذه الدورة الطلاب على مبادئ وممارسات التسويق الرقمي، بما في ذلك تحسين محركات البحث، وتسويق وسائل التواصل الاجتماعي، والتسويق عبر البريد الإلكتروني.']),
                'active' => true,
            ],
        ], ['id', 'name', 'description', 'active']);
    }
}
