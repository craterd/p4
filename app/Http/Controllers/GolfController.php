<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use cebe\markdown\MarkdownExtra;
use App\Rules\AlphaAndSpaces;
use App\Course;
use App\Score;
use App\Player;
use App\Tag;
use App\Utilities\Practice;
use Validator;
use Auth;

class GolfController extends Controller
{
    /**
    * Method to list golf score history
    * 
    */
    public function scores($player = null)
    {
        if ($player == null) {
            $scores = Score::orderBy('date', 'DESC')->get();  //with('author')->get()->sortBy('author.last_name');
            return view('scores')->with(['scores' => $scores, 'player' => '']);
        } else {
            $thisplayer = Player::where(DB::raw('CONCAT(first_name,last_name)'), '=', $player)->first();
            //$scores = Score::orderBy('date', 'DESC')->get();  //with('author')->get()->sortBy('author.last_name');
            $scores = Score::where('player_id', '=', $thisplayer->id)->orderBy('date', 'DESC')->get();
            return view('scores')->with(['scores' => $scores, 'player' => $thisplayer]);
        }
    }
    public function players()
    {
        $players = Player::orderBy('first_name')->get();  //with('author')->get()->sortBy('author.last_name');
        return view('players')->with(['players' => $players]);
    }
    public function courses()
    {
        $courses = Course::all();
        return view('courses')->with(['courses' => $courses]);
    }
}