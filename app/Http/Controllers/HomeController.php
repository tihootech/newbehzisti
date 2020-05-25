<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organ;
use App\JobApply;
use App\LoanApply;
use App\InsuranceApply;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $actions = [];
        if (is('admin')) {
            $actions['job'] = JobApply::whereIn('status', [1,2])->get();
            $actions['loan'] = LoanApply::whereIn('status', [1,2])->get();
            $actions['insurance'] = InsuranceApply::whereIn('status', [1,2])->get();
            $actions['organ'] = Organ::whereIn('status', [1,2])->get();
        }
        $actions_count = array_sum(array_map("count", $actions));
        return view('home', compact('actions', 'actions_count'));
    }
}
