<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          <a class="nav-link" href="#">About</a>
          @if(Auth::check())
          <div class="nav-item dropdown ml-auto">
            <a href="#" id="user_menu" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::user()->name }}</a>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
          @else 
          <div class="nav-link ml-auto">
            <a href="/login" role="button" class="btn btn-primary" style="padding-top:0">Log In</a> or <a href="/register" role="button" class="btn btn-primary" style="padding-top:0">Register</a>
          </div>
          @endif
        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Blog</h1>
        <p class="lead blog-description">Laravel</p>
      </div>
    </div>

    <script>
    $(document).ready(function (){
      $('.dropdown-toggle').on('click', function() {
        $(".dropdown-menu").toggle();
      });
      
    });
    </script>