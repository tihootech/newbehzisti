<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SignupController extends Controller
{
    public function form($type, $step=1)
    {
		$user = user();
		if ($step > 1) {
			if (!$user) {
				return back()->withError('باید وارد حساب کاربری خود شوید.');
			}
		}
    	return view('signup', compact('type', 'step'));
    }

	public function wizard($type, $step, Request $request)
	{
		if ($step == 1) {

			$request->validate([
				'username' => 'required|string|min:4',
				'password' => 'required|string|min:4',
			]);

			$user = $found = User::where('name', $request->username)->first();
			if ($request->acc_type == 'register') {
				if ($found) {
					return back()->withError(__('USER_EXISTS'));
				}else {
					$user = User::create([
						'name' => $request->username,
						'password' => bcrypt($request->password)
					]);
					\Auth::login($user);
					return redirect()->route('signup', [$type, $step+1])->withMessage(__('ACC_CREATED_SUCCESSFULLY'));
				}
			}
			if ($request->acc_type == 'login') {
				if (!$found) {
					return back()->withError(__('USER_DOSNT_EXISTS'));
				}
				if ($user->type != 'user') {
					return back()->withError(__('CANT_SIGNUP_WITH_THIS_ACCOUNT'));
				}
			}
		}elseif ($step == 2) {



		}else {
			return back();
		}
	}
}
