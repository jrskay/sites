var Program = function(monPerso, computer){

	this.monPerso = monPerso;
	this.computer = computer;

  $('#attaquer').on('click', this.onClickAttack.bind(this));
  $('#sort').on('click', this.onClickSort.bind(this));
  $('#defendre').on('click', this.onClickDefend.bind(this));
  this.affichage();

}

Program.prototype.affichage = function() {
  if (this.monPerso.hp <= 0) {
      $('#perso1').text(this.computer.name + ' à gagné');
      $('#perso2').text('il reste '+this.computer.hp+' point de vie à '+ this.computer.name);
  } else if (this.computer.hp <= 0) {
          $('#perso1').text(this.monPerso.name + ' à gagné');
          $('#perso2').text('il reste '+this.monPerso.hp+' point de vie à '+ this.monPerso.name);
  } else {
    $('#perso1').text(this.monPerso.name+ ' : '+this.monPerso.hp +' HP');
    $('#perso2').text(this.computer.name+ ' : '+this.computer.hp +' HP');
  }
}

Program.prototype.onClickAttack = function(event) {
  event.preventDefault();
  if(this.monPerso.hp >= 0 && this.computer.hp >= 0){
    this.monPerso.attaque(this.computer);
    this.contre();
    this.affichage();
  }
}

Program.prototype.onClickSort = function(event) {
	event.preventDefault();
  if(this.monPerso.hp >= 0 && this.computer.hp >= 0){
    console.log(this);
  	this.monPerso.sort(this.computer);
    this.contre();
    this.affichage();
  }
}

Program.prototype.onClickDefend = function(event) {
	event.preventDefault();
  if(this.monPerso.hp >= 0 && this.computer.hp >= 0){
  	this.monPerso.defendre();
    this.contre();
    this.affichage();
  }
}


Program.prototype.contre = function(event) {
	var random = getRandomInteger(1, 3);

    if (random == 1) {

    	this.computer.attaque(this.monPerso);

    } else if (random == 2) {

    	this.computer.sort(this.monPerso);

    } else {

    	this.computer.defendre();
    }


}
