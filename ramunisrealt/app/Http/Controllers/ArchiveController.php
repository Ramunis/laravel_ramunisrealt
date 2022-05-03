<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\board;
use App\Models\contracts;
use App\Models\archives;
use App\Models\clients;

class ArchiveController extends Controller
{
  public function submit(Request $req,$id) //для админа
  {
    if ($req->session()->get('userlogin')=='admin')
    {
     //после завершение сделки - Риелтор отправляет её в архив
    $num =  $id; //получаем номер сделки которую хотим отправить в архив

    $table = contracts::where('id','=',$num)->get(); //по номеру запрашиваем всё о сделке

    if(count($table)) // если сделка существует
    {
      foreach ($table as $el) //поэлементный перебор цикл
      {
        $new = new archives(); //объявление таблицы архив

    $new->dc = $el->dc;  //записывает в неё данные о сделке поэлементно
    $new->clientid = $el->cliente;
    $new->realtorid = $el->realtor;
    $new->city = $el->city;
    $new->area = $el->area;
    $new->adres = $el->adres;
    $new->service = $el->service;
    $new->square = $el->square;
    $new->ds = $el->ds;
    $new->term = $el->term;
    $new->price = $el->price;
    $new->pay = $el->pay;
    $new->perair = $el->perair;
    $new->pic = $el->pic;
      } //конец цикла
        $new->save(); //сохраняем контракт

        contracts::find($num)->delete(); //удаляет сделку из таблицы по номеру

      return redirect('realtpanel'); //отправляем риелтора в вдмин панель
    }

    else
    {
     return redirect('realtcont'); //в случае провала отправляем назад
    }
  }
  else
  {
    return redirect('account');
  }

  }

  public function cancel(Request $req,$id)
  { // если сделка сорвалась
    if ($req->session()->get('userlogin')=='admin')
    {
    $num =  $id; //получаем номер сделки

    contracts::find($num)->delete(); //удаляем сделку

    return redirect('realtcont');
    }
    else
    {
     return redirect('account');
    }
  }

  public function ban(Request $req,$id)
  { // выписать бан пользователю
    if ($req->session()->get('userlogin')=='admin')
    {
    $num =  $id; // получаем номер пользователя

    board::where('realtor', '=', $num)->delete(); //удаляем его объявления и сделки - чтоб удаление стало возможным

    contracts::where('realtor', '=', $num)->orwhere('cliente', '=', $num)->delete();

    clients::find($num)->delete(); //удаляем его

    return redirect('realtuser'); //переход в раздел пользователи
  }
  else
  {
     return redirect('account');
  }

  }
}
