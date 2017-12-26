<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'description',
        'src',
        'image',
        'downloads',
    ];

    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'downloads' => 0
    ];

    /*
     * Assign relation with Category class
     *
     * @param void
     * @return App\Category
     **/
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
