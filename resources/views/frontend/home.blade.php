@extends('frontend.layout')

@section('content')

<div class="slideshow win-min-height">
	<div class="mask">
		<div class="slideset">
		@foreach($slider as $item)
		<div class="slide win-height">
			<img src="{{ $item->image }}" width="1920" height="1280" alt="">
			<div class="slide-text">
			<div class="st-holder">
				<h1>
					<a href="{{ $item->slug }}">
					<span>{{ $item->title }}</span>
					</a>
				</h1>
				<p>{!! $item->description !!}</p>
			</div>
			</div>
		</div>
		@endforeach
	</div>
	</div>
	<a class="btn-prev" href="#">Previous</a>
	<a class="btn-next" href="#">Next</a>
	<div class="pagination"></div>
	<a href="#footer" class="link-down">Down</a>
</div>
{{-- 
<section id="main">
	<ul class="news-boxes">
	Block
	</ul>
</section> --}}

@endsection