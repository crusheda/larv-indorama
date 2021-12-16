<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Auth::user()->name }} - PT.Indorama Artha Niaga</title>

    @include('inc.css')
    @include('sweetalert::alert')

  </head>
  <body class="vertical  light  ">
    <div class="wrapper">

      @include('inc.navbar')
      @include('inc.sidebar')

      <main role="main" class="main-content">
        @yield('content')
      </main> <!-- main -->

    </div> <!-- .wrapper -->

    {{-- FORM LOGOUT --}}
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    {{-- @include('inc.script-full') --}}
  </body>
</html>