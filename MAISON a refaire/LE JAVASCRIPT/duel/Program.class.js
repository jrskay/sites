var Program = function(){



  $('#attaquer').on('click', this.onClickAttaque.bind(this));
	$('#defendre').on('click', this.onClickDefense.bind(this));
	$('#sort').on('click', this.onClickSort.bind(this));


	this.affichage = function() {

	$('#perso1').text(this.gege.name+ ' : '+this.gege.hp+' HP');
	$('#perso2').text(this.nanard.name+ ' : '+this.nanard.hp+' HP');

    }
}

Program.prototype.onClickAttaque = function(event) {
	event.preventDefault();
	this.gege.attaquer(this.nanard);
	this.contre();
	this.affichage();
}

Program.prototype.onClickSort = function(event) {
	event.preventDefault();
	this.gege.sort(this.nanard);
	this.contre();
	this.affichage();
}


Program.prototype.onClickDefense = function(event) {
	event.preventDefault();
	this.gege.defendre();
	this.contre();
	this.affichage();
}


Program.prototype.contre = function(event) {
	var random = getRandomInteger(1, 3);

    if (random == 1) {
		this.nanard.attaquer(this.gege);
	} else if (random == 2) {
		this.nanard.sort(this.gege);
	} else {
		this.nanard.defendre();
	}

}
