@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.settings')</h1>

{!! Form::open(['route' => ['admin.settings.mupdate'], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

  @foreach($settings as $item)

  <div class="form-group">
    <label class="col-md-2 control-label" for="settings[{{$item->id}}][value]">{{$item->name}}</label>
    <div class="col-md-10">
      <input type="text" name="settings[{{$item->id}}]" class="form-control" value="{{$item->value}}">
    </div>
  </div>

  @endforeach

  <div class="form-group">
    <div class="col-md-2 control-label"></div>
    <div class="col-md-10">
          {!! Form::submit(Lang::get('messages.save'), ['class' => 'btn btn-default']) !!}
    </div>
  </div>
{!! Form::close() !!}


@endsection