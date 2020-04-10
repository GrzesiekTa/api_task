<?php

namespace Tests\Unit\Services\Person;

use App\Services\Person\GetPersonsDataService;
use PHPUnit\Framework\TestCase;

class GetPersonsDataServiceTest extends TestCase
{
    /**
     * test that checks the amount of get data
     *
     * @return void
     */
    public function testGetData()
    {
        $getPersonsDataService = new GetPersonsDataService();

        $amountOfGetData = 10;

        $personsData = $getPersonsDataService->getData($amountOfGetData);

        $this->assertEquals(count($personsData), $amountOfGetData);
    }
}
