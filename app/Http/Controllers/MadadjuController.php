<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use App\Expert;
use App\Exports\MadadjusExport;
use Illuminate\Http\Request;

class MadadjuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admins');
    }

    public function export(Request $request)
    {
        $filename = now();
        return (new MadadjusExport)->forType($request->type)->download("$filename.xlsx");
    }

    public function index($type, Request $request)
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

            if ( $request->name ) {
                $applies = $applies->where(function ($q) use ($request) {
                    $q->where('first_name', 'like', "%$request->name%")->orWhere('last_name', 'like', "%$request->name%");
                });
            }
            if ( $request->national_code ) {
                $applies = $applies->where('national_code', 'like', "%$request->national_code%");
            }
            if ( $request->city ) {
                $applies = $applies->where('city', $request->city);
            }
            if ( $request->mobile ) {
                $applies = $applies->where('mobile', 'like', "%$request->mobile%");
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
