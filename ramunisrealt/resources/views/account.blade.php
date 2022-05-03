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
    <title>Личный кабинет</title>

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
            <a class="nav-link active" aria-current="page" href="/account">Личный кабинет</a>
          </li>
      <li class="nav-item">
            <a class="nav-link" href="/affare">Текущие сделки</a>
          </li>
        </li>
    <li class="nav-item">
          <a class="nav-link" href="/regedit">Архив</a>
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



	  <div class="container">
<div id="main">
  @if(count($accs))
	<br><h1 class="h2">Мой профиль</h1>
 <div class="row" id="real-estates-detail">
 <div class="col-lg-4 col-md-4 col-xs-12">
 <div class="panel panel-default">
 <div class="panel-heading">



	   <div class="panel-body">
        @foreach ($accs as $acc)
 <div class="text-center" id="author">
 <input type="image" name="pic" src={{$acc->pic}} width="180">
 </div>
 </div>
 </div>


 <table class="table table-th-block">
 <tbody>

 <tr><td class="active">Фамилия:</td><td>{{$acc->f}}</td></tr>
 <tr><td class="active">Имя:</td><td>{{$acc->i}}</td></tr>
 <tr><td class="active">Отчество:</td><td>{{$acc->o}}</td></tr>
 <tr><td class="active">Дата рождения:</td><td>{{$acc->dr}}</td></tr>
 <tr><td class="active">Город:</td><td>{{$acc->city}}</td></tr>
 <tr><td class="active">Адрес:</td><td>{{$acc->adres}}</td></tr>
 <tr><td class="active">Телефон:</td><td>{{$acc->phone}}</td></tr>
 <tr><td class="active">Email:</td><td>{{$acc->email}}</td></tr>

</tbody>
 </table>
   @endforeach
 @endif

	  <h1 class="h2">Мои объявления</h1>
   @if(count($adds))
	  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Построен</th>
      <th scope="col">Город</th>
	  <th scope="col">Район</th>
	  <th scope="col">Адрес</th>
	  <th scope="col">Услуга</th>
	  <th scope="col">Площадь</th>
	  <th scope="col">Цена</th>
    <th scope="col">Ремонт</th>
	  <th scope="col">Фото</th>
    <th scope="col">Переход</th>
    <th scope="col">Изменять</th>
    <th scope="col">Удалить</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($adds as $add)

    <tr>
      <th scope="row">{{$add->id}}</th>
      <td>{{$add->dc}}</td>
      <td>{{$add->city}}</td>
	  <td>{{$add->area}}</td>
      <td>{{$add->adres}}</td>
      <td>{{$add->service}}</td>
	  <td>{{$add->square}}</td>
	  <td>{{$add->price}}</td>
	  <td>{{$add->perair}}</td>
      <td><input type="image" name="pic" src={{$add->pic}} width="180"></td>
        <td><a href="{{ route('add', $add->id) }}"><button class="btn btn-warning">-></button></a></td>
         <td><a href="{{ route('addedit', $add->id) }}"><button class="btn btn-info">🖉</button></a></td>
           <td><a href="{{ route('adddel', $add->id) }}"><button class="btn btn-danger">🗑</button></a></td>
    </tr>
      @endforeach
  </tbody>
</table>

	  </div>
    {{$adds->links()}}
 </div>
 </div>
 </div>
		   </div>
     <?php else: print '<h2>Объявлений пока нет<h2>'?>
      @endif




  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/account">Back to top</a></p>
      <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
