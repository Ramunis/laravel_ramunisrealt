<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\board;

class NewrentController extends Controller
{
  public function submit(Request $req)
  { //размещение нового объявления
    $newrent = new board(); //объявление таблицы

$newrent->dc = $req->input('date');  // получение данных из формы
$newrent->realtor = $req->session()->get('userid');
$newrent->city = $req->input('city');
$newrent->area = $req->input('area');
$newrent->adres = $req->input('address');
$newrent->service = 1;
$newrent->square =$req->input('sq');
$newrent->ds = date('Y-m-d');
$newrent->term = $req->input('term');
$newrent->price = $req->input('price');
$newrent->pay = $req->input('pay');
$newrent->perair = $req->input('rerair');
$newrent->pic = $req->input('picture');

$newrent->save(); //сохранение объявления в бд

return redirect('rent'); //отправка пользователя в каталог объявлений

  }
}
