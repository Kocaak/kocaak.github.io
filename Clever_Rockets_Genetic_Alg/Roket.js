function Roket(dna) {
  this.pozisyon = createVector(width/2,height);
  this.hiz = createVector();
  this.ivme = createVector();
  this.vurdumu = false;
  this.carptimi = false;

  if (dna) {
    this.dna = dna;
  }
  else {
    this.dna = new DNA();
  }

  this.uygunluk = 0;

  this.kuvvetUygula = function(kuvvet) {
    this.ivme.add(kuvvet);
  }

  this.UygunlukOlc = function() {
    let uzaklik = dist(this.pozisyon.x, this.pozisyon.y, hedef.x, hedef.y);

    //ne kadar uzaksa o kadar kötü 1 ise 1 100 ise 0.01
    this.uygunluk = map(uzaklik, 0, width, width, 0);
    if (this.vurdumu) {
      this.uygunluk *=10;
    }
    if (this.carptimi) {
      this.uygunluk /= 10;
    }
  }

  this.guncelle = function() {
    var uzaklik = dist(this.pozisyon.x, this.pozisyon.y, hedef.x, hedef.y);
    if (uzaklik < 10) {
      this.vurdumu = true;
      this.pozisyon = hedef.copy();

    }

    if (this.pozisyon.x > cisimx[0] && this.pozisyon.x < cisimx[0] + cisimgenis && this.pozisyon.y > cisimy[0] && this.pozisyon.y < cisimy[0] + cisimyuks) {
      this.carptimi = true;
    }
    if (this.pozisyon.x > cisimx[1] && this.pozisyon.x < cisimx[1] + cisimgenis && this.pozisyon.y > cisimy[1] && this.pozisyon.y < cisimy[1] + cisimyuks) {
      this.carptimi = true;
    }
    if (this.pozisyon.x > cisimx[2] && this.pozisyon.x < cisimx[2] + cisimgenis && this.pozisyon.y > cisimy[2] && this.pozisyon.y < cisimy[2] + cisimyuks) {
      this.carptimi = true;
    }

    if (this.pozisyon.x > width || this.pozisyon.x < 0) {
      this.carptimi = true;
    }

    if (this.pozisyon.y > height || this.pozisyon.y < 0) {
      this.carptimi = true;
    }


    this.kuvvetUygula(this.dna.genler[sayac]);
    if (!this.vurdumu && !this.carptimi) {
      this.hiz.add(this.ivme);
      this.pozisyon.add(this.hiz);
      this.ivme.mult(0);
      this.hiz.limit(4);
    }
  }

  this.goster = function() {
    push();
    noStroke();
    translate(this.pozisyon.x, this.pozisyon.y);
    rotate(this.hiz.heading());
    rectMode(CENTER);
    rect(0,0,20,5);
    pop();
  }
}
