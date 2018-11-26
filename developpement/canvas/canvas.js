var canvas = document.getElementById("moncanevas");
var context = canvas.getContext('2d');


context.beginPath();
context.strokeStyle='red';
context.lineWidth = 5;
context.moveTo(20,100);
context.lineTo(200,10);
context.lineTo(600,150);
context.stroke();


context.beginPath();
context.lineWidth=2;
context.strokeStyle='green';
context.arc(100, 200, 90, 0, 2 * Math.PI);
context.stroke();


canvas.getBoundingClientRect() //donne la position de l'origine sur le site entier

event.clientX  // position X par rapport à tout le site
event.clientY	//
