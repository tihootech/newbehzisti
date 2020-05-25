<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organ;
use App\Expert;
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
            if (!is('master')) {
                $expert = Expert::where('user_id', user('id'))->firstOrFail();
                foreach ($actions as $type => $applies) {
                    foreach ($applies as $i => $apply) {
                        $city = $apply->person->city ?? $apply->city;
                        if ($city != $expert->city) {
                            unset($applies[$i]);
                        }
                    }
                }
            }
        }
        $actions_count = array_sum(array_map("count", $actions));
        return view('home', compact('actions', 'actions_count'));
    }
}
