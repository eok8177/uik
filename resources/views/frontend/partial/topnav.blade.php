<header id="header">
	<div class="header-holder">
		<strong class="logo"><a href="/">Logo</a></strong>
		<nav class="nav-holder">
			<ul class="nav">
				<li><a href="/property">Нерухомість</a></li>
			@foreach($categories as $slug => $title)
				<li class=""><a href="/category/{{$slug}}">{{$title}}</a></li>
			@endforeach
				<li><a href="/contacts">Контакти</a></li>
			</ul>
		</nav>
		<div class="navbar hide-wide">
			<a href="#" class="opener-bar"><em>Весь сайт</em> <span>Menu</span></a>
			<div class="navbar-drop win-min-height">
				<nav>
					<strong>Послуги</strong>
					<ul class="bar tools">
						<li><a href="/property">Нерухомість</a></li>
						@foreach($categories as $slug => $title)
							<li class=""><a href="/category/{{$slug}}">{{$title}}</a></li>
						@endforeach
					</ul>
				</nav>

				<nav>
					<strong>Информація про компанію</strong>
					<ul class="bar">
						<li><a href="/contacts">Контакти</a></li>
					</ul>
				</nav>
				{{--
				<nav>
					<strong>Новости и аналитика</strong>
					<ul class="bar">
						<li><a href="#">link</a></li>
					</ul>
				</nav>

				<nav>
					<ul class="lang">
						<li class="active" class="en">link</a></li>
						<li><a href="#" class="ru">link</a></li>
					</ul>
				</nav>
				--}}
			</div>
		</div>
	</div>
</header>
