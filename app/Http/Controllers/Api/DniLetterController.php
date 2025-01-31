<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DniLetter;
use Illuminate\Http\Request;

class DniLetterController extends Controller
{
    /**
     * Function that, given a series of numbers, calculates a DNI
     */
    public function __invoke(Request $request)
    {
        $validatedDNI = $this->validate($request);

        $calculatedModule = $this->calculateModule($validatedDNI);

        $letter = $this->findLetterByModule($calculatedModule);

        return $this->responseWithSuccess($validatedDNI, $letter);
    }

    private function validate(Request $request)
    {
        // To test in Postman in the header you must put 'Accept: application/json', if it fails, a 422 will be returned
        $validated = $request->validate(
            [
                'dni' => 'required|integer|min:0|digits:8'
            ],
            [
                'dni.required' => 'The dni field is required',
                'dni.integer' => 'The dni field must be an integer, try again',
                'dni.min' => 'The dni field must be at least 0',
                'dni.digits' => 'The dni field must be 8 digits long'
            ]
        );

        return $validated['dni'];
    }

    private function calculateModule(int $validatedDNI)
    {
        $TOTALMODULE = 23;

        return ($validatedDNI % $TOTALMODULE) + 1;
    }

    private function findLetterByModule(int $module)
    {
        $letter = DniLetter::find($module);

        return $letter->letter;
    }

    private function responseWithSuccess($validatedDNI, $letter)
    {
        return response()->json([
            'fullDNI' => $validatedDNI . $letter
        ], 200);
    }
}
