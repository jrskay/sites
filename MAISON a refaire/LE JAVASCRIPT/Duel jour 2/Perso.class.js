var Perso = function (name, hp, attack, defense, magie) {

    this.name = name;
    this.hp =  hp;
    this.attack = attack;
		this.defense = defense;
		this.magie = magie;

}

Perso.prototype.attaque = function (perso) {
	var degat =  this.attack - perso.defense;
	console.log(this.name +' , il enlève '+ degat + ' hp a  ' + perso.name);
	perso.hp -= degat;
	console.log(perso.name +' a  '+ perso.hp+ ' hp' );
}

Perso.prototype.sort = function(perso) {

	if (this.magie > 0) {
    	var degat = getRandomInteger(1, this.magie);
        console.log(this.name +  ' jete un sort,il enlève '+ degat + ' hp a '+ perso.name);
        perso.hp -= degat;
		this.magie -=  degat;
    	console.log(perso.name +' a  '+ perso.hp+ ' hp' );
    } else {
    	console.log('Vous n avez plus de point de magie....')
    }

}

Perso.prototype.defendre = function() {
	var ratio =  Math.round(this.defense * Math.random());
	this.defense += ratio;
    console.log(this.name+' augmente sa defense de '+ ratio + ' point ');
    console.log(this.name +'a une defense à :'+ this.defense);

}
