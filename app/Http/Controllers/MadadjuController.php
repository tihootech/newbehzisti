<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use App\Expert;
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
        $table = "{$type}_applies";
        if (class_exists($class)) {
            $applies = $class::join('people', 'people.id', '=', "$table.person_id");
            $applies = $applies->select('people.*', "$table.*");
            if (is('expert')) {
                $expert = Expert::where('user_id', user('id'))->firstOrFail();
                $applies = $applies->where('city', $expert->city);
            }
            $applies = $applies->orderBy('people.created_at', 'DESC')->paginate(12);
            return view('dash.madadju.index', compact('applies', 'type'));
        }else {
            abort(404);
        }
    }

    public function destroy($type, $id)
    {
        $class = class_name($type).'Apply';
        if (class_exists($class)) {
            $object = $class::findOrFail($id);
            $expert = Expert::where('user_id', user('id'))->firstOrFail();
            if ($object->person->city != $expert->city) {
                return back()->withError(__('ERROR'));
            }
            Person::where('id', $object->person->id)->delete();
            User::where('id', $object->person->user_id)->delete();
            $object->delete();
            return back()->withMessage( __('DELETED_SUCCESSFULLY') );
        }else {
            abort(404);
        }
    }
}
