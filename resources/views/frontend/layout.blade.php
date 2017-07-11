<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Cache-control" content="public">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,700&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css" media="none">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="none">
	<link href="/css/style.min.css" type="text/css" rel="stylesheet">
	<!--[if gte IE 9]><link rel="stylesheet" type="text/css" href="assets/css/ie9.css" media="screen"/><![endif]-->
	@yield('styles')
</head>
<body class="{{isset($home) ? 'home-page' : ''}}">
	<div id="wrapper">

		@include('frontend.partial.topnav')

		@yield('content')

		@include('frontend.partial.footer')

	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/js/jquery.burgermenu.js"></script>
	<script type="text/javascript" src="/js/jquery.slideshow.js"></script>
	<script type="text/javascript" src="/js/jquery.winheight.js"></script>
	<script type="text/javascript" src="/js/jquery.bgstretch.js"></script>
	<script type="text/javascript" src="/js/jquery.sameheight.js"></script>
	<script type="text/javascript" src="/js/jquery.anchors.js"></script>
	<script type="text/javascript" src="/js/forms.js"></script>
	<!--[if lte IE 9]><script type="text/javascript" src="/assets/js/ie.js"></script><link rel="stylesheet" type="text/css" href="assets/css/ie.css" media="screen"/><![endif]-->
	@yield('scripts')
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-22194907-10', 'auto');
	  ga('send', 'pageview');

	</script>


	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5952638508e0e75d" async></script> 
</body>
</html>