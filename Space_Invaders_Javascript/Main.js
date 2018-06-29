var uzayGemisi;
var dusmanSayisi = 14;
var dusmanlar = [];
var atesler = [];
var dusmanAtesler = [];
var skor = 0;
var win = true;

//Oyunun ana elementlerini setup ediyoruz
function setup() {
  createCanvas(900,500);
  //1 tane gemimiz var
  uzayGemisi = new UzayGemisi();
  //ama bir çok düşmanımız var!
  for (var i = 0; i < dusmanSayisi; i++) {
    dusmanlar[i] = new DusmanGemileri(i*60+30,20);
    //dusmanlar[i] = new DusmanGemileri(i*120+30,20);
  }

}

//Setup ettiklerimizi ekranda gösteriyoruz.
function draw() {
  background(20);

  textSize(18);
  fill(150);
  text('Skor : '+skor, 10, 20);
  textSize(18);
  fill(150);
  text('Düşmanın vurmasıyla ilgili bir bug var çözmeye çalışıyorum :)) ', 100, 20);

  uzayGemisi.goster();
  uzayGemisi.hareket();

  for (var i = 0; i < atesler.length; i++) {
    atesler[i].goster();
    atesler[i].hareket();

    for (var j = 0; j < dusmanlar.length; j++) {
      if (atesler[i].vur(dusmanlar[j])) {
        //Belki önce düşmanı vuruldukça büyütüp sonra yok edebilirim. hmmmmm
        //dusmanlar[j].buyu();
        dusmanlar[j].yokol();
        skor+=10;

        atesler[i].yokol();
        break;
      }
    }
  }

  for (var i = 0; i < dusmanAtesler.length; i++) {
    dusmanAtesler[i].goster();
    dusmanAtesler[i].hareket();

    if (dusmanAtesler[i].vur(uzayGemisi)) {
      oyunKaybedildi();
      break;
    }
  }

  if(dusmanlar.length == 0 && win == true) {
    oyunKazanildi();
  }

  var kose = false;

  for (var i = 0; i < dusmanlar.length; i++) {
    dusmanlar[i].goster();
    dusmanlar[i].hareket();
    //en sağdan daha sağa en soldan daha sola gitmemeliler
    if(dusmanlar[i].x+50 >= width || dusmanlar[i].x <= 0){
      kose = true;
    }

    if(Math.floor((Math.random() * 100) + 1) > 99){
      dusmanSaldiriFonksiyon(dusmanlar[i]);
    }
  }

  if(kose){
    for (var i = 0; i < dusmanlar.length; i++) {
      dusmanlar[i].asagiHareket();
    }
  }

  for (var j = atesler.length-1; j >= 0; j--) {
    if(atesler[j].sil == true){
      atesler.splice(j,1);
    }
  }

  //ateş düşmana değdiyse düşman objesini diziden çıkarıyoruz ve siliyoruz
  for (var j = dusmanlar.length-1; j >= 0; j--) {
    if(dusmanlar[j].sil == true){
      dusmanlar.splice(j,1);
    }
  }
}

function oyunKazanildi() {
  textSize(64);
  fill(150);
  text('OYUN KAZANILDI!', 0, 250);
}

function oyunKaybedildi() {
  win=false;

/*  for (var j = dusmanlar.length-1; j >= 0; j--) {
      dusmanlar.splice(j,1);
  }*/
  skor = 0;
  textSize(64);
  fill(150);
  text('OYUN KAYBEDİLDİ!', 0, 250);


  break;
}

function dusmanSaldiriFonksiyon(dusmanDegiskeni) {
  var dusmanAtesi = new DusmanAtes(dusmanDegiskeni.x+25 ,dusmanDegiskeni.y+40);
  dusmanAtesler.push(dusmanAtesi);
}

//Tuşa basma eventlerimiz
function keyPressed() {
  //Spacebar
  if(keyCode === 32){
    //uzay gemisinin olduğu x koordinatından ateş objesi üretilip diziye aktarılıyor
    var ates = new Ates(uzayGemisi.x[0],height-30);
    atesler.push(ates);
  }
  //uzay gemisinin hareket etme mantığı: basılan tuş uzay gemisinin gideceği yönü belirler ve o tuşa basılı kaldıkça hareket
  //fonksiyonu otomatik çağırılıyor.
  if (keyCode === RIGHT_ARROW) {
    uzayGemisi.yonBelirle(1);
  }
  else if (keyCode === LEFT_ARROW) {
    uzayGemisi.yonBelirle(-1);
  }

}

function keyReleased() {
  //hareket ederken ateş edebilmek için
  if(keyCode != 32){
    uzayGemisi.yonBelirle(0);
  }
}
