@extends('frontend.layout')

@section('content')

<section id="main">
	<div class="main-holder">
		<div id="content">
			<div class="holder">

				<div class="heading news">
					<h1>{{ $category->title }}</h1>
				</div>

				<ul class="news-list">
				@foreach($category->pages as $page)
					<li>
						<div class="img-holder">
							<a href="/page/{{$page->slug}}"><img src="{{ $page->image }}" width="330" height="220" alt="{{ $page->title }}"></a>
						</div>
						<div class="text-holder">
							<strong class="title"><a href="/page/{{$page->slug}}">{{ $page->title }}</a></strong>
							<p>{!! $page->preview !!}</p>
						</div>
					</li>
				@endforeach
				</ul>

			</div>
		</div>  
		<aside id="sidebar">
			@include('frontend.partial.sidebar_feedback')
			@include('frontend.partial.sidebar_products')
		</aside>
	</div>
</section>


@endsection