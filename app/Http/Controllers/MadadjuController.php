<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use Illuminate\Http\Request;

class MadadjuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admins');
    }

    public function index($type)
    {
        $class = class_name($type).'Apply';
        if (class_exists($class)) {
            $applies = $class::latest()->paginate(12);
            return view('dash.madadju.index', compact('applies', 'type'));
        }else {
            abort(404);
        }
    }

    public function destroy($type, $id)
    {
        $class = class_name($type).'Apply';
        if (class_exists($class)) {
            $object = $class::find($id);
            Person::where('id', $object->person->id)->delete();
            User::where('id', $object->person->user_id)->delete();
            $object->delete();
            return back()->withMessage( __('DELETED_SUCCESSFULLY') );
        }else {
            abort(404);
        }
    }
}
