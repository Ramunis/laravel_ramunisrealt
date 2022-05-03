<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ramunisrealt</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">


<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/carousel/carousel.css" rel="stylesheet">
  </head>
  <body>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ramunisrealt</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/rent">Снять</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/buy">Купить</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/newbuild">Новостройки</a>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="/newrent">Сдать</a>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="/newbuy">Продать</a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="/sellers">Топ продавцы</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/calc">Ипотека</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/events">Уведомления</a>
       </li>
			<li class="nav-item">
            <a class="nav-link" href="/account">Личный кабинет</a>
          </li>
			<li class="nav-item">
            <a class="nav-link" href="/affare">Текущие сделки</a>
          </li>
        </li>
    <li class="nav-item">
          <a class="nav-link" href="/regedit">Архив</a>
        </li>

        </ul>

        <div class="dropdown">
      <a href="https://getbootstrap.com/docs/5.1/examples/sidebars/#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <strong>Уведомления</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <h6>Сегодня купили</h6>
          @if(count($contractes))
        @foreach ($contractes as $contract)
      <li>
        <a>{{$contract->adres}}</a>
      </li>
      @endforeach
    <?php else: print '<h6>Не найдено<h6>'?>
      @endif
      <h6>Сегодня одобрено</h6>
        @if(count($archivs))
      @foreach ($archivs as $contracte)
    <li>
      <a>{{$contracte->adres}}</a>
    </li>
      @endforeach
        <?php else: print '<h6>Не найдено<h6>'?>
          @endif
      </ul>
      </div>

        <?php
        session_start();
        if (Session::has('userlogin'))
      {
        print('<h4><span class="badge badge-secondary">Привет</span></h4>');
        print('<div class="dropdown">');
        print('<a href="https://getbootstrap.com/docs/5.1/examples/sidebars/#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">');
        print('<img src=');
        print(session("userpic"));
        print('alt="" width="32" height="32" class="rounded-circle me-2">');
        print('<strong>');
        print(session("userlogin"));
        print('</strong>');
        print('</a>');
        print('<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="/affare">Сделки</a></li>
          <li><a class="dropdown-item" href="/setting">Настройки</a></li>
          <li><a class="dropdown-item" href="/account">Аккаунт</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/logout">Выход</a></li>
        </ul>
      </div>');
    }
    else {
      print('<td><a href="/login"><button class="btn btn-outline-success">Вход</button></a></td>');
      print('&nbsp;');
      print('<td><a href="/reg"><button class="btn btn-outline-success">Регистрация</button></a></td>');
    }
      ?>
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="http://img-fotki.yandex.ru/get/5640/64843573.1d1/0_a048f_fb699f14_orig.jpg" class="img-rounded">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Войдите в систему.</h1>
            <p>Чтоб получить доступ к сервисам сайта.</p>
            <p><a class="btn btn-lg btn-primary" href="/login">Авторизоваться</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://cache.marriott.com/marriottassets/marriott/PTYMJ/ptymj-view-2505-hor-feat.jpg" class="img-rounded">

        <div class="container">
          <div class="carousel-caption">
            <h1>Арендуй недвижимость.</h1>
            <p>В каталоге есть множество предложений по разным ценам.</p>
            <p><a class="btn btn-lg btn-primary" href="/rent">Смотреть</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="https://teletype.in/files/3e/03/3e03fa36-7ef0-4138-8e34-dd24b0a91c01.jpeg" class="img-rounded">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Покупай недвижимость.</h1>
            <p>В каталоге есть множество предложений по разным ценам.</p>
            <p><a class="btn btn-lg btn-primary" href="/buy">Смотреть</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">




    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Просматривайте объявления<span class="text-muted">.</span></h2>
        <p class="lead">Аренды и продажи по любым районам и разным ценовым категориям</p>
      </div>
      <div class="col-md-5">
         <img src="https://media.istockphoto.com/photos/cityscape-of-paris-picture-id1176360891?s=612x612" class="img-rounded">
        </svg>

      </div>
    </div>

    <hr class="featurette-divider">

  <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Размещайте свои объявления<span class="text-muted">.</span></h2>
        <p class="lead">По аренде и продаже недвижимости бесплатно.</p>
      </div>
      <div class="col-md-5 order-md-1">
          <img src="https://i0.wp.com/cde.news/wp-content/uploads/2019/12/children-2.png?resize=500%2C500&ssl=1" class="img-rounded">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Совершайте сделки<span class="text-muted">.</span></h2>
        <p class="lead">Онлайн и не выходя из дома.</p>
      </div>
      <div class="col-md-5">
    <img src="https://media.istockphoto.com/photos/city-warsaw-picture-id1344331461?s=612x612" class="img-rounded">

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/">Back to top</a></p>
      <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
