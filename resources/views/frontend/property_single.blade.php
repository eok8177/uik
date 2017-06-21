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

				<h3>{{$property->title}}</h3>
				<div class="short-description">{!! $property->preview !!}</div>

				<div class="slick-slider main-slider">
					<div><img src="/resize/914/700/?img={{urlencode($property->image)}}"></div>
					@foreach($property->images as $image)
					<div><img src="/resize/914/700/?img={{urlencode($image->title)}}"></div>
					@endforeach
				</div>

				<div class="slick-slider slider-nav">
				@if(count($property->images))
					<div><img src="/resize/100/100/?img={{urlencode($property->image)}}"></div>
					@foreach($property->images as $image)
					<div><img src="/resize/100/100/?img={{urlencode($image->title)}}"></div>
					@endforeach
				@endif
				</div>

				<div class="property-description">
					<div class="description-list">
						<dl>
							@if($property->price)<dt>Ціна</dt><dd>{{$property->price}}</dd>@endif
							@if($property->type)<dt>Тип</dt><dd>{{$property->type}}</dd>@endif
							@if($property->classification)<dt>Класифікація</dt><dd>{{$property->classification}}</dd>@endif
							@if($property->rooms)<dt>Кімнат</dt><dd>{{$property->rooms}}</dd>@endif
							@if($property->floor)<dt>Поверх</dt><dd>{{$property->floor}}</dd>@endif
							@if($property->total_area)<dt>Загальна площа</dt><dd>{{$property->total_area}}</dd>@endif
							@if($property->living_area)<dt>Жила площа</dt><dd>{{$property->living_area}}</dd>@endif
							@if($property->kitchen_area)<dt>Площа кухні</dt><dd>{{$property->kitchen_area}}</dd>@endif
							@if($property->land_area)<dt>Площа ділянки</dt><dd>{{$property->land_area}}</dd>@endif
						</dl>
					</div>
					<div class="right">
						{!! $property->description !!}
						@if($property->address)<p>Адреса: {{$property->address}}</p>@endif
					</div>
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


@section('styles')
<link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/vendor/slick/slick-theme.css"/>
@endsection


@section('scripts')
<script type="text/javascript" src="/vendor/slick/slick.min.js"></script>

<script>
$(function () {
	 $('.main-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: false,
	  infinite: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 8,
	  slidesToScroll: 1,
	  asNavFor: '.main-slider',
	  dots: false,
	  centerMode: false,
	  focusOnSelect: true,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 8,
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 5,
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 3,
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});

});
</script>
@endsection
