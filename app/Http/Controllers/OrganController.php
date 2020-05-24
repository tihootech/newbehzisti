<?php

namespace App\Http\Controllers;

use App\Organ;
use App\User;
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
        $organs = Organ::latest()->paginate(12);
        return view('dash.organ.index', compact('organs'));
    }

    public function destroy(Organ $organ)
    {
        $organ->delete();
        User::where('id', $organ->user_id)->delete();
        return redirect()->route('organ.index')->withMessage( __('DELETED_SUCCESSFULLY') );
    }
}
