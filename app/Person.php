<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Planet;
use App\Type;
use App\Vehicle;

class Person extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
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
        'name', 'gender', 'culture', 'born', 'died'
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
    ];

    /**
     * person has/belongs to one planet
     */
    public function planet()
    {
        return $this->belongsTo(Planet::class, 'planetId');
    }

    /**
     * person has/belongs to one type
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'typeId');
    }

    /**
     * Many to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'person_vehicle', 'personId', 'vehicleId');
    }
}
