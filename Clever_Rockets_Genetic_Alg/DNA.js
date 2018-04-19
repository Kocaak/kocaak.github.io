function DNA(genler) {
  if (genler) {
    this.genler = genler;
  }
  else {
    this.genler = [];
    for (var i = 0; i < omur; i++) {
      this.genler[i] = p5.Vector.random2D();
      this.genler[i].setMag(maxKuvvet);
    }
  }

  this.kuvvetUygula = function(kuvvet) {
    this.ivme.add(kuvvet);
  }

  //
  this.caprazlama = function(partner) {
    var yenigenler = [];
    var orta = floor(random(this.genler.length));
    for (var i = 0; i < this.genler.length; i++) {
      if (i>orta) {
        yenigenler[i] = this.genler[i];
      }
      else {
        yenigenler[i] = partner.genler[i];
      }
    }
    return new DNA(yenigenler);
  }

  this.guncelle = function() {
    this.hiz.add(this.ivme);
    this.pozisyon.add(this.hiz);
    this.ivme.mult(0);
  }

  this.mutasyon = function () {
    for (var i = 0; i < this.genler.length; i++) {
      if (random(1) < 0.01) {
        this.genler[i] = p5.Vector.random2D();
        this.genler[i].setMag(maxKuvvet);
      }
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
