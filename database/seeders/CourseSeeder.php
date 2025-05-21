<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'image' => asset('images/course_image_1.jpg'),
                'translations' => [
                    'en' => [
                        'title' => 'Computer Basics',
                        'description' => 'Learn the essential computer skills needed for work and daily use.',
                        'instructor' => 'John Smith',
                        'category' => 'IT Basics'
                    ],
                    'ar' => [
                        'title' => 'أساسيات الحاسوب',
                        'description' => 'تعلم المهارات الأساسية في استخدام الحاسوب للعمل والاستخدام اليومي.',
                        'instructor' => 'جون سميث',
                        'category' => 'أساسيات تقنية'
                    ]
                ]
            ],
            [
                'image' => asset('images/course_image_2.jpg'),
                'translations' => [
                    'en' => [
                        'title' => 'Digital Marketing',
                        'description' => 'Understand the foundations of online marketing and social media strategy.',
                        'instructor' => 'Sara Lee',
                        'category' => 'Marketing'
                    ],
                    'ar' => [
                        'title' => 'التسويق الرقمي',
                        'description' => 'فهم أساسيات التسويق الإلكتروني واستراتيجيات وسائل التواصل.',
                        'instructor' => 'سارة لي',
                        'category' => 'تسويق'
                    ]
                ]
            ],
            [
                'image' => asset('images/course_image_3.jpg'),
                'translations' => [
                    'en' => [
                        'title' => 'Laravel Course',
                        'description' => 'Master the Laravel framework and build modern PHP applications.',
                        'instructor' => 'Ahmed Youssef',
                        'category' => 'Web Development'
                    ],
                    'ar' => [
                        'title' => 'كورس لارافيل',
                        'description' => 'إتقان إطار عمل لارافيل وبناء تطبيقات PHP حديثة.',
                        'instructor' => 'أحمد يوسف',
                        'category' => 'تطوير ويب'
                    ]
                ]
            ],
            [
                'image' => asset('images/course_image_4.jpg'),
                'translations' => [
                    'en' => [
                        'title' => 'Multimedia',
                        'description' => 'Explore audio, video, and graphic design tools.',
                        'instructor' => 'Rania Ibrahim',
                        'category' => 'Design'
                    ],
                    'ar' => [
                        'title' => 'مالتي ميديا',
                        'description' => 'استكشاف أدوات التصميم الصوتي والمرئي والجرافيكي.',
                        'instructor' => 'رانية إبراهيم',
                        'category' => 'تصميم'
                    ]
                ]
            ],
            [
                'image' => asset('images/course_image_5.jpg'),
                'translations' => [
                    'en' => [
                        'title' => 'SQL Course',
                        'description' => 'Learn to create, query, and manage databases using SQL.',
                        'instructor' => 'Mohammed Ali',
                        'category' => 'Databases'
                    ],
                    'ar' => [
                        'title' => 'كورس SQL',
                        'description' => 'تعلم كيفية إنشاء واستعلام وإدارة قواعد البيانات باستخدام SQL.',
                        'instructor' => 'محمد علي',
                        'category' => 'قواعد بيانات'
                    ]
                ]
            ]
        ];

        foreach ($courses as $course) {
            $courseId = DB::table('courses')->insertGetId([
                'image' => $course['image'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($course['translations'] as $locale => $data) {
                DB::table('course_translations')->insert([
                    'course_id' => $courseId,
                    'locale' => $locale,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'instructor' => $data['instructor'],
                    'category' => $data['category'],
                ]);
            }
        }

    }
}
