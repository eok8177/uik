@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.slider') <small>{{ $slider->title }}</small></h1>

{!! Form::open(['route' => ['admin.slider.update', $slider->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

  <div class="form-group">
    {!! Form::label('image', Lang::get('messages.image'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
        <i class="fa fa-picture-o"></i> @lang('messages.chose')
      </a>
      <a id="delete-image" class="btn btn-danger {{($slider->image) ? '' : 'hidden'}}">
        <i class="fa fa-trash-o"></i> @lang('messages.delete')
      </a>
    </div>
    <input id="thumbnail" class="form-control" type="hidden" name="image" value="{{ $slider->image }}">
    <div class="col-sm-offset-2 col-sm-10">
      <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ $slider->image }}">
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('slug', Lang::get('messages.slug'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('slug', $slider->slug, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('title', Lang::get('messages.title'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('title', $slider->title, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('description', Lang::get('messages.description'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('description', $slider->description, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          {!! Form::hidden('enabled', 0) !!}
          {!! Form::checkbox('enabled', 1, $slider->enabled) !!}@lang('messages.enabled')
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
