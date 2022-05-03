<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\password_resets;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class RegController extends Controller  //Контроллер регистрации
{  //регистрация пользователя

  public function change(Request $req)
  {
    $userstatus = clients::where('email','=',$req->session()->get('mail'))->get();

    if(count($userstatus))  //сопадает ли код  и email
     {
       foreach ($userstatus as $el)
       {
         $newuser = clients::find($el->id);

         $newuser->password = md5($req->input('password'));

         $newuser->save();

          return redirect('login');
       }
  }
  else
  {
      $msg = "Error";
      return response()->json(array('msg'=> $msg), 200);
  }
}

  public function reset(Request $req)
  {
    $code = $req->input('code');
    $mail = $req->session()->get('mail');

    $user = password_resets::where('token', '=', $code)->where('email','=',$mail)->get();

    if(count($user))  //сопадает ли код  и email
     {
        return redirect('changepas');
     }
       else
     {
       $msg = "Code is not correct!";
      return response()->json(array('msg'=> $msg), 200);   //если нет совпадений - не подтверждения
     }

  }

  public function forget(Request $req)
  {
    if ($req->session()->has('userlogin'))
    {
      return view('login');
    }
    else
    {
      $maill = $req->input('mail');

      $userstatus = clients::where('email','=',$maill)->get();

      if(count($userstatus))  //сопадает ли код  и email
       {
         $code=mt_rand(0, 999999);
         $req->session()->put('mail', $maill);
         foreach ($userstatus as $el)
         {
           $sendlogin =$el->username;
           $newuser = new password_resets();
           $newuser->email = $maill;
           $newuser->token = $code;

           $newuser->save();
        //
        $mail = new PHPMailer(true);

        try {
            //Server settings                //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.yandex.ru';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'myprobsait@yandex.ru';                     //SMTP username
            $mail->Password   = '4444';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('myprobsait@yandex.ru', 'Ramunisrealt');
            $mail->addAddress($maill);     //Add a recipient

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Your Ramunisrealt account: Password reset';
            $mail->Body    = 'Dear ' .$sendlogin . ' thank you for reset password<br>This is your confirm code: ' .$code;
            $mail->AltBody = '';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        //
        return redirect('resetpas');
        }

       }
         else
       {
         $msg = "Email dont exist!";
        return response()->json(array('msg'=> $msg), 200);   //если нет совпадений - не подтверждения
       }
    }

  }

  public function seter(Request $req)
  {
    if ($req->session()->has('userlogin'))    // если сессия не пуста - отправить в личный кабинет
    {
      $new = clients::find($req->session()->get('userid'));

      $new->f = $req->input('lastName');
      $new->i = $req->input('lastName');
      $new->o = $req->input('endName');
      $new->dr = $req->input('borndate');
      $new->city = $req->input('city');
      $new->adres = $req->input('address');
      $new->phone = $req->input('phone');
      $new->pic = $req->input('picture');

      $new->save();

      return redirect('account');
    }
    else
    {
      return view('login');
    }

  }

  public function confirm(Request $req)
  {
    $code = $req->input('code');
    $mail = $req->session()->get('mail');

    $userstatus = clients::where('concode', '=', $code)->Where('email','=',$mail)->get();

    if(count($userstatus))  //сопадает ли код  и email
     {
       foreach ($userstatus as $el)
       {
         $id = $el->id;

        $newuser = clients::find($id);
        $newuser->act = $code;
        $newuser->save(); // выполнение регистрации
        return redirect('login');
      }

     }
       else
     {
       $msg = "Code or email is not correct!";
      return response()->json(array('msg'=> $msg), 200);   //если нет совпадений - не подтверждения
     }

  }
    public function submit(Request $req)
    {
         $un = $req->input('username');   //получение Логина из формы
         $mail = $req->input('email');

         $userlogin = clients::where('username', '=', $un)->orWhere('email', '=', $mail)->get(); //поиск Логина в БД

   if(count($userlogin))  //существует ли Логин
    {
      $msg = "Login is busy!";
     return response()->json(array('msg'=> $msg), 200);   //если да - Логин занят
    }
      else
    {
      $code=mt_rand(0, 999999);  // если нет - начать регистрацию
      $newuser = new clients();

  $newuser->username = $req->input('username');  // получение данных из формы
  $newuser->password = md5($req->input('password')); //шифрование пароля
  $newuser->role = 'client';
  $newuser->concode = $code;
  $newuser->act = 'false';
  $newuser->f = $req->input('firstName');
  $newuser->i = $req->input('lastName');
  $newuser->o = $req->input('endName');
  $newuser->dr = $req->input('borndate');
  $newuser->city = $req->input('city');
  $newuser->adres = $req->input('address');
  $newuser->phone = $req->input('phone');
  $newuser->email = $req->input('email');
  $req->session()->put('mail', $req->input('email'));
  $newuser->pic = $req->input('picture');

  $newuser->save(); // выполнение регистрации

//

$mail = new PHPMailer(true);

try {
    //Server settings                //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.yandex.ru';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'myprobsait@yandex.ru';                     //SMTP username
    $mail->Password   = '4444';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('myprobsait@yandex.ru', 'Ramunisrealt');
    $mail->addAddress($req->input('email'));     //Add a recipient

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Ramunisrealt account: Email address verification';
    $mail->Body    = 'Dear ' .$req->input('username') . ' thank you for registration<br>This is your confirm code: ' .$code;
    $mail->AltBody = '';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  return redirect('conf'); // после регистрации отправить на страницу приветствия
  }

    }
}
