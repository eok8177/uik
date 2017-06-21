@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.property')</h1>

{!! Form::open(['route' => ['admin.property.store'], 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}


  <div class="form-group">
    {!! Form::label('image', Lang::get('messages.image_main'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      <input type="file" name="image" />
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('images', Lang::get('messages.image'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      <input type="file" name="images[]" multiple />
    </div>
  </div>


  <div class="form-group">
    {!! Form::label('title', Lang::get('messages.title'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('title', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('preview', Lang::get('messages.preview'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('preview', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', Lang::get('messages.description'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('price', Lang::get('messages.price'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('price', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('type', Lang::get('messages.type'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::select('type', $types, false, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('classification', Lang::get('messages.classification'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::select('classification', $classifications, false, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('rooms', Lang::get('messages.rooms'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('rooms', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('floor', Lang::get('messages.floor'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('floor', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('total_area', Lang::get('messages.total_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('total_area', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('living_area', Lang::get('messages.living_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('living_area', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('kitchen_area', Lang::get('messages.kitchen_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('kitchen_area', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('land_area', Lang::get('messages.land_area'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('land_area', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('address', Lang::get('messages.address'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('address', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          {!! Form::hidden('enabled', 0) !!}
          {!! Form::checkbox('enabled', 1, true) !!}@lang('messages.enabled')
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
