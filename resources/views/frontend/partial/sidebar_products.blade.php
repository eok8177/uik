<ul class="products">
@foreach($properties as $item)
	<li>
		<div class="img-holder">
			<a href="/property/{{$item->slug}}">
				<img src="/resize/283/194/?img={{urlencode($item->image)}}" alt="{{$item->title}}">
			</a>
		</div>
		<div class="text-holder">
			<a href="/property/{{$item->slug}}">
				<span class="name">{{$item->title}}</span>
				<span class="cost">Ціна: {{$item->price}}</span>
			</a>
		</div>
	</li>
	<li>
@endforeach
</ul>