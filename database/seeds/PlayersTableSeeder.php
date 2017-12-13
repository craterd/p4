<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of player data to add
        $players = [
            ['David', 'Crater', 0],
            ['Jon', 'Crater', 0],
            ['Andy', 'Crater', 0],
            ['Matt', 'Crater', 0]
        ];
        $count = count($players);

        # Loop through each player, adding them to the database
        foreach ($players as $player) {
            Player::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'first_name' => $player[0],
                'last_name' => $player[1],
                'handicap' => $player[2]
            ]);
            $count--;
        }
    }
}
