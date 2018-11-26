var Slate = function(idDuDom, pen)
{
		this.canvas          = document.getElementById(idDuDom);
    this.context         = this.canvas.getContext('2d');
    this.currentLocation = {x: 0, y:0 };
    this.isDrawing       = false;
    this.stylo = pen;
		// bind c'est pour forcer la valeur de this dans la fonction exemple la il y aura écrit 4 dans le console log
    // this.canvas.addEventListener('mousemove', this.getMouseLocation.bind(4));
    this.canvas.addEventListener('mousemove', this.onMouseMove.bind(this));

		this.canvas.addEventListener('mousedown',  this.onMouseDown.bind(this));

		this.canvas.addEventListener('mouseup',    this.onMouseUp.bind(this));

		this.canvas.addEventListener('mouseleave', this.onMouseLeave.bind(this));

}


Slate.prototype.getMouseLocation = function(event)
{
	var location;
    var rectangle;
// getBoundingClientRect donne la position du canvas
    rectangle = this.canvas.getBoundingClientRect();
    location =
    {
    	x: event.clientX - rectangle.left,
    	y: event.clientY - rectangle.top
    }
    // console.log(location);
    return location;
};

Slate.prototype.onMouseMove = function(event)
{
	var location = this.getMouseLocation(event);
	if (this.isDrawing == true) {
	  this.context.beginPath();
		this.stylo.configure(this.context);
	  this.context.moveTo(this.currentLocation.x, this.currentLocation.y);
	  this.context.lineTo(location.x, location.y);
	  this.context.closePath();
	  this.context.stroke();
	  this.currentLocation = location;
		}
}

Slate.prototype.onMouseDown = function(event) {
	this.isDrawing = true;
	this.currentLocation = this.getMouseLocation(event);
}

Slate.prototype.onMouseLeave = function(){
	this.isDrawing = false;
};

Slate.prototype.onMouseUp = function(){
    this.isDrawing = false;
};
