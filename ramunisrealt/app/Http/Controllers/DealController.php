<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\board;
use App\Models\contracts;
use App\Models\clients;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class DealController extends Controller
{
  public function sendmes(Request $req,$username)
  {
    if ($req->session()->has('userlogin'))
    {
    $mail2 = $req->input('mail');
    $phone2 = $req->input('phone');
    $mes = $req->input('mes');

    $userstatus = clients::where('username','=',$username)->get();

    if(count($userstatus))  //сопадает ли код  и email
     {
       foreach ($userstatus as $el)
       {
         $mailsend = $el->email;
         $sender = $req->session()->get('userlogin');

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
             $mail->setFrom('myprobsait@yandex.ru', $sender);
             $mail->addAddress($mailsend);     //Add a recipient

             //Attachments
             //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
             //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

             //Content
             $mail->isHTML(true);                                  //Set email format to HTML
             $mail->Subject = $mail2;
             $mail->Body    = $mes;
             $mail->AltBody = '';

             $mail->send();
             echo 'Message has been sent';
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
         //
         return redirect('account');

       }
  }
  else
  {
      $msg = "Error";
      return response()->json(array('msg'=> $msg), 200);
  }
}
else
{
    return view('login');
}
  }
  public function submit(Request $req,$id)
  {
    if ($req->session()->has('userlogin'))    // если сессия не пуста - отправить в личный кабинет
    {
    //Заключение сделки - пользователь покупает объявление др пользователя
    $num =  $id; //получаем номер товара который хотим купить из формы товара

    $table = board::where('id','=',$num)->get(); //по номеру запрашиваем всё о товаре

    if(count($table)) // если товар существует
    {
      foreach ($table as $el) //поэлементный перебор цикл
      {
        $new = new contracts(); //объявление таблицы контракты

    $new->dc = $el->dc; //записывает в неё данные о товаре поэлементно
    $new->cliente = $req->session()->get('userid');
    $new->realtor = $el->realtor;
    $new->city = $el->city;
    $new->area = $el->area;
    $new->adres = $el->adres;
    $new->service = $el->service;
    $new->square = $el->square;
    $new->ds = date('Y-m-d');
    $new->term = $el->term;
    $new->price = $el->price;
    $new->pay = $el->pay;
    $new->perair = $el->perair;
    $new->pic = $el->pic;
  } //конец цикла
        $new->save(); //сохраняем контракт

        board::find($num)->delete(); //удаляет товар из каталога по номеру

      return redirect('affare'); //отправляем пользователя в мои сделки
    }
    else
    {
     return redirect('board'); //в случае провала отправляем в каталог
    }
  }
    else
    {
      return view('login');
    }

  }

  public function del(Request $req,$id)
  {
    if ($req->session()->has('userlogin'))  // если сессия не пуста - отправить в личный кабинет
    {
      $new = board::find($id);
      if ($req->session()->get('userid')==$new->realtor)
      {
      board::find($id)->delete();
      return redirect('account');
      }
      else
       {
       return redirect('rent');
       }
    }
    else
    {
      return view('login');
    }
  }

  public function edit(Request $req,$id)
  {
    if ($req->session()->has('userlogin'))    // если сессия не пуста - отправить в личный кабинет
    {
      $new = board::find($id);

      $new->city = $req->input('city');
      $new->area = $req->input('area');
      $new->adres = $req->input('address');
      $new->square = $req->input('sq');
      $new->term = $req->input('term');
      $new->price = $req->input('price');
      $new->pay = $req->input('pay');
      $new->perair = $req->input('rerair');
      $new->dc = $req->input('date');
      $new->pic = $req->input('picture');

      if ($req->session()->get('userid')==$new->realtor)
      {
      $new->save();
      return redirect('account');
      }
      else
      {
      return redirect('rent');
      }
    }
    else
    {
      return view('login');
    }
  }

}
