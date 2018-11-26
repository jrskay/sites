
var Fighter =  function(name, hp, attaque, defense, magie){

	this.name = name,
	this.hp = hp,
	this.attaque = attaque,
	this.defense = defense,
  this.magie = magie

}

// attaque
Fighter.prototype.kick = function() {
	console.log(this.name+' Shoryuken !!!');
	this.hp -= 2;
}

Fighter.prototype.punch = function() {
	console.log(this.name+' Detroit smash !!!');
	this.hp -= 3;
}


// defense
Fighter.prototype.protecHigh = function() {
	console.log(this.name+' Tekkai !!!');
	this.hp -= 4;
}


// magie
Fighter.prototype.kamehameha = function() {
	console.log(this.name+' Genkidama !!!');
	this.hp -= 4;
}

Fighter.prototype.bouclier = function() {
	console.log(this.name+' Full Chacra !!!');
	this.hp -= 4;
}


Perso.prototype.tomber = function() {
	console.log(this.name+' est tombé mais n\'a rien senti');
	this.hp -= 2;
}

Perso.prototype.attaquer = function(obj) {
	console.log(this.name+' pête un plomb et attaque '+obj.name);

	var random = Math.random();
	console.log(random);

	if(random < 0.5) {
		console.log('Belle droite de bourré');
		obj.hp -= this.attaque;
		console.log(obj.name+ ' a '+obj.hp+ ' hp');
	} else {
		this.tomber();
	}

	console.log(this.name+' s\'excuse en pleurant');
}

switch (random) {
  case random <0.33:

    break;
  default:

}
