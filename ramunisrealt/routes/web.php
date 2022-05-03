<?php

use Illuminate\Support\Facades\Route;
use App\Models\board;
use App\Models\contracts;
use App\Models\clients;
use App\Models\archives;
use App\Models\districts;
use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\RegController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewrentController;
use App\Http\Controllers\NewbuyController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RestApi;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Здесь прописана маршрутизация - происходит возращение предстравленя вместе с данными запроса.Более сложные действия в БД находяться в Котроллерах,здесь есть на них ссылки.Также здесь происходят проверки авторизован ли пользователь.

Route::get('/', function (Request $req) {  //объявление главной страницы

    $cont=new board;          //сложный запрос и возращение представления
    $arc=new archives;

    return view('index',['contractes'=>$cont->From('contracts')
  ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')
  ->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.realtor','=',$req->session()->get('userid'))->whereDate('ds', Carbon::today())->where('ds', '<', Carbon::now()->endOfWeek())->paginate(5)],
  ['archivs'=>$arc->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term','archives.price','archives.pay','archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->orWhere('archives.realtorid','=',$req->session()->get('userid'))->whereDate('ds', Carbon::today())->paginate(5)]);  //возвращение представления - php файла
});

Route::get('/welcome', function () { // это было изначально в пустом проекте
    return view('welcome');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/ms', function () {
    return view('ms');
});

Route::get('/login', function (Request $req) {  //объявление страницы авторизации

  if ($req->session()->has('userlogin')) //если уже авторизован - перенаправить в личный кабинет
  {
      return redirect('account');
  }
  else  // если не авторизован - вернуть представление формы авторизцаии
  {
    return view('login');
  }

})->name('vxod'); //уникальное имя нужно

Route::post('/login/submit', [LoginController::class, 'submit'])->name('loged'); //url адрес от кнопки войти ведёт в КонтроллерАвторизации

Route::get('/logout', function (Request $req) { //объявление страницы дял выхода из профиля

    Auth::logout();  //методы
    Session::flush(); //для очистки сессии

    return view('login'); //возвращает представление формы авторизации
});

Route::get('/reg', function (Request $req) { //объявление страицы регистрации

  if ($req->session()->has('userlogin'))
  {
    return redirect('account');
  }
  else
  {
    return view('reg');
  }

})->name('regist');

// Route::post('/reg/check', function (Request $req,$data) { //объявление страницы дял выхода из профиля
//
//    $data = [
//      "title" => $POST['title']
//    ];
//
//    //$un = $data[0];
//    $un = $req->input('username');
//    $userlogin = clients::where('username', '=', $un)->get();
//
//    if(count($userlogin))  //существует ли Логин
//     {
//       $msg="Логин занят";
//       return $msg;         //если да - Логин занят
//     }
//       else
//     {
//       $msg="Логин свободен";
//       return $msg;
//     }
// })->name('check');

Route::post('/reg/submit', [RegController::class, 'submit'])->name('reged');

Route::get('/forgetpas', function (Request $req) { //объявление страницы дял выхода из профиля

  if ($req->session()->has('userlogin'))
  {
    return redirect('account');
  }
  else
  {
    return view('forget');
  }

})->name('forgetpas');

Route::post('/forgetpas/submit', [RegController::class, 'forget'])->name('forget');

Route::get('/resetpas', function (Request $req) { //объявление страницы дял выхода из профиля

  if ($req->session()->has('userlogin'))
  {
    return redirect('account');
  }
  else
  {
    return view('reset');
  }

})->name('resetpas');

Route::post('/resetpas/submit', [RegController::class, 'reset'])->name('reset');

Route::get('/changepas', function (Request $req) { //объявление страницы дял выхода из профиля

  if ($req->session()->has('userlogin'))
  {
    return redirect('account');
  }
  else
  {
    return view('change');
  }

})->name('changepas');

Route::post('/changepas/submit', [RegController::class, 'change'])->name('change');

Route::get('/conf', function (Request $req) { //объявление страицы регистрации

  if ($req->session()->has('userlogin'))
  {
    return redirect('account');
  }
  else
  {
    return view('confirmation');
  }

})->name('confirm');

Route::post('/conf', [RegController::class, 'confirm'])->name('confrirming');

Route::get('/account', function (Request $req) { //объявление страницы личного кабинета

  if ($req->session()->has('userlogin')) // если сессия не пуста - отправить в личный кабинет
  {
    $acs = new clients; //объявление таблиц
    $ads = new board; //объявление таблиц
    return view('account',['accs'=>$acs->Where('username','=',$req->session()->get('userlogin'))->get()],['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('realtor','=',$req->session()->get('userid'))->paginate(10)]);
 }  //возращение представления вместе с данными запросов
 else //если сессия пуста отправить на авторизацию
  {
     return view('login');
 }

});

Route::get('/setting', function (Request $req) { //объявление страницы личного кабинета

  if ($req->session()->has('userlogin')) // если сессия не пуста - отправить в личный кабинет
  {
    $acs = new clients; //объявление таблиц
    return view('settings',['accs'=>$acs->Where('username','=',$req->session()->get('userlogin'))->get()]);
 }  //возращение представления вместе с данными запросов
 else //если сессия пуста отправить на авторизацию
  {
     return view('login');
 }

});

Route::post('/setting', [RegController::class, 'seter'])->name('edituser');

Route::get('/account/edit{id}', function (Request $req,$id) {

  if ($req->session()->has('userlogin'))            // если сессия не пуста - отправить в личный кабинет
  {
    $ads = new board;

    return view('editadd',['adds'=>$ads->From('boards')
    ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
    ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'boards.area AS arean','districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('boards.id','=',$id)->get()]);
  }
  else
  {
    return view('login');
  }

})->name('addedit');

Route::post('/account/editad{id}', [DealController::class, 'edit'])->name('editadd');

Route::get('/account/del{id}', [DealController::class, 'del'])->name('adddel');

// Route::post('/account', function (Request $req) {
//
// $properyid = $req->input('binddd');
// $req->session()->put('property', $properyid);
//
// return redirect('add');
//
// })->name('click');

Route::get('/sellers', function (Request $req) { //объявление страницы топ продавцы

  if ($req->session()->has('userlogin'))
  {
    $sel=new clients; //сложный запрос и возращение представления
    return view('sellers',['adds'=>$sel->Select(DB::raw('count(boards.id) as aver, clients.id, clients.f, clients.i , clients.o, clients.dr, clients.city, clients.email, clients.phone, clients.pic'))
    ->From('boards')->join('clients', function ($join) {$join->on('boards.realtor', '=', 'clients.id');})->groupBy('clients.id' , 'clients.f', 'clients.i' , 'clients.o', 'clients.dr', 'clients.city', 'clients.email', 'clients.phone', 'clients.pic')->paginate(10)]);
  }
  else
   {
      return view('login');
   }
});

Route::get('/events', function (Request $req) { //объявление страницы топ продавцы

  if ($req->session()->has('userlogin'))
  {
    $cont=new board; //сложный запрос и возращение представления
    $arc=new archives;
    return view('eventst',['contractes'=>$cont->From('contracts')
  ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')
  ->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.realtor','=',$req->session()->get('userid'))->whereDate('ds', Carbon::today())->paginate(5)],
  ['archivs'=>$arc->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term','archives.price','archives.pay','archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->orWhere('archives.realtorid','=',$req->session()->get('userid'))->whereDate('ds', Carbon::today())->paginate(5)]);
  }
  else
   {
      return view('login');
   }
});

Route::get('/evens', function (Request $req) { //объявление страницы топ продавцы

  if ($req->session()->has('userlogin'))
  {
    $cont=new board; //сложный запрос и возращение представления
    $arc=new archives;
    return view('eventsw',['contractes'=>$cont->From('contracts')
  ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')
  ->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.realtor','=',$req->session()->get('userid'))->where('ds', '>', Carbon::now()->startOfWeek())->where('ds', '<', Carbon::now()->endOfWeek())->paginate(5)],
  ['archivs'=>$arc->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term','archives.price','archives.pay','archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->orWhere('archives.realtorid','=',$req->session()->get('userid'))->where('ds', '>', Carbon::now()->startOfWeek())->where('ds', '<', Carbon::now()->endOfWeek())->paginate(5)]);
  }
  else
   {
      return view('login');
   }
});

Route::get('/eves', function (Request $req) { //объявление страницы топ продавцы

  if ($req->session()->has('userlogin'))
  {
    $cont=new board; //сложный запрос и возращение представления
    $arc=new archives;
    return view('eventsm',['contractes'=>$cont->From('contracts')
  ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')
  ->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.realtor','=',$req->session()->get('userid'))->whereMonth('ds', '=', Carbon::now()->subMonth())->paginate(5)],
  ['archivs'=>$arc->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term','archives.price','archives.pay','archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->orWhere('archives.realtorid','=',$req->session()->get('userid'))->whereMonth('ds', '=', Carbon::now()->subMonth())->paginate(5)]);
  }
  else
   {
      return view('login');
   }
});


Route::get('/affare', function (Request $req) { //объявление страницы мои сделки

  if ($req->session()->has('userlogin'))
  {
    $contrtes=new contracts;
    return view('affare',['contractes'=>$contrtes->From('contracts')
  ->join('clients', 'contracts.realtor', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')
  ->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.cliente','=',$req->session()->get('userid'))->paginate(10)],
  ['contrs'=>$contrtes->From('contracts')->join('clients', 'contracts.cliente', '=', 'clients.id')->join('districts', 'contracts.area', '=', 'districts.id')->join('services', 'contracts.service', '=', 'services.id')->Select('contracts.id', 'contracts.ds','contracts.dc', 'contracts.cliente', 'contracts.realtor','clients.username', 'contracts.city', 'districts.adres AS area', 'contracts.adres', 'services.service', 'contracts.square', 'contracts.term', 'contracts.price', 'contracts.pay', 'contracts.perair','contracts.pic')->Where('contracts.realtor','=',$req->session()->get('userid'))->paginate(10)]);
 }
  else
   {
      return view('login');
   }
});


Route::get('/affare/user/{id}', function ($id) { //объявление страницы формы пользователя и сюда передается его номер из формы

  $acs = new clients; //объявляются таблицы
  $ads = new board;

return view('user',['accs'=>$acs->Where('id','=',$id)->get()],['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('realtor','=',$id)->paginate(10)]);

})->name('user');

Route::get('/affare/getdeal/{id}', [DealController::class, 'submit'])->name('getdeal'); //url адрес ведущий на Котроллер где совершается сделка


Route::get('/regedit', function (Request $req) { //объявление страницы архива сделок

  if ($req->session()->has('userlogin'))
  {
    $contracts=new archives;
    return view('regedit',['rent'=>$contracts->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term', 'archives.price', 'archives.pay', 'archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->where('archives.service', '=', '1')->paginate(5)],
    ['irentor'=>$contracts->From('archives')->join('clients', 'archives.clientid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term', 'archives.price', 'archives.pay', 'archives.perair','archives.pic')->Where('archives.realtorid','=',$req->session()->get('userid'))->where('archives.service', '=', '1')->paginate(5)]);
  }
  else
   {
      return view('login');
   }
});

Route::get('/regeditnext', function (Request $req) { //все данные в архив не поместились - пришлось на 2 страницы разбить

  if ($req->session()->has('userlogin'))
  {
    $contracts=new archives;
    return view('regeditnext',['buye'=>$contracts->From('archives')->join('clients', 'archives.realtorid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term', 'archives.price', 'archives.pay', 'archives.perair','archives.pic')->Where('archives.clientid','=',$req->session()->get('userid'))->where('archives.service', '=', '2')->paginate(5)],
    ['ibuyer'=>$contracts->From('archives')->join('clients', 'archives.clientid', '=', 'clients.id')->join('districts', 'archives.area', '=', 'districts.id')->join('services', 'archives.service', '=', 'services.id')->Select('archives.id', 'archives.ds','archives.dc', 'archives.clientid', 'archives.realtorid','clients.username', 'archives.city', 'districts.adres AS area', 'archives.adres', 'services.service', 'archives.square', 'archives.term', 'archives.price', 'archives.pay', 'archives.perair','archives.pic')->Where('archives.realtorid','=',$req->session()->get('userid'))->where('archives.service', '=', '2')->paginate(5)]);
  }
  else
   {
      return view('login');
   }
});

Route::get('/rent', function (Request $req) { //объявление страницы объялений аренды

  $ads =new board;
  return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->paginate(10)]);

});

// Route::post('/rent', function (Request $req) {
//
// $properyid = $req->input('bindd');
// $req->session()->put('property', $properyid);
//
// return redirect('add');
//
// })->name('clicked');

Route::get('/rent/add/{id}', function ($id) { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('add',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('boards.id','=',$id)->paginate(10)]);

})->name('add');

Route::post('/affare/send/{username}', [DealController::class, 'sendmes'])->name('sendmes');

Route::get('/search', function (Request $req) { //поиск объявлений

   $s= $req->s;  //запрос значения для поиска из формы
   $sear=new board;

   return view('rentboard',['adds'=>$sear->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->Where('boards.adres','LIKE',"%{$s}%")->orderBy('boards.adres')->paginate(10)]); //возвращает представление аренды с запросом данных

})->name('search');

Route::get('/rent/sortmax/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->orderBy('boards.price')->paginate(10)]);

})->name('sortmax');

Route::get('/rent/sortmin/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->orderBy('boards.price','DESC')->paginate(10)]);

})->name('sortmin');

Route::get('/rent/oneroom/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->Where('boards.square','<','40')->orderBy('boards.square','DESC')->paginate(10)]);

})->name('oneroom');

Route::get('/rent/tworoom/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->whereBetween('boards.square', [40, 60])->orderBy('boards.square','DESC')->paginate(10)]);

})->name('tworoom');

Route::get('/rent/threerom/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->whereBetween('boards.square', [60, 80])->orderBy('boards.square')->paginate(10)]);

})->name('threerom');

Route::get('/rent/fourroom/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('rentboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Аренда')->where('boards.square','>',80)->orderBy('boards.square')->paginate(10)]);

})->name('fourroom');

Route::get('/filter', function (Request $req) { //поиск продавца

   $a= $req->area;
   $pmin= $req->prmin;
   $pmax= $req->prmax;
   $smin= $req->sqmin;
   $smax= $req->sqmax;
   $sel=new board;

   return view('rentboard',['adds'=>$sel->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.id','districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')
   ->whereBetween('boards.price', [$pmin, $pmax])->whereBetween('boards.square', [$smin, $smax])->orWhere('districts.id','>=',$a)->Where('services.service','=','Аренда')->paginate(10)]);

})->name('filter');

Route::get('/filtere', function (Request $req) { //поиск продавца

   $a= $req->area;
   $pmin= $req->prmin;
   $pmax= $req->prmax;
   $smin= $req->sqmin;
   $smax= $req->sqmax;
   $sel=new board;

   return view('buyboard',['adds'=>$sel->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.id','districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')
   ->whereBetween('boards.price', [$pmin, $pmax])->whereBetween('boards.square', [$smin, $smax])->orWhere('districts.id','>=',$a)->Where('services.service','=','Продажа')->orderBy('boards.price')->paginate(10)]);

})->name('filtere');

Route::get('/filtre', function (Request $req) { //поиск продавца

   $a= $req->area;
   $pmin= $req->prmin;
   $pmax= $req->prmax;
   $smin= $req->sqmin;
   $smax= $req->sqmax;
   $sel=new board;

   return view('newbuildboard',['adds'=>$sel->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.id','districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')
   ->whereBetween('boards.price', [$pmin, $pmax])->whereBetween('boards.square', [$smin, $smax])->orWhere('districts.id','>=',$a)->Where('services.service','=','Продажа')->whereYear('dc','>','2020')->orderBy('boards.price')->paginate(10)]);

})->name('filtre');


Route::get('/find', function (Request $req) {

   $q= $req->q;
   $sea=new board;

   return view('buyboard',['adds'=>$sea->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->Where('boards.adres','LIKE',"%{$q}%")->orderBy('boards.adres')->paginate(10)]);

})->name('find');

Route::get('/topseller', function (Request $req) { //поиск продавца

   $s= $req->s;
   $sel=new clients;

   return view('topsellers',['adds'=>$sel->Where('f','LIKE',"%{$s}%")->OrWhere('i','LIKE',"%{$s}%")->orderBy('f')->paginate(10)]);

})->name('topseller');

Route::get('/buy', function (Request $req) { //объявление страницы объявлений продажи

    $ads =new board;
    return view('buyboard',['adds'=>$ads->From('boards')
    ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
    ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->paginate(10)]);

});

Route::post('/buy', function (Request $req) {

$properyid = $req->input('bind');
$req->session()->put('property', $properyid);

return redirect('add');

})->name('clicke');

Route::get('/buy/sortmaxbuy/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->orderBy('boards.price')->paginate(10)]);

})->name('sortmaxbuy');

Route::get('/buy/sortminbuy/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->orderBy('boards.price','DESC')->paginate(10)]);

})->name('sortminbuy');

Route::get('/buy/onem/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->Where('boards.price','<',1000000)->orderBy('boards.price','DESC')->paginate(10)]);

})->name('onem');

Route::get('/buy/twom/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->whereBetween('boards.price', [1000000, 3000000])->orderBy('boards.price','DESC')->paginate(10)]);

})->name('twom');

Route::get('/buy/threem/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->whereBetween('boards.price', [3000000, 6000000])->orderBy('boards.price')->paginate(10)]);

})->name('threem');

Route::get('/buy/fourm/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('buyboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->where('boards.price','>',10000000)->orderBy('boards.price')->paginate(10)]);

})->name('fourm');


Route::get('/newbuild', function (Request $req) { //объявление страницы объявлений продажи

    $ads =new board;
    return view('newbuildboard',['adds'=>$ads->From('boards')
    ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
    ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->whereYear('dc','>','2020')->paginate(10)]);

});

Route::get('/findnew', function (Request $req) {

   $q= $req->q;
   $sea=new board;

   return view('newbuildboard',['adds'=>$sea->From('boards')
   ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
   ->Select('boards.id', 'boards.dc', 'clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')
   ->Where('services.service','=','Продажа')->Where('boards.adres','LIKE',"%{$q}%")->whereYear('dc','>','2020')
   ->orderBy('boards.adres')->paginate(10)]);

})->name('findnew');

Route::get('/buy/sortmaxnew/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('newbuildboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->orderBy('boards.price')->paginate(10)]);

})->name('sortmaxnew');

Route::get('/buy/sortminnew/', function () { //объявление страницы формы пользователя и сюда передается его номер из формы

  $ads =new board;

return view('newbuildboard',['adds'=>$ads->From('boards')
  ->join('clients', 'boards.realtor', '=', 'clients.id')->join('districts', 'boards.area', '=', 'districts.id')->join('services', 'boards.service', '=', 'services.id')
  ->Select('boards.id', 'boards.dc', 'boards.ds', 'boards.realtor','clients.username', 'boards.city', 'districts.adres AS area', 'boards.adres', 'services.service', 'boards.square', 'boards.term', 'boards.price', 'boards.pay', 'boards.perair','boards.pic')->Where('services.service','=','Продажа')->orderBy('boards.price','DESC')->paginate(10)]);

})->name('sortminnew');

Route::get('/newrent', function (Request $req) {

  if ($req->session()->has('userlogin'))
  {
    return view('newrent');
  }
  else
  {
    return view('login');
  }
});

Route::post('/newrent/submit', [NewrentController::class, 'submit'])->name('rented');

Route::get('/newbuy', function (Request $req) {
  if ($req->session()->has('userlogin'))
  {
    return view('newbuy');
  }
  else
  {
  return view('login');
  }
});

Route::post('/newbuy/submit', [NewbuyController::class, 'submit'])->name('buyed');

// Route::get('/add', function (Request $req) {
//   $ads =new board;
//   return view('add',['adds'=>$ads->Where('id','=',$req->session()->get('property'))->get()]);
// });

// Route::post('/add', function () {
//
// return redirect('user');
//
// })->name('profclick');

//Route::post('/add/submit', [DealController::class, 'submit'])->name('getdeal');

// Route::get('/user', function (Request $req) {
//   $acs = new clients;
//   $ads = new board;
//   return view('user',['accs'=>$acs->Where('id','=',$req->session()->get('realtor'))->get()],['adds'=>$ads->Where('realtor','=',$req->session()->get('realtor'))->paginate(10)]);
// });

Route::post('/user', function (Request $req) {

$properyid = $req->input('binde');
$req->session()->put('property', $properyid);

return redirect('add');

})->name('clickee');

Route::get('/realtpanel', function (Request $req) {

if ($req->session()->get('userlogin')=='admin')
{
  $archive = new archives;
  return view('realtpanel',['archiv'=>$archive->orderby('id')->paginate(10)]);
}
else
{
  return redirect('account');
}
});

Route::get('/realtcont', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $cont = new contracts;
  return view('realtcont',['contracts'=>$cont->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/realtcont/getdeal/{id}', [ArchiveController::class, 'submit'])->name('agreedeal');

Route::get('/realtcont/rolldeal/{id}', [ArchiveController::class, 'cancel'])->name('disagreedeal');


Route::get('/realtbuy', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $buyed = new board;
  return view('realtbuy',['boardbuy'=>$buyed->Where('service','=','2')->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/realtrent', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $rented = new board;
  return view('realtrent',['boardrent'=>$rented->Where('service','=','1')->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/realtuser', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $user = new clients;
  return view('realtuser',['users'=>$user->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/realtuserbaned/{id}', [ArchiveController::class, 'ban'])->name('baned');

Route::get('/realtdistr', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $dist = new districts;
  return view('realtdistricts',['contracts'=>$dist->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/realtserv', function (Request $req) {

  if ($req->session()->get('userlogin')=='admin')
  {
  $serv = new services;
  return view('realtservices',['contracts'=>$serv->orderby('id')->paginate(10)]);
  }
  else
  {
  return redirect('account');
  }
});

Route::get('/calc', function () {

  return view('calc');
});

Route::get('/htmleditor', function () {

  return view('editor');
});

//REST API
Route::get('/vhod', [RestApi::class, 'vhod']);

Route::get('/pokupka', [RestApi::class, 'pokupka']);

Route::get('/arenda', [RestApi::class, 'arenda']);

Route::get('/newpokupka', [RestApi::class, 'newpokupka']);

Route::get('/objvlenie', [RestApi::class, 'objvlenie']);

Route::get('/prodavec', [RestApi::class, 'prodavec']);

Route::get('/moiobj', [RestApi::class, 'moiobj']);

Route::get('/moipokupki', [RestApi::class, 'moipokupki']);

Route::get('/moiprodagi', [RestApi::class, 'moiprodagi']);
