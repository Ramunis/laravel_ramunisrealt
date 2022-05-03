<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Настройки</title>

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

 <div class="container">
<main>

	  <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://upload.wikimedia.org/wikipedia/ru/b/bf/Windows_Live_Messenger_icon.png" alt="" width="72" height="57">
      <h2>Настройка аккаунта</h2>
      <p class="lead">Изменение личных данных.</p>
    </div>
  @if(count($accs))
    <div class="row g-5">

      @foreach ($accs as $add)

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Заполните форму</h4>
        <form action="{{ route('edituser') }}" method="post" class="needs-validation" novalidate>
            @csrf
          <div class="row g-3">


			  <div class="col-12">
              <label for="Name" class="form-label">Имя <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="firstName" name="firstName" value="{{$add->f}}">
            </div>


            <div class="col-12">
              <label for="Surname" class="form-label">Фамилия <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="lastName" name="lastName" value="{{$add->i}}">
            </div>



			 <div class="col-12">
              <label for="Endname" class="form-label">Отчество </label>
              <input type="text" class="form-control" id="endName" name="endName" value="{{$add->o}}" required>
              <div class="invalid-feedback">

              </div>
            </div>


			  <div class="col-12">
              <label for="Phone" class="form-label">Телефон</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{$add->phone}}" required>
              <div class="invalid-feedback">

              </div>
            </div>

            <div class="col-12">
                    <label for="Borndate" class="form-label">День рождения</label>
                    <input type="date" class="form-control" id="borndate" name="borndate" value="{{$add->dr}}" required>
                    <div class="invalid-feedback">

                    </div>
                  </div>

            <div class="col-12">
                    <label for="City" class="form-label">Город</label>
                    <input type="text" class="form-control" id=city" name="city" value="{{$add->city}}" required>
                    <div class="invalid-feedback">

                    </div>
                  </div>


			<div class="col-12">
              <label for="address" class="form-label">Адрес</label>
              <input type="text" class="form-control" id="address" name="address" value="{{$add->adres}}" required>
              <div class="invalid-feedback">
              </div>
            </div>

            <div class="col-12">
                    <label for="pic" class="form-label">Ссылка на изображение</label>
                    <input type="text" class="form-control" id="picture" name="picture" value="{{$add->pic}}" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
				@endforeach

          </div>

          <hr class="my-4">
		  @endif

          <button class="w-100 btn btn-primary btn-lg" type="submit">Сохранить</button>
        </form>
      </div>
    </div>
  </div>


  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="/newrent">Back to top</a></p>
    <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
