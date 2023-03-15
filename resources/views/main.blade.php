<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TS</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class = "nav-link" href="{{route ('main.index')}}">Главная</a>
        </li>
        <li class="nav-item">
        <li><a class = "nav-link" href="{{route ('about.index')}}">О нас</a></li>
        </li>
        <li class="nav-item">
        <li><a class = "nav-link" href="{{route ('contact.index')}}">Контакты</a></li>
        </li>
        <li class="nav-item">
        <li><a class = "nav-link" href="{{route ('cat.index')}}">Каталог</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <div class = "container">
        @yield('content')
    </div>
    </body>
</html>