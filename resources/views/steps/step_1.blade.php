<div class="text-center">

	@auth
		<a href="{{route('signup', [$type, 2])}}" class="btn btn-warning btn-round m-1">
			ورود به عنوان {{user('name')}}
		</a>
	@else
		<a href="#user-pass-form" data-toggle="collapse" class="btn btn-warning btn-round m-1">
			قبلا حساب کاربری ایجاد کردم
		</a>
	@endauth
	<a href="#new-acc-form" data-toggle="collapse" class="btn btn-primary btn-round m-1">
		ایجاد حساب کاربری و ثبت نام
	</a>

	<div id="collapseParent">
		<div class="collapse" data-parent="#collapseParent" id="user-pass-form">
			<hr>
			<form class="row justify-content-center" method="POST" action="{{route('wizard', [$type, $step])}}">
				@csrf
				@include('partials.input', ['type' => 'text', 'name'=>'username', 'col' => 3, 'required' => 1])
				@include('partials.input', ['type' => 'password', 'name'=>'password', 'col' => 3, 'required' => 1])
				<div class="w-100"></div>
				<button type="submit" class="btn btn-danger" name="acc_type" value="login">
					ورود به حساب کاربری
				</button>
			</form>
		</div>

		<div class="collapse" data-parent="#collapseParent" id="new-acc-form">
			<hr>
			<form class="row justify-content-center" method="POST" action="{{route('wizard', [$type, $step])}}">
				@csrf
				@include('partials.input', ['type' => 'text', 'name'=>'username', 'col' => 3, 'required' => 1, 'ac' => 'off'])
				@include('partials.input', ['type' => 'password', 'name'=>'password', 'col' => 3, 'required' => 1, 'ac' => 'off'])
				<div class="w-100"></div>
				<button type="submit" class="btn btn-danger" name="acc_type" value="register">
					ثبت نام
				</button>
			</form>
		</div>
	</div>

</div>
