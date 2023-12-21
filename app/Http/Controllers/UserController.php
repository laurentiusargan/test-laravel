<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function getDoctorsNames(): JsonResponse
    {
        $doctors = User::select('id', 'first_name', 'last_name')->get();
        return response()->json($doctors);
    }
}
