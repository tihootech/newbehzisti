<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user justify-content-center">
		<div class="text-center">
			<p class="app-sidebar__user-name">{{user('name')}}</p>
			<p class="app-sidebar__user-designation"> دسترسی : {{user('access')}}</p>
		</div>
	</div>
	<ul class="app-menu">
		<li>
			<a class="app-menu__item @if(rn() == 'home') active @endif" href="{{route('home')}}">
				<i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">داشبورد</span>
			</a>
		</li>

		@master
			<li>
				<a class="app-menu__item @if(rn() == 'expert.index') active @endif" href="{{route('expert.index')}}">
					<i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">  مسئولین شهرستان ها </span>
				</a>
			</li>
		@endmaster

		@admins
			<li>
				<a class="app-menu__item @if(rn() == 'organ.index') active @endif" href="{{route('organ.index')}}">
					<i class="app-menu__icon fa fa-list"></i><span class="app-menu__label"> لیست کارفرمایان </span>
				</a>
			</li>
		@endadmins


		{{-- <li class="treeview">
			<a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-left"></i></a>
			<ul class="treeview-menu">
				<li>
					<a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a>
				</li>
				<li>
					<a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a>
				</li>
				<li>
					<a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a>
				</li>
				<li>
					<a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a>
				</li>
			</ul>
		</li> --}}

	</ul>
</aside>
