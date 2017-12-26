<?php

namespace App\Http\Controllers;

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
        if($user->exceedLimit())
        {
            return redirect()->back()->with(['message' => 'You have exceeded your downloads limit for today']);
        }
        $user->downloads += 1;
    	$game = Game::find($id);
    	$filename = 'game.apk';
		$filepath = public_path() . $game->src;
    	return response()->download($filepath, $filename);
    }
}
