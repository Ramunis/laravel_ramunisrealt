<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Восстановление пароля</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">



    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
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
    <link href="form-validation.css" rel="stylesheet">

  </head>
  <body class="bg-light">

<main>

  <div class="container">

	  <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://www.seekpng.com/png/small/207-2073297_windows-xp-key-icon.png" alt="" width="72" height="57">
      <h2>Восстановление пароля</h2>
      <p class="lead">Введите email к которому привязан аккаунт.</p>
    </div>

    <div class="row g-5">

		<div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Восстановление пароля</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Поиск аккаунта по email</h6>
              <small class="text-muted">ввод email</small>
            </div>
            <span class="text-muted"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Подтвержение аккаунта</h6>
              <small class="text-muted">ввод кода подтверждения</small>
            </div>
            <span class="text-muted"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Смена пароля</h6>
              <small class="text-muted">заполнение формы</small>
            </div>
            <span class="text-muted"></span>
          </li>
        </ul>
      </div>

      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        </h4>

      <form class="d-flex" action="{{ route('forget') }}" method="post">
        @csrf

      <div class="col-md-7 col-lg-8">

          <div class="row g-3">

            <div class="col-12">
              <label for="address" class="form-label">Введите Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="mail" name="mail" placeholder="mail@gmail.com">
            </div>

    </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Продолжить</button>
        </form>
      </div>
    </div>
  </div>

  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->


  <!-- FOOTER -->
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 Ramunisrealt</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="/welcome">Privacy</a></li>
      <li class="list-inline-item"><a href="/info">Terms</a></li>
      <li class="list-inline-item"><a href="/ms">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
