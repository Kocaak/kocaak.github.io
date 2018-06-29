function UzayGemisi() {
  this.x = [width/2,width/2-20,width/2+20];
  this.y = [height-40,height,height];
  this.merkez = [width/2,height-20]
  this.r = 20;

  this.xyon = 0;

  this.goster = function() {
    fill(255);
    rectMode(CENTER);
    triangle(this.x[0], this.y[0], this.x[1], this.y[1], this.x[2], this.y[2]);
    //rect(this.x, height-20,20,60)
  }

  this.yonBelirle = function(yon) {
    this.xyon = yon;
  }

  this.hareket = function() {
    //hareket ettirdiğimiz de 3 köşenin x değeri de değişmeli
    if(this.xyon === -1 && this.x[1] > 0){
      this.x[0] += this.xyon*5;
      this.x[1] += this.xyon*5;
      this.x[2] += this.xyon*5;
    }
    else if(this.xyon === +1 && this.x[2] < width){
      this.x[0] += this.xyon*5;
      this.x[1] += this.xyon*5;
      this.x[2] += this.xyon*5;
    }
  }
}
