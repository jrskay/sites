
// pour selectionner un id
// var para1 = document.getElementById('para1');
// para1.style.color = "red";
// para1.style.backgroundColor = "green";

// pour selectionner une class
// var myPara = document.querySelector('.my-para');
// myPara.style.color = "blue";
// console.log(myPara);
// var myPara = document.querySelectorAll('.my-para');

var para1 = document.getElementById('para1');
var myPara = document.querySelectorAll('.my-para');
var para2 = document.getElementById('event');

console.log(myPara);


para1.style.color = "red";
para1.style.backgroundColor = "green";

for (var i = 0; i < myPara.length; i++) {
	myPara[i].style.color = "pink";
}
 // on a crée une classe blue dans le css pour pouvoir l'utiliser

 para1.classList.add('blue');
para1.classList.remove('useless');


// function myFunction() {
// 	para2.classList.add('blue');
// }
//  para2.addEventListener('click', myFunction);

 function myFunction() {
 	para2.classList.toggle('blue');
 }
  para2.addEventListener('click', myFunction);
