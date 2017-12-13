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
            ['War Eagle', 132, 71, 6880],
            ['Bull Run', 117, 69, 6500],
            ['Gettysburg', 120, 73, 7000],
            ['Crooked Stick', 124, 75, 7200],
            ['Torrey Pines', 121, 72, 7300],
            ['Stonewall', 118, 71, 6780],
            ['Winchester', 122, 70, 7300],
            ['Quail Hollow', 124, 74, 7000],
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
