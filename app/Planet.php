<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'planet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
}
