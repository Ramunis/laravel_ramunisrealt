<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
  public function submit(Request $req)
  { //авторизация пользователя
    $un = $req->input('floatingInput');   // получение Логина из формы
    $pw = md5($req->input('floatingPassword')); //шифроваие введеного пароля


    $user = clients::where('username', '=', $un)->where('password', '=', $pw)->get();  //запрос есть ли такой пользователь и совпадает ли пароль

  if(count($user)) //проверка есть ли логин и пароль в базе
    {
      foreach ($user as $ses) // если да записываем логин и номер пользователя в сессию
      {
        if($req->has('one')){
          Cookie::queue('lf', $un,600);
          Cookie::queue('pf', $req->input('floatingPassword'),600);

            }else{
              $cockie='no check';
            }
        $req->session()->put('userlogin', $ses->username);
        $req->session()->put('userid', $ses->id);
        $req->session()->put('userpic', $ses->pic);
      }
      if ($req->session()->get('userlogin')=='admin') //если вошел админ
      {
      return redirect('realtpanel');
      }
      else
      {
      return redirect('rent');  //отправляем пользоателя на сайт
      }
    }
  else
   {
  return redirect('reg');  //если нет отправляем на регистрацию
   }

  }
}
