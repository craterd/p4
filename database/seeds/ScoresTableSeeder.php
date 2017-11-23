<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scores = [
            [88, 'Course1', 3, 5, 0, 22, 17, 7, 4, 290],
            [90, 'Course2', 2, 7, 1, 25, 15, 9, 2, 300],
            [85, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
        ];
    
        $count = count($scores);
        
        foreach ($scores as $key => $score) {
            Score::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'date' => Carbon\Carbon::now()->toDateTimeString(),
                'score' => $score[0],
                'course_name' => $score[1],
                'birdies' => $score[2],
                'bogies' => $score[3],
                'eagles' => $score[4],
                'putts' => $score[5],
                'chips' => $score[6],
                'fairways_hit' => $score[7],
                'greens_in_regulation' => $score[8],
                'longest_drive' => $score[9]
            ]);
            $count--;
        }
    }
}
