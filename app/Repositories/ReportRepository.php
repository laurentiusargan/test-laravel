<?php

namespace App\Repositories;

use App\Models\Apointment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReportRepository
{
    public function filter(Request $request): Collection|array
    {
        $query = Apointment::query()->with(['patient', 'user']);

        $startDate = $request->input('from');
        if ($startDate) {
            $query->where('start_at', '>=', $startDate);
        }

        $endDate = $request->input('to');
        if ($endDate) {
            $query->where('end_at', '<=', $endDate);
        }

        $patientId = $request->input('patient_id');
        if ($patientId) {
            $query->where('patient_id', $patientId);
        }

        $doctorId = $request->input('doctor_id');
        if ($doctorId) {
            $query->where('user_id', $doctorId);
        }

        $status = $request->input('status');
        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }
}
