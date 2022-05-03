<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Архив</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">



    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Главная</a>
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
        <a class="nav-link active" aria-current="page" href="/regedit">Архив</a>
      </li>

      </ul>
      <h4><span class="badge badge-secondary">Привет</span></h4>

      <div class="dropdown">
  <a href="https://getbootstrap.com/docs/5.1/examples/sidebars/#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="<?php print(session('userpic')); ?>" alt="" width="32" height="32" class="rounded-circle me-2">
    <strong><?php print(session('userlogin')); ?></strong>
  </a>
  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
    <li><a class="dropdown-item" href="/affare">Сделки</a></li>
    <li><a class="dropdown-item" href="/setting">Настройки</a></li>
    <li><a class="dropdown-item" href="/account">Аккаунт</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="/logout">Выход</a></li>
  </ul>
</div>
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

    <br><div class="container">

    </div>

      @if(count($rent))
	  <br><h1 class="h2">Контакты аренды</h1>
	  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Дата Сделки</th>
      <th scope="col">Клиент</th>
      <th scope="col">Город</th>
	  <th scope="col">Район</th>
	  <th scope="col">Адрес</th>
	  <th scope="col">Услуга</th>
	  <th scope="col">Площадь</th>
    <th scope="col">Дата Объявления</th>
	  <th scope="col">Срок</th>
	  <th scope="col">Цена</th>
	  <th scope="col">Оплата</th>
	  <th scope="col">Ремонт</th>
	  <th scope="col">Фото</th>
    <th scope="col">Смотреть контакты</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($rent as $contract)
    <tr>
      <th scope="row">{{$contract->id}}</th>
      <td>{{$contract->dc}}</td>
      <td>{{$contract->username}}</td>
	  <td>{{$contract->city}}</td>
      <td>{{$contract->area}}</td>
      <td>{{$contract->adres}}</td>
	  <td>{{$contract->service}}</td>
      <td>{{$contract->square}}</td>
        <td>{{$contract->ds}}</td>
	  <td>{{$contract->term}}</td>
      <td>{{$contract->price}}</td>
	  <td>{{$contract->pay}}</td>
      <td>{{$contract->perair}}</td>
      <td><input type="image" name="pic" src={{$contract->pic}} width="180"></td>
      <td><a href="{{ route('user', $contract->realtorid) }}"><button class="btn btn-warning">-></button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    {{$rent->links()}}

      <?php else: print '<h2>Контракты аренды не найдены<h2>'?>
@endif

     @if(count($irentor))
	   <br><h1 class="h2">Контракты сдачи в аренду</h1>
     <table class="table table-striped">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Дата Сделки</th>
       <th scope="col">Собственник</th>
       <th scope="col">Город</th>
 	  <th scope="col">Район</th>
 	  <th scope="col">Адрес</th>
 	  <th scope="col">Услуга</th>
 	  <th scope="col">Площадь</th>
     <th scope="col">Дата Объявления</th>
 	  <th scope="col">Срок</th>
 	  <th scope="col">Цена</th>
 	  <th scope="col">Оплата</th>
 	  <th scope="col">Ремонт</th>
 	  <th scope="col">Фото</th>
      <th scope="col">Смотреть контакты</th>
     </tr>
   </thead>
   <tbody>
       @foreach ($irentor as $contract)
     <tr>
       <th scope="row">{{$contract->id}}</th>
       <td>{{$contract->dc}}</td>
       <td>{{$contract->username}}</td>
 	  <td>{{$contract->city}}</td>
       <td>{{$contract->area}}</td>
       <td>{{$contract->adres}}</td>
 	  <td>{{$contract->service}}</td>
       <td>{{$contract->square}}</td>
         <td>{{$contract->ds}}</td>
 	  <td>{{$contract->term}}</td>
       <td>{{$contract->price}}</td>
 	  <td>{{$contract->pay}}</td>
       <td>{{$contract->perair}}</td>
       <td><input type="image" name="pic" src={{$contract->pic}} width="180"></td>
       <td><a href="{{ route('user', $contract->clientid) }}"><button class="btn btn-warning">-></button></a></td>
     </tr>
     @endforeach
   </tbody>
 </table>
   {{$irentor->links()}}
     <?php else: print '<h2>Контакты сдачи не найдены<h2>'?>
 @endif


	 &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
   <a href="/regeditnext">Перейти к продаже</a>
  </div>




  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/regedit">Back to top</a></p>
      <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
