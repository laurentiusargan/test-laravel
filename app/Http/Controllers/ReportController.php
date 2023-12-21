<?php

namespace App\Http\Controllers;

use App\Models\Apointment;
use App\Models\Patient;
use App\Repositories\ReportRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ReportController extends BaseController
{
    public function __construct(
        public readonly ReportRepository $reportRepository
    )
    {
    }

    public function index(): View
    {
        $data = $this->reportRepository->filter(new Request());
        return view('reports', compact('data'));
    }

    public function filter(Request $request): JsonResponse
    {
        $data = $this->reportRepository->filter($request);
        return response()->json($data);
    }


    public function getApointmentStatuses(): JsonResponse
    {
        $statuses = Apointment::select('status')->distinct()->get()->pluck('status');

        return response()->json($statuses);
    }
}
