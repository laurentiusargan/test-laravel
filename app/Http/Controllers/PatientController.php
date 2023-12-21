<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class PatientController extends Controller
{
    public function getPatientNames(): JsonResponse
    {
        $patients = Patient::select('id', 'first_name', 'last_name')->get();
        return response()->json($patients);
    }
}
