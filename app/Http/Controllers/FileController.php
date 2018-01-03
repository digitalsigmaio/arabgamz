<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Game;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('auth');
    }

    public function getFile($id)
    {

        $user = Auth::user();

        $now = Carbon::now();
        $diff = $now->diffInDays($user->updated_at);
        if ($user->downloads < 3){
            $user->downloads++;

            $user->save();

            $game = Game::find($id);
            $filename = 'game.apk';
            $filepath = public_path() . $game->src;
            return response()->download($filepath, $filename);

        } elseif ($user->downloads == 3 && $diff > 0){
            $user->downloads = 1;
            $user->save();

            $game = Game::find($id);
            $filename = 'game.apk';
            $filepath = public_path() . $game->src;
            return response()->download($filepath, $filename);

        } else {
            return view('exceeded');
        }

    }
}
