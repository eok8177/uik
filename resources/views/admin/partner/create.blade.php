@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.partner')</h1>

{!! Form::open(['route' => ['admin.partner.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

  <div class="form-group">
    {!! Form::label('image', Lang::get('messages.image'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
        <i class="fa fa-picture-o"></i> @lang('messages.chose')
      </a>
      <a id="delete-image" class="btn btn-danger hidden">
        <i class="fa fa-trash-o"></i> @lang('messages.delete')
      </a>
    </div>
    <input id="thumbnail" class="form-control" type="hidden" name="image">
    <div class="col-sm-offset-2 col-sm-10">
      <img id="holder" style="margin-top:15px;max-height:100px;" >
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('slug', Lang::get('messages.slug'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('slug', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('title', Lang::get('messages.title'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
      {!! Form::text('title', '', ['class' => 'form-control']) !!}
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
