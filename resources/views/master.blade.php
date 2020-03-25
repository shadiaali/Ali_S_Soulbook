<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book of Souls</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
<link href="https://fonts.googleapis.com/css?family=Julee|Mandali&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app" class="container wow fadeIn">
        <nav id="mainNav" class="align-items-center text-center">

            <h1 class="mt-5  display-1 align-items-center text-center">Book of Souls</h1><br>
            <a href="{{ route('home') }}"><button type="button" class="btn btn-elegant btn-sm">Lost Souls</button></a>
            
            <a href="{{ route('sign') }}"><button type="button" class="btn btn-elegant btn-sm">Sign Your Name</button></a>
            </nav><br><br>

        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>

<!-- Initializations -->
<script type="text/javascript">
   // Animations initialization
  new WOW().init();
</script>
</body>
</html>