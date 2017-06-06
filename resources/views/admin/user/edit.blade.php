@extends('admin.layout')

@section('content')
<h2 class="page-header">@lang('messages.user') <small>{{ $user->username }}</small></h2>

{!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

  <div class="form-group">
    {!! Form::label('username', Lang::get('messages.username'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('email', Lang::get('messages.email'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
    </div>
  </div>

  <hr>

  <div class="form-group">
    {!! Form::label('password', Lang::get('messages.new_password'), ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::password('password', '', ['class' => 'form-control']) !!}
    </div>
  </div>

  {!! Form::hidden('redirect', 'dashboard') !!}

  <div class="form-group">
    <div class="col-md-2 control-label"></div>
    <div class="col-md-10">
          {!! Form::submit(Lang::get('messages.save'), ['class' => 'btn btn-default']) !!}
    </div>
  </div>
{!! Form::close() !!}

@endsection
