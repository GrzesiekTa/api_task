<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'person';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'name', 'gender', 'culture', 'born', 'died', 'titles', 'aliases', 'father', 'mother', 'spouse', 'allegiances', 'books', 'povBooks', 'tvSeries', 'playedBy', 'created_at'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'titles' => 'json',
        'aliases' => 'json',
        'allegiances' => 'json',
        'books' => 'json',
        'povBooks' => 'json',
        'tvSeries' => 'json',
        'playedBy' => 'json',
        'usedVehicles' => 'json',
    ];
}
