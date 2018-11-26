
var Fighter =  function(name, hp, attaque, defense, magie){

	this.name = name,
	this.hp = hp,
	this.attaque = attaque,
	this.defense = defense,
  this.magie = magie

}

switch (battle) {
	case ((attaque == true) && (defense == true)):
		degats = -2;
		perso.hp = degats;
		break;
	case ((attaque == true) && (defense == false)):
		degats = this.attaque - Fighter.defense;
		perso.hp = degats;
		break;
	default:
			degats = 0;
}

// il faudra faire une condtion pour que attaque soit plus grand que defense comme ça dégat sera toujours positif
if (this.defense = true) {
	if (this.magie > 0) {
			var degats = getRandomInteger(1, this.magie);
		console.log(this.name +  ' jete un sort,il enlève '+ degats + ' hp a '+ perso.name);
}
// les attaques possible

Fighter.prototype.kick = function(Fighter) {
	var degats = this.attaque - Fighter.defense;
	console.log(this.name +' envoi un high-kick dans la gueule a '+ Fighter.name +', et il enlève '+ degats + ' de hp a '+ Fighter.name );
	Fighter.hp -= degats;
	console.log('Il reste '+ Fighter.hp +' de hp a '+ Fighter.name +' !!');
}

Fighter.prototype.punch = function(Fighter) {
	var degats = this.attaque - Fighter.defense;
	console.log(this.name +' envoi un crochet dans la gueule a '+ Fighter.name +', et il enlève '+ degats + ' de hp a '+ Fighter.name );
	Fighter.hp -= degats;
	console.log('Il reste '+ Fighter.hp +' de hp a '+ Fighter.name +' !!');
}

// la defense
Fighter.prototype.protect = function(Fighter) {
	var degats = this.attaque - Fighter.defense;
	console.log(this.name +' envoi un crochet dans la gueule a '+ Fighter.name +', et il enlève '+ degats + ' de hp a '+ Fighter.name );
	Fighter.hp -= degats;
	console.log('Il reste '+ Fighter.hp +' de hp a '+ Fighter.name +' !!');
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
