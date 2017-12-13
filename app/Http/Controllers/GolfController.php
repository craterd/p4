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
            $scores = Score::orderBy('date', 'DESC')->get();
            return view('scores')->with(['scores' => $scores, 'player' => '']);
        } else {
            $thisplayer = Player::where(DB::raw('CONCAT(first_name,last_name)'), '=', $player)->first();
            $scores = Score::where('player_id', '=', $thisplayer->id)->orderBy('date', 'DESC')->get();
            return view('scores')->with(['scores' => $scores, 'player' => $thisplayer]);
        }
    }
    public function players()
    {
        $players = Player::orderBy('first_name')->get(); 
        return view('players')->with(['players' => $players]);
    }
    public function courses()
    {
        $courses = Course::all();
        return view('courses')->with(['courses' => $courses]);
    }
    public function newplayer(Request $request)
    {
        if ($request->has('first_name')) {
            $player = new Player();
            $player->first_name = $request->input('first_name');
            $player->last_name = $request->input('last_name');
            $player->handicap = $request->input('handicap');
            $player->save();
            return view('newplayer')->with(['results' => 'success']);
        } else {
            return view('newplayer');
        }
    }
    public function chooseplayer()
    {
        $players = Player::orderBy('first_name')->get();
        return view('chooseplayer')->with(['players' => $players]);
    }
    public function editplayer($player)
    {
        $thisplayer = Player::where(DB::raw('CONCAT(first_name,last_name)'), '=', $player)->first();
        return view('editplayer')->with(['player' => $thisplayer]);
    }
    public function changeplayer(Request $request)
    {
        if ($request->has('first_name')) {
            $player = Player::find($request->input('id'));
            $player->first_name = $request->input('first_name');
            $player->last_name = $request->input('last_name');
            $player->handicap = $request->input('handicap');
            $player->save();
            return view('editplayer')->with(['results' => 'success', 'player' => $player]);
        } else {
            return view('editplayer');
        }
    }
    public function deleteplayer($player)
    {
        $thisplayer = Player::where(DB::raw('CONCAT(first_name,last_name)'), '=', $player)->first();
        return view('deleteplayer')->with(['player' => $thisplayer]);
    }
    public function chooseplayer2()
    {
        $players = Player::orderBy('first_name')->get(); 
        return view('chooseplayer2')->with(['players' => $players]);
    }
    public function removeplayer(Request $request)
    {
        $player = Player::find($request->input('id'));
        $player->delete();
        $players = Player::orderBy('first_name')->get(); 
        return view('players')->with(['results' => 'success', 'players' => $players]);
    }
}