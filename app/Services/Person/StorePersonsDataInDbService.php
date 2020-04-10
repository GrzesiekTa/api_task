<?php

namespace App\Services\Person;

use App\Http\Repository\Person\PersonRepository;
use App\Utils\ArrayModifier;

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

        $this->personRepository->insertMany($modifiedDataArray);

        return $modifiedDataArray;
    }
}
