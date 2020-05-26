<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master')->except(['index']);
    }

    public function index()
    {
        $notifications = Notification::query();
        if (!is('master')) {
            $user = auth()->user();
            $owner = $user->owner;
            $notifications = $notifications->where('contact', user('type'))->where('city', $owner->city);
        }
        $notifications = $notifications->latest()->get();
        return view('dash.notification.index', compact('notifications'));
    }

    public function create()
    {
        $notification = new Notification;
        return view('dash.notification.form', compact('notification'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Notification::create($data);
        return redirect()->route('notification.index')->withMessage( __('NEW_NOTIFICATION') );
    }

    public function edit(Notification $notification)
    {
        return view('dash.notification.form', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $data = self::validation();
        $notification->update($data);
        return redirect()->route('notification.index')->withMessage( __('SUCCESS') );
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notification.index')->withMessage( __('DELETED_SUCCESSFULLY') );
    }

    private function validation()
    {
        return request()->validate([
            'subject' => 'required|string',
            'contact' => 'required|string',
            'city' => 'required|string',
            'body' => 'required|string',
        ]);
    }
}
