var Perso = function(name, hp, attack, defense, magie) {

	this.name = name;
	this.hp = hp;
	this.attack = attack;
	this.defense = defense;
	this.magie = magie;


}


Perso.prototype.boire = function() {

	this.hp -= 5;

}

Perso.prototype.attaquer = function(persobj) {

	persobj.hp -= this.attack;

}



var gege = new Perso('Gege', 132, 25, 5, 125);

gege.boire();

var nanard = new Perso('Nanard', 132, 25, 5, 125);


nanard.attaquer(gege);



var Program = function(){
	this.gege = new Perso('Gégé', 200, 10, 7, 60);
	this.nanard = new Perso('Nanard', 180, 6, 4, 80);



	$('#attaquer').on('click', this.onClickAttaque.bind(this));
	$('#defendre').on('click', this.onClickDefense.bind(this));
	$('#sort').on('click', this.onClickSort.bind(this));




	this.affichage = function() {

		$('#perso1').text(this.gege.name+ ' : '+this.gege.hp+' HP');
		$('#perso2').text(this.nanard.name+ ' : '+this.nanard.hp+' HP');
	}



}
