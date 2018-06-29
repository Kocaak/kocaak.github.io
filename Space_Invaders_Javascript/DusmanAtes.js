function DusmanAtes(x,y) {
  this.x = x;
  this.y = y;
  this.r = 6;
  this.sil = false;


  this.goster = function() {
    noStroke();
    fill(255, 0, 0);
    ellipse(this.x, this.y,this.r*2,this.r*2);
  }

  this.yokol = function() {
    this.sil = true;
  }

  this.vur = function(uzayGemisi) {
    var mesafe = dist(this.x, this.y, uzayGemisi.merkez[0], uzayGemisi.merkez[1]);
    if (mesafe < this.r + uzayGemisi.r) {
      return true;
    }
    else {
      return false;
    }
  }

  this.hareket = function() {
    this.y = this.y+5;
  }
}
