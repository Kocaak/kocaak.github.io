function Hesapla() {

  var tekKelime
  var sayilar = [];
  var gezinenHarfler = [];
  var tarih = new Date();
  var kullaniciAdSoyad = document.getElementById('sen').value
  var sevgiliAdSoyad  = document.getElementById('sevgili').value

  kullaniciAdSoyad = kullaniciAdSoyad.replace(/\s+/g, '');
  sevgiliAdSoyad = sevgiliAdSoyad.replace(/\s+/g, '');

  var gun = sayiDonder(tarih.getDate());
  var ay = ayIsimleri(tarih.getMonth());
  var yil = "ikibinonsekiz"

  tekKelime = kullaniciAdSoyad+"love"+sevgiliAdSoyad+gun+ay+yil
  tekKelime = tekKelime.toLocaleLowerCase();
  //alert(tekKelime);

  var kelimeUzunlugu = tekKelime.length
  for(var i = 0; i<kelimeUzunlugu; i++){
    var harf = tekKelime.charAt(i);
    if(gezinenHarfler.includes(harf) == false){
      gezinenHarfler.push(harf);
      var sayac = 1;
      var index = i+1;

      while(1 == 1){
        index = tekKelime.indexOf(harf,index);
        if(index == -1){
          break;
        }
        else{
          sayac++;
          index++;
        }
      }
      sayilar.push(sayac);
    }
   }
   console.log(sayilar.toString());

   while(sayilar.length > 2){
     var yenilenenSayilar = [];
     var sayiUzunlugu = sayilar.length;
     for(var i = 0; i<sayiUzunlugu/2-1; i++){
       var son = sayilar.pop();
       var ilk = sayilar.shift();
       var toplam = ilk + son;
       console.log("For'un"+ (i+1) +". Döngüsünde bu oldu =====" + son +"+" + ilk + "+" + "=" +toplam);
       if(toplam > 9){
         yenilenenSayilar.push(1);
         yenilenenSayilar.push(toplam%10);
       }
       else{
         yenilenenSayilar.push(toplam);
       }
     }
     if(sayilar.length == 1){
       yenilenenSayilar.push(sayilar.pop());
     }
     else{
       yenilenenSayilar.push(sayilar.pop()+sayilar.shift());
     }

     sayilar = yenilenenSayilar;
     console.log(sayilar.toString());
     console.log(sayilar.length);
   }
   //alert(sayilar.toString());
   var sonuc = "Aşk sonucunuz : " +sayilar.toString().replace(/\,/g,'');
   //alert(sonuc);
   document.getElementById("sonuc").innerHTML = sonuc;
}

function sayiDonder(sayi) {

  if(sayi<10){
    return birlerBasamagi();
  }
  else if(sayi<20){
    return "on" + birlerBasamagi(sayi%10);
  }
  else if(sayi<30){
    return "yirmi" + birlerBasamagi(sayi%10);
  }
  else if(sayi<40){
    return "otuz" + birlerBasamagi(sayi%10);
  }
  else{
    return "PROGRAMIBOZDUN"
  }
}

function ayIsimleri(sayi){

  switch (sayi) {
    case 0:
        return "ocak";
        break;
    case 1:
        return "şubat";
        break;
    case 2:
        return "mart";
        break;
    case 3:
        return "nisan";
        break;
    case 4:
        return "mayıs";
        break;
    case 5:
        return "haziran";
        break;
    case 6:
        return "temmuz";
        break;
    case 7:
        return "ağustos";
        break;
    case 8:
        return "eylül";
        break;
    case 9:
        return "ekim";
        break;
    case 10:
        return "kasım";
        break;
    case 11:
        return "aralık";
        break;
      }

}

function birlerBasamagi(sayi) {

  switch (sayi) {
    case 0:
        return "sıfır";
        break;
    case 1:
        return "bir";
        break;
    case 2:
        return "iki";
        break;
    case 3:
        return "üç";
        break;
    case 4:
        return "dört";
        break;
    case 5:
        return "beş";
        break;
    case 6:
        return "altı";
        break;
    case 7:
        return "yedi";
        break;
    case 8:
        return "sekiz";
        break;
    case 9:
        return "dokuz";
        break;
      }
}
