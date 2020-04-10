<?php

namespace App\Services\Person;

class GetPersonsDataService
{
    const DEFAULT_AMOUNT_OF_GET_DATA = 50;
    /**
     * get data
     *
     * @param integer $amountOfGetData - default null

     * @return array
     */
    public function getData(int $amountOfGetData  = null): array
    {
        $personsData = [];

        $amountOfGetData = $amountOfGetData ? $amountOfGetData : selF::DEFAULT_AMOUNT_OF_GET_DATA;

        try {
            for ($i = 1; $i <= $amountOfGetData; $i++) {
                $test = file_get_contents('https://anapioficeandfire.com/api/characters/' . $i);
                $personsData[] = json_decode($test, true);
            }
        } catch (\Exception $ex) {
            $personsData = [];
        }

        return $personsData;
    }
}
