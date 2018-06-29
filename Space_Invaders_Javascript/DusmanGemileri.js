function DusmanGemileri(x,y) {
  this.x = x;
  this.y = y;
  this.r = 25;
  //this.r = 50;

  this.xyon = 1;

  this.img = loadImage("http://i.hizliresim.com/8Y79PA.png");
  //this.img = loadImage("http://i.hizliresim.com/vjvjaz.jpg");

  this.sil = false;

  /*this.buyu = function() {
    this.x = this.x-1;
    this.y = this.y-1;
    this.r = this.r+1;
  }*/

  

  this.asagiHareket = function() {
    this.xyon *= -1;
    this.y += this.r;
  }

  this.hareket = function() {
    this.x = this.x+this.xyon;
  }

  this.yokol = function() {
    this.sil = true;
  }

  this.goster = function() {
    image(this.img, this.x, this.y,this.r*2,this.r*2);
    //fill(34, 188, 0);
    //rectMode(CENTER);
    //ellipse(this.x, this.y,50,50)
  }
}
