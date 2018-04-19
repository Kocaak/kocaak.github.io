function Populasyon() {
  this.roketler = [];
  this.popBuyukluk = 100;
  this.havuz = [];

  for (var i = 0; i < this.popBuyukluk; i++) {
    this.roketler[i] = new Roket();
  }

  this.degerlendir = function() {

    var maxUygun = 0;
    for (var i = 0; i < this.popBuyukluk; i++) {
      this.roketler[i].UygunlukOlc();
      if (this.roketler[i].uygunluk > maxUygun) {
        maxUygun = this.roketler[i].uygunluk;
      }
    }

    createP(maxUygun);

    //normalizasyon
    for (var i = 0; i < this.popBuyukluk; i++) {
      this.roketler[i].uygunluk /= maxUygun;
    }

    this.havuz = [];
    //normalize edilmiş (0-1 arası) uygunluk değerini 100le çarpıp değerine göre
    //tekrar üretiliyor. örneğin 1 ise 100 adet 0.3 ise 30 adet gibi
    for (var i = 0; i < this.popBuyukluk; i++) {
      var n = this.roketler[i].uygunluk * 100;
      for (var j = 0; j < n; j++) {
        this.havuz.push(this.roketler[i]);
      }
    }
  }

  this.secilim = function () {
    var yeniRoketler = [];
    for (var i = 0; i < this.roketler.length; i++) {
      var ebeveynA = random(this.havuz).dna;
      var ebeveynB = random(this.havuz).dna;
      var cocuk = ebeveynA.caprazlama(ebeveynB);
      cocuk.mutasyon();
      yeniRoketler[i] = new Roket(cocuk);
    }
    this.roketler = yeniRoketler;
  }

  this.buyu =  function() {
    for (var i = 0; i < this.popBuyukluk; i++) {
      this.roketler[i].guncelle();
      this.roketler[i].goster();
    }
  }
}
