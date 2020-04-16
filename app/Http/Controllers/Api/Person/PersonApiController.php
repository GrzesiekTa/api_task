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

        return response()->json($personRepository->findByMultiParameters(
            $request->gender,
            $request->name,
            $request->culture,
            $initialLettersInNamesToRejected,
            ['id', 'name', 'culture', 'born', 'url', 'gender', 'titles'],
            10
        ));
    }

    /**
     * show action
     *
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $person = Person::with('planet')->with('type')->with('vehicles')->find($id);

        if (!$person) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, person cannot be found'
            ], 404);
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
            ], 404);
        }

        if (is_null($person->died) || (trim($person->died) === '')) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can only update persons who have died'
            ], 403);
        }

        try {
            $person->fill($request->all())->save();
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, person could not be updated'
            ], 500);
        }

        return response()->json([
            'success' => true
        ], 200);
    }
}
