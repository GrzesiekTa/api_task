<?php

namespace App\Http\Controllers\Api\Person;

use App\Http\Controllers\Controller;
use App\Http\Repository\Person\PersonRepository;
use App\Http\Requests\PersonRequest;
use App\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonApiController extends Controller
{
    /**
     * return paginated records of persons
     *
     * @param Request $request
     * @param PersonRepository $personRepository
     * 
     * @return JsonResponse
     */
    public function index(Request $request, PersonRepository $personRepository): JsonResponse
    {
        $initialLettersInNamesToRejected = ['B', 'D', 'Q'];

        $data =  response()->json($personRepository->findByMultiParameters(
            $request->gender,
            $request->name,
            $request->culture,
            $initialLettersInNamesToRejected,
            10
        ));

        return $data;
    }

    /**
     * show action
     *
     * @param Person $person
     * 
     * @return JsonResponse
     */
    public function show(Person $person): JsonResponse
    {
        if (!$person) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, person cannot be found'
            ], 400);
        }

        return response()->json($person);
    }

    /**
     * update action
     *
     * @param PersonRequest $request
     * @param Person $person
     * 
     * @return JsonResponse
     */
    public function update(PersonRequest $request, Person $person): JsonResponse
    {
        if (!$person) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, person cannot be found'
            ], 400);
        }

        $updated = $person->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, person could not be updated'
            ], 500);
        }
    }
}
