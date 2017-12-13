<?php

use Illuminate\Database\Seeder;
use App\Score;
use App\Player;

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
            ['David Crater', 88, 'Course1', 3, 5, 0, 22, 17, 7, 4, 290],
            ['Jon Crater', 90, 'Course2', 2, 7, 1, 25, 15, 9, 2, 300],
            ['Andy Crater', 85, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
            ['David Crater', 99, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
            ['Andy Crater', 95, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
            ['Jon Crater', 91, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
            ['Matt Crater', 83, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310],
            ['Matt Crater', 88, 'Course3', 1, 2, 2, 23, 14, 11, 10, 310]
        ];
    
        $count = count($scores);
        
        foreach ($scores as $key => $score) {
            $name = explode(' ', $score[0]);
            $firstName = $name[0];

            $player_id = Player::where('first_name', '=', $firstName)->pluck('id')->first();

            Score::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'date' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'player_id' => $player_id   ,
                'score' => $score[1],
                'course_name' => $score[2],
                'birdies' => $score[3],
                'bogies' => $score[4],
                'eagles' => $score[5],
                'putts' => $score[6],
                'chips' => $score[7],
                'fairways_hit' => $score[8],
                'greens_in_regulation' => $score[9],
                'longest_drive' => $score[10]
            ]);
            $count--;
        }
    }
}
