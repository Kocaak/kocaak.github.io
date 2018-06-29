function Ates(x,y) {
  this.x = x;
  this.y = y;
  this.r = 6;
  this.sil = false;


  this.goster = function() {
    noStroke();
    fill(150, 0, 255);
    ellipse(this.x, this.y,this.r*2,this.r*2);
  }

  this.yokol = function() {
    this.sil = true;
  }

  this.vur = function(dusman) {
    var mesafe = dist(this.x, this.y, dusman.x, dusman.y);
    if (mesafe < this.r + dusman.r) {
      return true;
    }
    else {
      return false;
    }
  }

  this.hareket = function() {
    this.y = this.y-5;
  }
}
