@extends('frontend.layout')

@section('content')

	<section id="main">
		<div class="holder">
			<div class="heading-top">
				<h1>Контакти</h1>
			</div>
		</div>
		<div class="columns">
			<div class="columns-holder">
				<div class="column column-text">
					<div class="text-holder">
						<address>{{ $settings['address'] }}</address>
						<dl>
							<dt>Час роботи: </dt>
							<dd>9:00 - 16:00</dd>
						</dl>
						<dl>
							<dt>E-mail: </dt>
							<dd><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></dd>
						</dl>
						<dl>
							<dt>Телефон: </dt>
							<dd>{{ $settings['phone'] }}</dd>
						</dl>
						<dl>
							<dt>Телефон Vodafone: </dt>
							<dd>{{ $settings['phone_mts'] }}</dd>
						</dl>
						<dl>
							<dt>Телефон KS: </dt>
							<dd>{{ $settings['phone_ks'] }}</dd>
						</dl>
						<dl>
							<dt>Телефон KS: </dt>
							<dd>{{ $settings['phone_ks2'] }}</dd>
						</dl>
					</div>
				</div>
				<div class="column column-img">
					<img src="{{ '/images/img15.jpg' }}" alt="">
				</div>
			</div>
			<div class="column column-form">
				<form action="#" class="feedback-form">
					<fieldset>
						<strong>Зв'яжіться з нами</strong>
						<div class="row">
							<input class="text" type="text" value="" placeholder="Ім'я та Прізвище">
						</div>
						<div class="row">
							<input class="text" type="text" value="" placeholder="Email">
						</div>
						<div class="row">
							<input class="text" type="text" value="" placeholder="Телефон*">
						</div>
						<div class="row">
							<textarea cols="20" rows="3" placeholder="Додаткова інформація"></textarea>
						</div>
						<div class="row">
							<input type="submit" class="submit" value="Відправити&gt;">
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>
	
	<div class="map-holder">
		<div class="map-frame">
			<div class="overlay" onClick="style.pointerEvents='none'"></div>
				<iframe width="100%" height="100%" frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/place?q=46.532705,+32.527574&key=AIzaSyA6FYOJ0yx0X8CUhzRQt6OKKpegltfAh8A" allowfullscreen></iframe>
		</div>
	</div>


@endsection