<?php

namespace App\Http\Repository\Person;

use App\Person;

class PersonRepository
{
    /**
     * @var Person - object
     */
    private $model;
    /**
     * @param Person $model
     */
    public function __construct(Person $model)
    {
        $this->model = $model;
    }
    /**
     * insert many persons data
     *
     * @param array $personsData
     * 
     * @return bool
     */
    public function insertMany(array $personsData): bool
    {
        return $this->model::insert($personsData);
    }
}
