var ppl;
var omur = 400;
var omurP;
var sayac = 0;
var hedef;
var maxKuvvet = 0.4;

var cisimx = [50,350,200];
var cisimy = [200,200,400];
var cisimgenis = 200;
var cisimyuks = 10;

function setup() {
  createCanvas(600,600);
  ppl = new Populasyon();
  omurP = createP();
  hedef = createVector(width/2,50);
}

function draw() {
  background(0);
  ppl.buyu();
  omurP.html(sayac);

  sayac++;
  if(sayac == omur){
    ppl.degerlendir();
    ppl.secilim();
    //ppl = new Populasyon();
    sayac = 0;
  }
  fill(255);
  rect(cisimx[0],cisimy[0],cisimgenis,cisimyuks);
  rect(cisimx[1],cisimy[1],cisimgenis,cisimyuks);
  rect(cisimx[2],cisimy[2],cisimgenis,cisimyuks);

  ellipse(hedef.x,hedef.y,16,16);

}
