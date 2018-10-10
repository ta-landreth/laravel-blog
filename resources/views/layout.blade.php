<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>My Laravel Blog Example</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/app.css" rel="stylesheet">
</head>

<body>
  @include('partials.nav')
  <div class="container">
    <div class="row">
      @yield('content')
      <!-- Where the content (as indicated by the section labeled 'content') will be 'inserted' -->
      <!-- examples 
     @ yield('footer')
     @ yield('scripts')-->
     @include('partials.sidebar')
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  @include('partials.footer')
</body>
</html>