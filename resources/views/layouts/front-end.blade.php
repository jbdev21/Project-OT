<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset("public/css/app.css")}}">

    </head>
    <body>
      <nav class="navbar navbar-expand-lg  navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Teachers <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{course}}">Course</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enroll</button>
            </form>
          </div>
          </div>
        </nav>
              @yield('for-partials')
            <div class="container">
              @yield('content')
            </div>


          </body>
    <script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
    
</html>
