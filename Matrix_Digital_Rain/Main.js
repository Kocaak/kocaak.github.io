var letterSize = 16;
var animations = [];

function setup() {
  createCanvas(window.innerWidth,window.innerHeight);
  background(0, 150);
  var x = 0;
  var y = random(-1000, 0);
  for (var i = 0; i <= width/letterSize; i++) {
    var animation = new Animation();
    animation.generate(x, y);
    animations.push(animation);
    x += letterSize;
  }
  textSize(letterSize);
}

function draw() {
  background(0);
  animations.forEach(function(animation) {
    animation.render();
  });
}

function Letter(x, y, speed, first) {
  this.x = x;
  this.y = y;
  this.value;
  this.speed = speed;
  this.switchTime = round(random(1,20));
  this.first = first;

  this.setToRandomLetter = function() {
    if (frameCount % this.switchTime == 0) {
      this.value = String.fromCharCode(0x30A0 + round(random(0,96)));
    }
  }

  this.moveDown = function() {
    if(this.y >= height){
      this.y = 0;
    }
    else{
      this.y += this.speed;
    }
  }
}

function Animation() {
  this.letters =  [];
  this.totalLetters = round(random(10,25));
  this.speed = random(3,15);

  this.generate = function(x, y) {
    var first = round(random(0, 1));
    for (var i = 0; i <= this.totalLetters; i++) {
      letter = new Letter(x, y, this.speed, first);
      letter.setToRandomLetter();
      this.letters.push(letter);

      y-= letterSize;
      first = false;
    }
  }

  this.render = function() {
    var letterLength = this.letters.length;
    var i = 0;
    fill(180, 255, 180);
    for (i ; i < letterLength-6; i++) {
      text(this.letters[i].value, this.letters[i].x, this.letters[i].y);
      this.letters[i].moveDown();
      this.letters[i].setToRandomLetter();
      fill(0, 255, 70);
    }
    var alpha = 210;
    fill(0, 255, 70, alpha);
    for (i; i < letterLength; i++) {
      text(this.letters[i].value, this.letters[i].x, this.letters[i].y);
      this.letters[i].moveDown();
      this.letters[i].setToRandomLetter();
      alpha -= 40;
      fill(0, 255, 70, alpha);
    }
  }
}
