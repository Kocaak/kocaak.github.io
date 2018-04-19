/*

GIRDI VERILERI     GIZLI NODELAR        ÇIKTI VERİLERİ
R    O  ------------  O
                                            O = SIYAH
G    O  -----------   O                                   HER BİR NODE DİĞERİYLE İLİŞKİLİ VE BÜYÜK OLAN ÇIKTI SONUÇ OLARAK
                                            O = BEYAZ     KABUL EDİLECEK. ŞEMATİZE EDEMEDİM AMA SİZ ANLADINIZ (:
B    0  -----------   O
*/

//neden var yerine let kullandım : https://stackoverflow.com/questions/762011/whats-the-difference-between-using-let-and-var-to-declare-a-variable-in-jav

//renk kodları
let r,g,b;
let beyin;
//default beyaz atadım
let hangisi = "beyaz";

function renkSec(){
  r = random(255);
  g = random(255);
  b = random(255);
  //setup fonksiyonunda loop yapma özelliğini kaldırdığımızdan tekrar çizdiriyorum
  redraw();
}

function setup() {
  createCanvas(600,400);
  noLoop();

  //3 girdi 3 gizli node 2 çıktı
  beyin = new NeuralNetwork(3,3,2);

  //eğitim döngüsü
  for (let i = 0; i < 20000; i++) {
    //her döngüde rastgele yeni renk üretiyor
    let r = random(255);
    let g = random(255);
    let b = random(255);
    //renk eğitiminden dönen en iyi seçimi tutuyoruz
    let hedefler = renkEgitimi(r,g,b);
    let girdiler = [r/255,g/255,b/255];

    //eğitim fonksiyonuna gönderiyoruz
    beyin.train(girdiler,hedefler);
  }

  //eğitim bittikten sonra yeniden arkaplanı değiştirip kullanıcıya sunuyoruz
  renkSec();
}

function draw() {
  //arkaplan
  background(r,g,b);
  //ortadaki çizgi
  strokeWeight(4);
  stroke(0);
  line(width/2,0,width/2,height);

  //ekrandaki siyah beyaz yazıları
  textSize(64);
  noStroke();
  fill(0);
  textAlign(CENTER,CENTER);
  text("siyah",125,200);
  fill(255);
  text("beyaz",425,200);

  //test verimizin sonucunu alıyoruz
  hangisi = renkTahminEdici(r,g,b);

  //gelen yanıta göre noktamızı koyuyoruz
  if (hangisi === "beyaz") {
    fill(255);
    ellipse(425,300,60);
  }
  else {
    fill(0);
    ellipse(125,300,60);
  }

}

//test verisini bilgimize göre analiz ediyoruz
function renkTahminEdici() {
  let girdiler = [r/255, g/255, b/255];
  //tahmin ediyoruz
  let ciktilar = beyin.predict(girdiler);
  //console.log(ciktilar);

  //hangisi daha yüksek ihtimalse onu seçiyoruz
  if (ciktilar[0] > ciktilar[1]) {
    return "siyah";
  }
  else {
    return "beyaz";
  }

/*  if (r + g + b > 300) {
    return "siyah";
  }
  return "beyaz";*/
}

function renkEgitimi(r,g,b) {
  if (r + g + b > (255*3)/2) {
    return [1,0];
  }
  return [0,1];
}

//tıkladığımızda rengi değiştiriyoruz
function mousePressed() {
  /*let hedefler;
  if (mouseX > width/2) {
    hedefler = [0,1];
  }
  else {
    hedefler = [1,0];
  }
  let girdiler = [r/255, g/255, b/255];*/
  //beyin.train(girdiler,hedefler);

  renkSec();
}
