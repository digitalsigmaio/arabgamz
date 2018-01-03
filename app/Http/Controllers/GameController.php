<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::all();
        $topGames = Game::where('downloads', '>', '0')->orderBy('downloads', 'desc')->limit(6)->get();
        return view('index', compact(['categories', 'topGames']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new Game;

        $game->name = $request->name;
        $game->description = $request->description;
        $game->src = $request->src;
        $game->image = $request->image;

        $game->save();

        $category = $request->category;
        $game->categories()->attach($category);

        return response()->json(['data' => $game], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloads(Request $request)
    {

        $game = Game::find($request->gameId);
        $game->downloads++;
        $game->save();
        return response()->json(['downloads' => $game->downloads], 200);

    }
}
