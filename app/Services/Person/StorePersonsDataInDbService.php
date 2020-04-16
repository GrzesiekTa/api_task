<?php

namespace App\Services\Person;

use App\Http\Repository\Person\PersonRepository;
use App\Utils\ArrayModifier;
use App\Planet;
use App\Type;

class StorePersonsDataInDbService
{
    /**
     * @var GetPersonsDataService - obejetc
     */
    private $getPersonsDataService;
    /**
     * @var PersonRepository - object
     */
    private $personRepository;

    /**
     * @param GetPersonsDataService $getPersonsDataService
     * @param PersonRepository $personRepository
     */
    public function __construct(GetPersonsDataService $getPersonsDataService, PersonRepository $personRepository)
    {
        $this->getPersonsDataService = $getPersonsDataService;
        $this->personRepository = $personRepository;
    }
    /**
     * save data in db
     *
     * @param integer $amountOfGetData
     * 
     * @return array - with persons data
     */
    public function getAndSavePersonsData(int $amountOfGetData): array
    {
        $personsData = $this->getPersonsDataService->getData($amountOfGetData);
        $modifiedDataArray = ArrayModifier::replaceEmptyArrayKeysToValue($personsData);

        $planetsIds = Planet::pluck('id')->toArray();
        $typesIds = Type::pluck('id')->toArray();

        if (empty($planetsIds) || empty($typesIds)) {
            throw new \Exception('planets and types cannot be empty');
        }

        //adding random planet and type
        foreach ($modifiedDataArray as $key => $single) {
            $modifiedDataArray[$key]['planetId'] = $planetsIds[array_rand($planetsIds, 1)];
            $modifiedDataArray[$key]['typeId'] = $typesIds[array_rand($typesIds, 1)];
        }

        $this->personRepository->insertMany($modifiedDataArray);

        return $modifiedDataArray;
    }
}
