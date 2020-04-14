<?php

namespace App\Http\Repository\Person;

use App\Person;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
    /**
     * find by multi parameters
     *
     * @param string|null $gender
     * @param string|null $name
     * @param string|null $culture
     * @param array|null $initialLettersInNamesToRejected
     * @param integer $paginate
     * 
     * @return LengthAwarePaginator
     */
    public function findByMultiParameters(
        ?string $gender,
        ?string $name,
        ?string $culture,
        ?array $initialLettersInNamesToRejected,
        int $paginate
    ): LengthAwarePaginator {
        $person = $this->model;

        if ($gender) {
            $person = $person->where('gender', '=', $gender);
        }

        if ($name) {
            $person = $person->where('name', 'LIKE', "%$name%");
        }

        if ($culture) {
            $person = $person->where('culture', 'LIKE', "%$culture%");
        }

        if ($initialLettersInNamesToRejected) {
            foreach ($initialLettersInNamesToRejected as $singleLetter) {
                $person = $person->where('name', 'not LIKE', "$singleLetter%");
            }
        }

        return $person->paginate($paginate);
    }
}
