@extends('frontend.layout')

@section('content')

<section id="main">
	<div class="main-holder">
		<div id="content">
			<div class="holder">
				<div class="heading">
					<h1>{{ $page->title }}</h1>
				</div>

				{!! $page->preview !!}

				<div class="row">
					<div class="addthis_inline_share_toolbox pull-right"></div>
				</div>

				<div class="photo-frame">
					<img src="{{ $page->image }}" alt="{{ $page->title }}">
				</div>

				{!! $page->description !!}

			</div>
		</div>
		<aside id="sidebar">
			@include('frontend.partial.sidebar_feedback')
			@include('frontend.partial.sidebar_products')
		</aside>
	</div>
</section>


@endsection