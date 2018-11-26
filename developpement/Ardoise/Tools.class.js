var Tools = function(idDuDom) {

  this.pen = new Pen();
  this.slate = new Slate(idDuDom, this.pen);
  this.ColorPalette = new ColorPalette();
  this.clearButton = document.getElementById('tool-clear-canvas');
this.paletteButton = document.getElementById('tool-color-picker');
}

Tools.prototype.onClickColorPicker = function()
{
    $('#color-palette').removeClass('hide');
};


// on declare les evenements dans tools
Tools.prototype.start = function() {
  // au click sur pen-color qui est  dans le html on execute la fonction onClickChangeColor
//   en native JS
//   for(var i = 0; i < this.penColor.length; i++) {
//   this.penColor[i].addEventListener('click', this.onClickPenColor.bind(this) );
// }
  $('.pen-color').on('click', this.onClickChangeColor.bind(this));
  // au click sur pen-size qui est  dans le html on execute la fonction onClickChangeSize
    $('.pen-size').on('click', this.onClickChangeSize.bind(this));
//   en mode native Js
//   this.penColor = document.querySelectorAll('.pen-color');
//   this.penSize = document.querySelectorAll('.pen-size');
// this.clearButton = document.getElementById('tool-clear-canvas');
this.clearButton.addEventListener('click', this.clear.bind(this));

this.paletteButton.addEventListener('click', this.onClickColorPicker.bind(this));



}

Tools.prototype.onClickColorPicker = function()
{
    $('#color-palette').removeClass('hide');
};


Tools.prototype.onClickChangeColor = function(event) {
  // currentTarget La propriété currentTarget fait toujours référence à l'élément dont l'écouteur d'événements a déclenché l'événement, par opposition à la propriété target , qui renvoie l'élément qui a déclenché l'événement. en gros il se concentre sur l'évenement et non pas sur l'objet comme il y a plusieurs this sur l'objet.
  var change = event.currentTarget;
// dataset.colo car on a data-color dans le html
  var color = change.dataset.color;
  console.log(color);
  // c'est le this.pen de la ligne 3 et setColor de Pen_class_thib.js
  this.pen.setColor(color);
}

Tools.prototype.onClickChangeSize = function(event){
  var epaisseur = event.currentTarget;
  var size = epaisseur.dataset.size;
  this.pen.SetSize(size);
}

Tools.prototype.clear = function()
{
    this.slate.context.clearRect(0, 0, this.slate.canvas.width, this.slate.canvas.height);
}

Tools.prototype.onPickColor = function() {
	var color =  this.ColorPalette.getPickedColor();
	this.pen.setColorAsRgb(color.red, color.green, color.blue);
  $('#color-palette').addClass('hide');
}

// thib
// var Program = function(IdDuDom) {
// 	this.pen          = new Pen();
//     this.canvas       = new Slate(IdDuDom, this.pen);
//
// 	this.penColor = document.querySelectorAll('.pen-color');
//     this.penSize = document.querySelectorAll('.pen-size');
//
//
// }
//
// Program.prototype.start = function()
// {
// 	for(var i = 0; i < this.penColor.length; i++) {
// 		this.penColor[i].addEventListener('click', this.onClickPenColor.bind(this) );
// 	}
//     //$('.pen-color').on('click', this.onClickPenColor.bind(this));
//
//     for(var j = 0; j < this.penSize.length; j++) {
// 		this.penSize[j].addEventListener('click', this.onClickPenSize.bind(this) );
// 	}
//
// }
//
// Program.prototype.onClickPenSize = function(event)
// {
// 	var div = event.currentTarget;
//     var size = div.dataset.size;
//
//     this.pen.setSize(size);
//
// }
//
// Program.prototype.onClickPenColor = function() {
//
//     var div = event.currentTarget;
//     var color = div.dataset.color;
//     console.log(color);
//     this.pen.setColor(color);
//
// }
