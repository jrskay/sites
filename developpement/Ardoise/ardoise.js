var canvas = document.getElementById("canvas");
var context = canvas.getContext('2d');


// context.beginPath();
// context.strokeStyle='red';
// context.moveTo(20,100);
// context.lineTo(200,10);
// context.lineTo(200,100);
// context.lineTo(20,100);
// context.stroke();
//
// context.beginPath();
// context.strokeStyle='blue';
// context.arc(500, 600, 90, 0, 2 * Math.PI);
// context.stroke();
//
// context.beginPath();
// context.lineWidth=2;
// context.strokeStyle='green';
// context.arc(100, 200, 90, 0, 2 * Math.PI);
// context.stroke();
var Trait =  function(name, hp, db, attaque, biere){

  context.beginPath();
  context.strokeStyle='red';
  context.moveTo(20,100);
  context.lineTo(200,10);
  context.stroke();
}

var ChooseColor = function () {
  $('color')

  switch (color) {
    case 'black':
      context.strokeStyle='black';
      break;
    case 'brown':
      context.strokeStyle='brown';
      break;
    case 'red':
      context.strokeStyle='red';
      break;
    case 'yellow':
      context.strokeStyle='yellow';
      break;
    default:
    case 'green':
      context.strokeStyle='green';
      break;
    case 'blue':
      context.strokeStyle='blue';
      break;
  }

}
