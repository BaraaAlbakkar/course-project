<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecture = Lecture::create([
            'course_id' => 3,
            'type' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=example',
            'order' => 1,
            'is_active' => true,
        ]);

        // 2. إدخال بيانات الترجمة للعربي
        DB::table('lecture_translations')->insert([
            'lecture_id' => $lecture->id,
            'locale' => 'ar',
            'title' => 'مقدمة في لارافيل',
            'description' => 'تعلم أساسيات إطار العمل لارافيل.',
        ]);

        // 3. إدخال بيانات الترجمة للإنجليزي (مثال)
        DB::table('lecture_translations')->insert([
            'lecture_id' => $lecture->id,
            'locale' => 'en',
            'title' => 'Introduction to Laravel',
            'description' => 'Learn the basics of the Laravel framework.',
        ]);
    }

}
