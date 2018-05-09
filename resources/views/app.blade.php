<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/base.css') }}" rel="stylesheet">
{{--    <link href="{{ url('bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">--}}
</head>
<style>
    #app{height:100%}
</style>
<body>
<app id="app"></app>
<!-- Scripts -->

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
  if (document.getElementsByTagName('iframe').length > 0) {
    window.location.reload();
  }
  !window.initUrl && (window.initUrl = window.location.href);
  let user = {!! json_encode(session('wechat.oauth_user')) !!};
</script>

<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
{{--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="{{ url('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
</body>
</html>
