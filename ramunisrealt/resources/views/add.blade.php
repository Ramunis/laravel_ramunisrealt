<!doctype html>

<style>

#main {
 background-color: #f2f2f2;
 padding: 20px;
-webkit-border-radius: 4px;
 -moz-border-radius: 4px;
 -ms-border-radius: 4px;
 -o-border-radius: 4px;
 border-radius: 4px;
 border-bottom: 4px solid #ddd;
}
#real-estates-detail #author img {
 -webkit-border-radius: 100%;
 -moz-border-radius: 100%;
 -ms-border-radius: 100%;
 -o-border-radius: 100%;
 border-radius: 100%;
 border: 5px solid #ecf0f1;
 margin-bottom: 10px;
}
#real-estates-detail .sosmed-author i.fa {
 width: 30px;
 height: 30px;
 border: 2px solid #bdc3c7;
 color: #bdc3c7;
 padding-top: 6px;
 margin-top: 10px;
}
.panel-default .panel-heading {
 background-color: #fff;
}
#real-estates-detail .slides li img {
 height: 450px;
}
</style>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Объявление</title>

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
             @if(count($adds))
        <div class="container">
   <h1 class="h2">Обратная связь</h1>
      @foreach ($adds as $sen)
      <form class="d-flex" action="{{ route('sendmes',$sen->username) }}" method="post">
   @csrf
 <div class="form-row">
    <li class="nav-item">
       <label for="min">Имя</label>
       <input type="text" class="form-control" id="name" name="name" placeholder="Имя">
    </li>
     <li class="nav-item">
       <label for="max">Email</label>
       <input type="email" class="form-control" id="mail" name="mail" placeholder="mail@gmail.com">
     </li>

      <li class="nav-item">
            <label for="sqmin">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="+7">
          </li>

        <li class="nav-item">
            <label for="sqmax">Сообщение</label>
          <textarea class="form-control" id="mes" name="mes" rows="5"></textarea>
            </li>
            <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить</button>
        </form>

   @endforeach
 </div>
   	  @endif
    </div>
  </nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	  <div class="container">
      @if(count($adds))
<div id="main">
  @foreach ($adds as $add)
	<br><h1 class="h2">{{$add->adres}}</h1>
	<br><h1 class="h2">{{$add->price}}$</h1>
 <div class="row" id="real-estates-detail">
 <div class="col-lg-4 col-md-4 col-xs-12">
 <div class="panel panel-default">
 <div class="panel-heading">



	   <div class="panel-body">
 <div class="text-center" id="author">
 <input type="image" name="pic" src={{$add->pic}} width="180">
 </div>
 </div>
 </div>


 <table class="table table-th-block">
 <tbody>
 <tr><td class="active">ID:</td><td>{{$add->id}}</td></tr>
 <tr><td class="active">Дата объявления:</td><td>{{$add->ds}}</td></tr>
 <tr><td class="active">Дата возведения:</td><td>{{$add->dc}}</td></tr>
 <tr><td class="active">Риелтор:</td><td>{{$add->username}}<td></td></tr>
 <tr><td class="active">Город:</td><td>{{$add->city}}</td></tr>
 <tr><td class="active">Район:</td><td>{{$add->area}}</td></tr>
 <tr><td class="active">Адрес:</td><td>{{$add->adres}}</td></tr>
 <tr><td class="active">Услуга:</td><td>{{$add->service}}</td></tr>
 <tr><td class="active">Площадь:</td><td>{{$add->square}} м^2</td></tr>
 <tr><td class="active">Срок:</td><td>{{$add->term}} дней</td></tr>
 <tr><td class="active">Цена:</td><td>{{$add->price}} $</td></tr>
 <tr><td class="active">Оплата:</td><td>{{$add->pay}}</td></tr>
 <tr><td class="active">Ремонт:</td><td>{{$add->perair}}</td></tr>

</tbody>
 </table>
   <td><a href="{{ route('user', $add->realtor) }}"><button class="btn btn-primary">Смотреть профиль</button></a></td>
   <td><a href="{{ route('getdeal', $add->id) }}"><button class="btn btn-success">Заключить сделку</button></a></td>
@endforeach
	  </div>
 </div>
 </div>
 </div>
		   </div>

	  @endif
  </div>
</div>
</div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/add">Back to top</a></p>
  <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
