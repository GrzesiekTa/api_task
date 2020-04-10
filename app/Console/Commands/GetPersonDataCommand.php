<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Person\StorePersonsDataInDbService;

class GetPersonDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-persons:data {amountOfGetData=50}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get data about persons and save them to database - 50 entries will be get by default';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(StorePersonsDataInDbService $storePersonsDataInDbService)
    {
        $amountOfGetData = $this->argument('amountOfGetData');

        $personsData = $storePersonsDataInDbService->getAndSavePersonsData($amountOfGetData);

        $this->info('I saved to database ' . count($personsData) . ' persons data');
    }
}
