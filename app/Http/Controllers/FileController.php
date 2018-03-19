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

        $last_download = $user->updated_at->format('N');
        $now = (Carbon::now())->format('N');
        $diff = $now - $last_download;
        $headers = [
            'Content-Type: application/vnd.android.package-archive'
        ];
        if ($user->downloads < 3){
            $user->downloads++;

            $user->save();

            $game = Game::find($id);
            $game->downloads++;
            $game->save();
            $filename = 'game.apk';
            $filepath = public_path() . $game->src;
            return response()->download($filepath, $filename, $headers);

        } elseif ($user->downloads == 3 && $diff > 0){
            $user->downloads = 1;
            $user->save();

            $game = Game::find($id);
            $game->downloads++;
            $game->save();
            $filename = 'game.apk';
            $filepath = public_path() . $game->src;
            return response()->download($filepath, $filename, $headers);

        } else {
            return view('exceeded');
        }

    }
}
