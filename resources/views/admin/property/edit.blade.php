@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.property') <small>{{ $property->title }}</small></h1>

{!! Form::open(['route' => ['admin.property.update', $property->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}

  <div class="form-group">
    {!! Form::label('image', Lang::get('messages.image_main'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      @if($property->image)
      <div class="item-image">
        <img src="/resize/50/50/?img={{urlencode($property->image)}}" class="img-thumbnail">
      </div>
      @endif
      <input type="file" name="image" />
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('images', Lang::get('messages.image'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      @if($property->images)
      @foreach($property->images as $item)
      <div class="item-image">
        <img src="/resize/50/50/?img={{urlencode($item->title)}}" class="img-thumbnail">
        <a href="{{ route('admin.property.deleteimage', ['image'=>$item->id]) }}" class="btn fa fa-trash-o delete-image"></a>
      </div>
      @endforeach
      @endif
      <input type="file" name="images[]" multiple />
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('slug', Lang::get('messages.slug'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('slug', $property->slug, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('title', Lang::get('messages.title'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('title', $property->title, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('preview', Lang::get('messages.preview'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('preview', $property->preview, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', Lang::get('messages.description'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('description', $property->description, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('price', Lang::get('messages.price'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('price', $property->price, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('type', Lang::get('messages.type'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::select('type', $types, $property->type, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('classification', Lang::get('messages.classification'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::select('classification', $classifications, $property->classification, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('rooms', Lang::get('messages.rooms'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('rooms', $property->rooms, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('floor', Lang::get('messages.floor'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('floor', $property->floor, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('total_area', Lang::get('messages.total_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('total_area', $property->total_area, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('living_area', Lang::get('messages.living_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('living_area', $property->living_area, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('kitchen_area', Lang::get('messages.kitchen_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('kitchen_area', $property->kitchen_area, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('land_area', Lang::get('messages.land_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('land_area', $property->land_area, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('address', Lang::get('messages.address'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('address', $property->address, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          {!! Form::hidden('enabled', 0) !!}
          {!! Form::checkbox('enabled', 1, $property->enabled) !!}@lang('messages.enabled')
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-2 control-label"></div>
    <div class="col-md-10">
          {!! Form::submit(Lang::get('messages.save'), ['class' => 'btn btn-default']) !!}
    </div>
  </div>
{!! Form::close() !!}

@endsection
