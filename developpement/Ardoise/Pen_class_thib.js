// on déclare la fonction du stylo
var Pen = function()
{
// on instancie des valeurs a pen
    this.color = 'black';
    this.size  = 1;
};

// on configure le stylo on a besoin que de 	context.strokeStyle = this.color; context.lineWidth   = this.size; donc on met context en argument de la fonction
Pen.prototype.configure = function(context){
	context.strokeStyle = this.color;
  context.lineWidth   = this.size;
}

Pen.prototype.setColor = function (color){
  this.color= color;
}
Pen.prototype.SetSize = function(size){
  this.size = size;
}
Pen.prototype.setColorAsRgb = function(red, green, blue)
{
    this.color = 'rgb(' + red + ',' + green + ',' + blue + ')';
};
