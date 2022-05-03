<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Ипотечный калькулятор</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">



    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<script src="js/calc.js"></script>
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
         <a class="nav-link active" aria-current="page" href="/calc">Ипотека</a>
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
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

<br><div class="container">
    <h1 class="h2">Ипотечный калькулятор</h1>

  <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Рассчитайте платеж и переплату по кредиту</h4>
    <form class="needs-validation" validate>
      <div class="row g-3">

        <div class="col-12">
          <label for="cena" class="form-label">Цена <span class="text-muted"></span></label>
          <input type="number" class="form-control" id="cena" name="cena" placeholder="1000000">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="col-12">
          <label for="start" class="form-label">Первоначальный взнос</label>
          <input type="number" class="form-control" id="start" name="start" placeholder="300000" required>
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="col-sm-6">
          <label for="term" class="form-label">Срок(лет)</label>
          <input type="text" class="form-control" id="term" name="term" placeholder="10" value="" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="bet" class="form-label">Ставка(%)</label>
          <input type="text" class="form-control" id="bet" name="bet" placeholder="5" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

      </div>

            <br><button class="btn btn-warning" type="button" onclick="presscalc()" name="bcalc">Расчитать</button>
            </form>
  </div>
  <script>

  function presscalc()
		  {
			  var c = document.getElementById('cena').value;
			  var s = document.getElementById('start').value;
        var t = document.getElementById('term').value;
			  var b = document.getElementById('bet').value;

        var monthbet = b/12/100;

        var firts =1+monthbet;
        var end = t*12;
        var commonbet = Math.pow(firts, end);
        var monthpay = c * monthbet * commonbet /(commonbet-1);

        var perpart = c * monthbet;
        var mainpart = monthpay - perpart;

        var overpay = monthpay * (t*12)-c;

			  //alert(c+s+t+b);
			  //document.getElementById('output').value = monthpay;
        alert("Платёж в месяц = "+monthpay+";Переплата = "+overpay);
		  }

</script>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <br><footer class="container">
    <p class="float-end"><a href="/rent">Back to top</a></p>
      <p>&copy; 2021–2022 Ramunisrealt, Inc. &middot; <a href="/welcome">Privacy</a> &middot; <a href="/info">Terms</a></p>
  </footer>
</main>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
