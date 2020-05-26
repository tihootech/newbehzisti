<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobApply;
use App\LoanApply;
use App\InsuranceApply;
use App\Organ;

class RahgiriController extends Controller
{
    public function rahgiri(Request $request)
    {
        $job = JobApply::whereUid($request->code)->first();
        $loan = LoanApply::whereUid($request->code)->first();
        $insurance = InsuranceApply::whereUid($request->code)->first();
        $organ = Organ::whereUid($request->code)->first();
        return view('dash.rahgiri.rahgiri', compact('request', 'job', 'loan', 'insurance', 'organ'));
    }
}
