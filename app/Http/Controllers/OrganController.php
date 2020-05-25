<?php

namespace App\Http\Controllers;

use App\Organ;
use App\User;
use App\Expert;
use Illuminate\Http\Request;

class OrganController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admins');
    }

    public function index()
    {
        $organs = Organ::query();
        if (is('expert')) {
            $expert = Expert::where('user_id', user('id'))->firstOrFail();
            $organs = $organs->where('city', $expert->city);
        }
        $organs = $organs->latest()->paginate(12);
        return view('dash.organ.index', compact('organs'));
    }

    public function destroy(Organ $organ)
    {
        if (!is('master')) {
            $expert = Expert::where('user_id', user('id'))->firstOrFail();
            if ($organ->city != $expert->city) {
                return back()->withError(__('ERROR'));
            }
        }
        $organ->delete();
        User::where('id', $organ->user_id)->delete();
        return redirect()->route('organ.index')->withMessage( __('DELETED_SUCCESSFULLY') );
    }
}
