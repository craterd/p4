<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use cebe\markdown\MarkdownExtra;
use App\Rules\AlphaAndSpaces;
use App\Course;
use App\Score;
use App\User;
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
    public function listhistory()
    {
        $scores = Score::all();  //with('author')->get()->sortBy('author.last_name');
        # Debugging output to check results
        foreach ($scores as $score) {
            dump($score->score.' on '.$score->date);
        }
    }
}