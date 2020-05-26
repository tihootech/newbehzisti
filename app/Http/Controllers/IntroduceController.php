<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicit;
use App\Person;
use App\JobApply;

class IntroduceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admins');
    }

    public function introduce_form(Solicit $solicit)
    {
        dd($solicit);
        $list = JobApply::join('people', 'people.id', '=', 'job_applies.person_id');
        $list = $list->where('job_applies.status', 4);
        if ($solicit->educations) {
            $list = $list->whereIn('people.education', explode('-', $solicit->educations));
        }
        if ($solicit->health_status) {
            $list = $list->whereIn('people.health_status', explode('-', $solicit->health_status));
        }
        $list = $list->select('people.*', 'job_applies.*');
        $list = $list->get();
        return view('dash.introduce.introduce', compact('solicit', 'list'));
    }

    public function introduce_action(Solicit $solicit)
    {
        // code...
    }
}
