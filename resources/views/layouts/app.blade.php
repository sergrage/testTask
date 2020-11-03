<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">



    <!-- Title -->
    <title>Тестовое задание</title>

    <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">

    <!-- Favicon -->
    <link rel="icon" href="">

    <!-- Style CSS -->
    <link href="{{ mix('/app/css/app.css') }}" rel="stylesheet">

</head>

<body>


<!-- ##### Header Area Start ##### -->
<header class="header-area">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Статейник</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link " href="/">Главная страница</a>
      </li>
      <li class="nav-item {{ request()->is('articles') ? 'active' : '' }} {{ request()->is('articles/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('articles') }} ">Каталог статей</a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
  </div>
</nav>
</header>

<div class="container">

     @yield('content') 

</div>


<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ mix('app/js/app.js') }}"></script>
</body>

</html>

@yield('captcha')
@yield('script')