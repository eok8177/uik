<footer id="footer">
	<div class="footer-t">
		<div class="f-holder">
			<nav class="navigation">
				<ul>
					<li><strong class="title">Послуги</strong></li>
					<li><a href="/property">Нерухомість</a></li>
					@foreach($categories as $slug => $title)
						<li class=""><a href="/category/{{$slug}}">{{$title}}</a></li>
					@endforeach
				</ul>
				<ul>
					<li><strong class="title">Про компанію</strong></li>
					<li><a href="/contacts">Контакти</a></li>
				</ul>
        <ul>
					<li><a href="http://map.land.gov.ua/kadastrova-karta" class="button" target="_blank">Перевірити кадастровий номер</a></li>
				</ul>
			</nav>
			<form class="newsletter-form" action="/callme" method="post">
				<fieldset>
					<strong>Замовити дзвінок:</strong>
					<div class="row">
						<input name="phone" id="phone" class="text" type="text" value="" placeholder="Номер телефону">
					</div>
					<div class="row">
						<input type="submit" class="submit" value="Передзвоніть мені&gt;">
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div class="footer-c">
		<div class="f-holder">
			<ul class="partners-list">
			@foreach($partners as $partner)
				<li>
					<a href="{{$partner->slug}}" target="_blank">
						<svg width="168" height="86">
							<image xlink:href="{{$partner->image}}" src="{{$partner->image}}" width="168" height="86" alt="{{$partner->title}}">
						</svg>
					</a>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
	
		<div class="footer-b">
			<div class="col">
				<ul class="sl-list">
					<li><a href="{{$settings['fb']}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="{{$settings['vk']}}" target="_blank"><i class="fa fa-vk"></i></a></li>
					<li><a href="{{$settings['inst']}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="col">
				<div id="google_translate_element" style="float: left;margin-top: 20px;margin-left: 20px;"></div>
				<a href="http://ek.ks.ua" class="webdesign-by" target="_blank"><span>EK</span> Develop</a>
			</div>
		</div>
	</footer>