function presscalc()
    {
      var c = document.getElementById('cena').value;
      var s = document.getElementById('start').value;
      var t = document.getElementById('term').value;
      var b = document.getElementById('bet').value;

      var monthbet = b/12/100;

      var firts =1+monthbet;
      var end = t*12;
      var commonbet = Math.pow(firts, end);
      var monthpay = c * monthbet * commonbet /(commonbet-1);

      var perpart = c * monthbet;
      var mainpart = monthpay - perpart;

      var overpay = monthpay * (t*12)-c;

      //alert(c+s+t+b);
      //document.getElementById('output').value = monthpay;
      alert("Платёж в месяц = "+monthpay+";Переплата = "+overpay);
    }

function test()
{
  alert("Test");
}
