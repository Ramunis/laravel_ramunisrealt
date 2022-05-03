<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>

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

<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://upload.wikimedia.org/wikipedia/ru/b/bf/Windows_Live_Messenger_icon.png" alt="" width="72" height="57">
      <h2>Регистрация</h2>
      <p class="lead">Будет создана учётная запись в системе. Затем нужно будет подтвердить личность с помощью Email.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>


      </div>
        <form class="d-flex" action="{{ route('reged') }}" method="post">
            @csrf


      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Заполните форму</h4>
        <form class="needs-validation" validate>
          <div class="row g-3">

            <div class="col-12">
              <label for="firstName" class="form-label">Имя</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Имя" value="" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>


            <div class="col-12">
              <label for="lastName" class="form-label">Фамилия</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Фамилия" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>


            <div class="col-12">
              <label for="endName" class="form-label">Отчество</label>
              <input type="text" class="form-control" id="endName" name="endName" placeholder="Отчество" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div id = 'msg'></div>

            <div class="col-12">
              <label for="username" class="form-label">Логин</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" onkeypress="myFunction(this.value)" required><span></span>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

			  <div class="col-12">
				  <label for="password" class="form-label">Пароль</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <span class="input-group-btn">
              <div class="invalid-feedback">
              </div>
            </div>

		<div class="col-12">
				  <label for="Repeatpassword" class="form-label">Повторите пароль</label>
               <input type="password" class="form-control" id="Repeatpassword" placeholder="Password" required>
      <span class="input-group-btn">
              <div class="invalid-feedback">
              </div>
            </div>



            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Телефон</label>
                <div class="input-group has-validation">
              <span class="input-group-text">+</span>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="7" required>
              <div class="invalid-feedback">
              </div>
              </div>
            </div>

			<div class="col-12">
              <label for="Borndate" class="form-label">День рождения</label>
              <input type="date" class="form-control" id="borndate" name="borndate" placeholder="" required>
              <div class="invalid-feedback">

              </div>
            </div>

			<div class="col-12">
              <label for="City" class="form-label">Город <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Владивосток">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Адрес <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Apartment or suite">
            </div>

			<div class="col-12">
              <label for="picture" class="form-label">Ссылка на изображение </label>
              <input type="text" class="form-control" id="picture" name="picture" placeholder="https://site.com/images/1.jpg" required>
              <div class="invalid-feedback">
              </div>
            </div>

          </div>

          <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" onclick="getMessage()" type="submit">Продолжить</button>
                </form>

                <script src = "//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
                 </script>

                 <script>
                    function getMessage(){
                      var firstName =  document.getElementById('firstName').value;
                      var lastName =  document.getElementById('lastName').value;
                      var endName =  document.getElementById('endName').value;
                      var username =  document.getElementById('username').value;
                      var password =  document.getElementById('password').value;
                      var email =  document.getElementById('email').value;
                      var phone =  document.getElementById('phone').value;
                      var borndate =  document.getElementById('borndate').value;
                      var city =  document.getElementById('city').value;
                      var address =  document.getElementById('address').value;
                      var picture =  document.getElementById('picture').value;

                      //alert(username);
                      //$("#msg").html('text');
                       $.ajax({
                          type:'POST',
                          url:'{{ route('reged') }}',
                          data:'_token = <?php echo csrf_token() ?>',
                          firstName:firstName,
                          lastName:lastName,
                          endName:endName,
                          username:username,
                          password:password,
                          email:email,
                          phone:phone,
                          borndate:borndate,
                          city:city,
                          address:address,
                          picture:picture,
                          success:function(data){
                             $("#msg").html(data.msg);
                          }
                       });
                    }
                 </script>

      </div>
    </div>
  </main>

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
