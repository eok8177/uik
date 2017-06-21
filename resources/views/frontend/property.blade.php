@extends('frontend.layout')

@section('content')

<section id="main">
	<div class="main-holder">
		<div id="content">

		<div class="visual">
			<img src="/images/img13.jpg" alt="" />

			<div class="title">
				<div class="holder">
					<h1 class="title-mortgage" style="background-image: url('/images/ico-estate-t.svg');">Нерухомість</h1>
				</div>
			</div>
		</div>

			<div class="holder">

				<nav class="menu">
					<ul>
						<li><a href="/property?type=Дім">Будинки</a></li>
						<li><a href="/property?type=Квартира">Квартири</a></li>
						<li><a href="/property?type=Ділянка">Ділянки</a></li>
					</ul>
				</nav>

				<div class="boxes">
				@foreach($property as $item)
					<div class="box">
						<a href="/property/{{$item->slug}}">
							<div class="img-box">
								<img src="/resize/230/153/?img={{urlencode($item->image)}}">
							</div>
					{{-- <div class="img-sold"></div><div class="img-reserved"></div> --}}
							<h3>{{$item->title}}</h3>
							<strong>{{$item->price}}</strong>
							<div class="short-description">{!! $item->preview !!}</div>
							<span class="more">Детальніше</span>
						</a>
					</div>
				@endforeach
				</div>

			</div>
		</div>

		<aside id="sidebar">
			@include('frontend.partial.sidebar_feedback')
			@include('frontend.partial.sidebar_products')
		</aside>
	</div>
</section>


@endsection