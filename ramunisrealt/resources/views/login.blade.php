<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



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
    <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-signin">
  <form action="{{ route('loged') }}" method="post">
      @csrf

    <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/ru/b/bf/Windows_Live_Messenger_icon.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="floatingInput" value="{{Cookie::get('lf');}}">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" value="{{Cookie::get('pf');}}">
      <label for="floatingPassword">Пароль</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" id="one" name="one" value="remember-me"> Запомнить меня
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Вход</button>
    <div class="container">
      <a href="{{ route('forgetpas') }}">Восстановление пароля</a>
    <div>
    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
  </form>
</main>
  </body>
</html>
