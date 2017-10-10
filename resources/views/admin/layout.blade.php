<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- Fonts --}}
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

  {{-- Styles --}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

  {{-- Custom CSS --}}
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

  {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
  {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('styles')
</head>

<body>

  <div id="app">

    {{-- Navigation --}}
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-tachometer"></i> <span class="hidden-xs">@lang('messages.dashboard')</span></a>

        {{-- Top Menu Items --}}
        <ul class="nav navbar-right top-nav">
          <li>
            <a href="/"><i class="fa fa-fw fa-home"></i> <span class="hidden-xs">@lang('messages.to_site')</span></a>
          </li>

          {{-- Profile dropdown  --}}
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs">{{ Auth::user()->username }}</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('admin.user.edit', ['id' => Auth::user()->id]) }}"><i class="fa fa-fw fa-gear"></i> <span class="hidden-xs">@lang('messages.settings')</span></a>
              </li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> @lang('messages.logout')</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>

      {{-- SIDEBAR --}}
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav side-nav">
          <li>
            <a href="{{ route('admin.slider.index') }}"><i class="fa fa-fw fa-picture-o"></i> @lang('messages.slider')</a>
          </li>
          <hr>
          <li>
            <a href="{{ route('admin.category.index') }}"><i class="fa fa-fw fa-book"></i> @lang('messages.category')</a>
          </li>
          <li>
            <a href="{{ route('admin.page.index') }}"><i class="fa fa-fw fa-newspaper-o"></i> @lang('messages.page')</a>
          </li>
          <hr>

          <li>
            <a href="{{ route('admin.property.index') }}"><i class="fa fa-fw fa-building-o"></i> @lang('messages.property')</a>
          </li>
          <hr>

          <li>
            <a href="{{ route('admin.partner.index') }}"><i class="fa fa-fw fa-users"></i> @lang('messages.partners')</a>
          </li>
          <hr>

          <li>
            <a href="{{ route('admin.settings.index') }}"><i class="fa fa-fw fa-phone"></i> @lang('messages.settings')</a>
          </li>
        </ul>
      </div>
    </nav>

    {{--  PAGE  --}}
    <div id="page-wrapper">
      <div class="container-fluid">

        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach

          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>

        @yield('content')

      </div>{{-- /.container-fluid --}}
    </div>
  </div>

  {{--  FOOTER  --}}

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

  {{-- JavaScripts --}}
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  @yield('scripts')
</body>

</html>
