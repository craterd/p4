<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['Course1', 132, 71, 6880],
            ['Course2', 117, 69, 6500],
            ['Course3', 120, 73, 7000],
        ];
    
        $count = count($courses);
        
        foreach ($courses as $key => $course) {
            Course::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'course_name' => $course[0],
                'slope' => $course[1],
                'rating' => $course[2],
                'yardage' => $course[3],
            ]);
            $count--;
        }
    }
}
