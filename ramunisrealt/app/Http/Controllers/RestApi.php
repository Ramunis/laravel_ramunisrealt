<?php

namespace App\Http\Controllers;
use App\Models\board;
use App\Models\clients;
use App\Models\contracts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RestApi extends Controller
{
    //
    public function vhod(Request $req)  //Авторизация
    {
        $un = $req->un;
        $pw = $req->pw;

        $user = clients::where('username', '=', $un)->where('password', '=', md5($pw))->get();

        if(count($user)) //проверка есть ли логин и пароль в базе
          {
            foreach ($user as $ses) // если да записываем логин и номер пользователя в сессию
            {
              //
              $data = $ses->id;
              $req->session()->put('userlogin', $ses->username);
              $req->session()->put('userid', $ses->id);
              $req->session()->put('userpic', $ses->pic);
              //
            }
            return response()->json($data);
          }
        else
         {
        return response()->json('Error');  //если нет отправляем на регистрацию
         }
    }

    public function pokupka(Request $req)  //Объявления продажи
    {
      $ads =new board;
      return response()->json($ads->From('boards')
      ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
      ->join('services', 'boards.service', '=', 'services.id')
      ->Select('boards.id', 'boards.dc', 'districts.adres AS area', 'boards.adres', 'boards.price')
      ->Where('services.service','=','Продажа')->get());
    }

    public function arenda(Request $req)  //Объявление аренды
    {
      $ads =new board;
      return response()->json($ads->From('boards')
      ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
      ->join('services', 'boards.service', '=', 'services.id')
      ->Select('boards.id', 'boards.dc', 'districts.adres AS area', 'boards.adres', 'boards.price')
      ->Where('services.service','=','Аренда')->get());
   }

    public function newpokupka(Request $req)  //Объявления нововстройки
    {
    return response()->json($ads->From('boards')
      ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
      ->join('services', 'boards.service', '=', 'services.id')
     ->Select('boards.id', 'boards.dc',  'districts.adres AS area', 'boards.adres', 'boards.price')
     ->Where('services.service','=','Продажа')->whereYear('dc','>','2020')->get());
    }

    public function objvlenie(Request $req)   //Объявление по id
    {
      $id = $req->id;

      $ads =new board;

    return response()->json($ads->From('boards')
        ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
        ->join('services', 'boards.service', '=', 'services.id')
        ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city',
        'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')
        ->Where('boards.id','=',$id)->get());
      }

      public function prodavec(Request $req)  //Пользователь по id
      {
        $id = $req->id;

        $ads =new board;

        return response()->json($ads->From('boards')
          ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
          ->join('services', 'boards.service', '=', 'services.id')
          ->Select('boards.id', 'boards.dc', 'districts.adres AS area', 'boards.adres', 'boards.price')->Where('boards.realtor','=',$id)->get());
       }

        public function moiobj(Request $req)  //Мои объявления
       {
         $id = $req->id;

         $ads =new board;

         return response()->json($ads->From('boards')
       ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')
       ->join('services', 'boards.service', '=', 'services.id')
       ->Select('boards.id', 'boards.dc', 'districts.adres AS area', 'boards.adres', 'boards.price')
       ->Where('realtor','=',$id)->get());
        }

        public function moipokupki(Request $req)  //Мои покупки
        {
          $id = $req->id;

          $contrtes=new contracts;

          return response()->json($contrtes->From('contracts')
        ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')
        ->join('services', 'contracts.service', '=', 'services.id')
        ->Select('contracts.id', 'contracts.dc', 'districts.adres AS area', 'contracts.adres', 'contracts.price')
        ->Where('realtor','=',$id)->get());
         }

         public function moiprodagi(Request $req)  //У меня покупают
         {
           $id = $req->id;

           $contrtes=new contracts;

           return response()->json($contrtes->From('contracts')->join('clients', 'contracts.cliente', '=', 'clients.id')
           ->join('districts', 'contracts.area', '=', 'districts.id')
           ->join('services', 'contracts.service', '=', 'services.id')->Select('contracts.id', 'contracts.dc', 'districts.adres AS area', 'contracts.adres', 'contracts.price')
           ->Where('realtor','=',$id)->get());;
          }

}
