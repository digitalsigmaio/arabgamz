<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /*
     * Assign relation with Game class
     *
     * @param void
     * @return App\Game
     * */
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
