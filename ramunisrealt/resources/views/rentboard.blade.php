<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог аренды</title>

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

      .circle-link{
  display: inline-flex;
  width: 160px;
  height: 160px;
  background-color: green;
  color: white;
  border: solid 1px darkgreen;
  border-radius: 80px;
  font-size: 20px;
  text-decoration: none;
  text-align: center;
  align-items: center;
  justify-content: center;
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
            <a class="nav-link" aria-current="page" href="/">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/rent">Снять</a>
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

  <div class="container-fluid">
    <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">

        <div class="container">
   <h1 class="h2">Фильтрация</h1>
  <form method="get" action="{{ route('filter') }}" class="needs-validation" novalidate>
 <div class="form-row">

   <li class="nav-item">
     <label for="exampleFormControlSelect1">По району</label>
     <select class="form-select" class="form-control" id="area" name="area" required>
       <option value="*">Choose...</option>
       <option value="1">Ленинский район</option>
   <option value="2">Первомайский район</option>
<option value="3">Фрунзенский район</option>
<option value="4">Первореченский район</option>
<option value="5">Советский район</option>
<option value="6">Артём</option>
<option value="7">Остров Русский</option>
     </select>
   </li>

    <li class="nav-item">
       <label for="min">Min price</label>
       <input type="text" class="form-control" id="min" name="min" value=*>
    </li>

     <li class="nav-item">
       <label for="max">Max price</label>
       <input type="text" class="form-control" id="max" name="max" value=*>
     </li>

      <li class="nav-item">
            <label for="sqmin">Min SQ</label>
            <input type="text" class="form-control" id="sqmin" name="sqmin" value=*>
          </li>

        <li class="nav-item">
            <label for="sqmax">Max SQ</label>
            <input type="text" class="form-control" id="sqmax" name="sqmax" value=*>
            </li>

          <br><button type="submit" class="btn btn-primary btn-lg btn-block">Фильтр</button>
   </form>
 </div>

    </div>
  </nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

<br><div class="container">
    <h1 class="h2">Поиск объявлений по аренде недвижимости</h1>
    <form method="get" action="{{ route('search') }}">
          <input type="text" class="form-control" id="s" name="s" placeholder="Поиск по адресу...">
          <button type="submit" class="btn btn-primary btn-block">Поиск</button>
    </form>
</div>

   <br><div class="container">
   <a class="alert alert-primary" href="{{ route('sortmax') }}">Самые дешёвые</a>
   <a class="alert alert-primary" href="{{ route('sortmin') }}">Самые дорогие</a>
   <div>

     <br><div class="container">
     <a href="{{ route('oneroom') }}">Однокомнатные</a>
     <a href="{{ route('tworoom') }}">Двухкомнатные</a>
     <a href="{{ route('threerom') }}">Трёхкомнатные</a>
     <a href="{{ route('fourroom') }}">Четырёхкомнатные</a>
     <div>

    @if(count($adds))
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Дата возведения</th>
      <th scope="col">Владелец</th>
      <th scope="col">Город</th>
    <th scope="col">Район</th>
    <th scope="col">Адрес</th>
    <th scope="col">Услуга</th>
    <th scope="col">Площадь</th>
    <th scope="col">Срок</th>
    <th scope="col">Цена</th>
    <th scope="col">Оплата</th>
    <th scope="col">Ремонт</th>
    <th scope="col">Фото</th>
    <th scope="col">Переход</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($adds as $add)

    <tr>
      <th scope="row">{{$add->id}}</th>
      <td>{{$add->dc}}</td>
      <td>{{$add->username}}</td>
      <td>{{$add->city}}</td>
    <td>{{$add->area}}</td>
      <td>{{$add->adres}}</td>
      <td>{{$add->service}}</td>
    <td>{{$add->square}}</td>
      <td>{{$add->term}}</td>
    <td>{{$add->price}}</td>
      <td>{{$add->pay}}</td>
    <td>{{$add->perair}}</td>
      <td><input type="image" name="pic" src={{$add->pic}} width="180"></td>
      <td><a href="{{ route('add', $add->id) }}"><button class="btn btn-warning">-></button></a></td>
    </tr>
  @endforeach
  </tbody>
</table>
  {{$adds->links()}}
 <?php else: print '<h2>Объявлений пока нет<h2>'?>
@endif

  </div>

</div>
</div>
</div>
</div>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/rent">Back to top</a></p>
    <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
  </main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
