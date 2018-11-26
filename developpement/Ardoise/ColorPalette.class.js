var ColorPalette = function()
{
    this.canvas      = document.getElementById('color-palette');    // Récupération du <canvas>
    this.context     = this.canvas.getContext('2d');
    this.pickedColor = { red: 0, green: 0, blue: 0 };

    this.canvas.addEventListener('click', this.onClick.bind(this));

    this.build();
}


ColorPalette.prototype.build = function()
{
    var gradient;

    gradient = this.context.createLinearGradient(0, 0, this.canvas.width, 0);

    // Dégradé rouge -> vert -> bleu horizontal.
    gradient.addColorStop(0,    'rgb(255,   0,   0)');
    gradient.addColorStop(0.15, 'rgb(255,   0, 255)');
    gradient.addColorStop(0.32, 'rgb(0,     0, 255)');
    gradient.addColorStop(0.49, 'rgb(0,   255, 255)');
    gradient.addColorStop(0.66, 'rgb(0,   255,   0)');
    gradient.addColorStop(0.83, 'rgb(255, 255,   0)');
    gradient.addColorStop(1,    'rgb(255,   0,   0)');

    this.context.fillStyle = gradient;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);


    gradient = this.context.createLinearGradient(0, 0, 0, this.canvas.height);

    // Dégradé blanc opaque -> transparent -> noir opaque vertical.
    gradient.addColorStop(0,   'rgba(255, 255, 255, 1)');
    gradient.addColorStop(0.5, 'rgba(255, 255, 255, 0)');
    gradient.addColorStop(0.5, 'rgba(0,     0,   0, 0)');
    gradient.addColorStop(1,   'rgba(0,     0,   0, 1)');

    this.context.fillStyle = gradient;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
};

ColorPalette.prototype.onClick = function(event)
{
	var rectangle = this.canvas.getBoundingClientRect();
    var x = event.clientX - rectangle.left;
    var y = event.clientY - rectangle.top;

    palette = this.context.getImageData(x, y, 1, 1);

    console.log(palette);
    this.pickedColor.red   = palette.data[0];
    this.pickedColor.green = palette.data[1];
    this.pickedColor.blue  = palette.data[2];

 /*
 * Déclenchement de l'évènement de l'application,
 * annonçant que l'utilisateur a sélectionné une nouvelle couleur.
 */
  $.event.trigger('magical-slate:pick-color');
  };

  ColorPalette.prototype.getPickedColor = function()
  {
      return this.pickedColor;
  };
