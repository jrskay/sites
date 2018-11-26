var margin_left = 0;
var margin_top = 0;
var carre = document.querySelector('.carre');


function KeyBoardEvent(event){

  switch (event.keyCode) {
    case 37:
      margin_left -= 10;
      // carré c'est la classe dans le css puis style c'est le  css puis marginLeft c'est la propriété ou l'on va agir (en gros c'est le chemin pour arrivé là ou on veut agir) c'est égal margin_left + (-10px)
      carre.style.marginLeft = margin_left+'px';
      // si margin_left est en dessous de 0 margin_left reste a 0
      // c'est pour faire ne sorte de garder le carre dans la  page web
        if (margin_left < 0) {
          margin_left = 0;
        }
    break;

    case 39:
      margin_left += 10;
      // carré c'est la classe dans le css puis style c'est le  css puis marginLeft c'est la propriété ou l'on va agir (en gros c'est le chemin pour arrivé là ou on veut agir) c'est égal margin_left + (+10px)
      carre.style.marginLeft = margin_left+'px';
      // si margin_left est en dessus de 1180px margin_left reste a 1180px
      // c'est pour faire ne sorte de garder le carre dans la  page web
        if (margin_left > 1180) {
          margin_left = 1180;
      }
    break;

    case 38:
      margin_top -= 10;
      carre.style.marginTop = margin_top+'px';
      if (margin_top < 0) {
        margin_top = 0;
      }
    break;

    case 40:
      margin_top += 10;
      carre.style.marginTop = margin_top+'px';
    break;
    default:
  	console.log('pas d\'event associé à cette touche');
    break;

  }
}


document.addEventListener('keydown', KeyBoardEvent);


//  carre thib
// var square = document.getElementById("square");
// var top_margin = 0;
// var left_margin = 0;
// const ARROW_LEFT = 37;
// const ARROW_UP = 38;
// const ARROW_RIGHT = 39;
// const ARROW_DOWN = 40;
//
// function move(event)
// {
// 	switch(event.keyCode)
//   {
// 	case ARROW_LEFT :
//     	if(left_margin >= 10) {
//     		left_margin-=10;
//         	square.style.left = left_margin +"px";
//         }
//     break;
//
//     case ARROW_RIGHT :
//     	if(left_margin <= 240) {
// 			left_margin+=10;
// 			square.style.left = left_margin +"px";
// 		}
// 	break;
//     case ARROW_UP :
//     	if(top_margin >= 10) {
// 			top_margin-=10;
// 			square.style.top = top_margin +"px";
// 		}
// 		break;
//      case ARROW_DOWN :
//     	if(top_margin <= 240) {
// 			top_margin+=10;
// 			square.style.top = top_margin +"px";
// 		}
//
//    	break;
//
//
//  }
// }
//
//
// document.addEventListener("keydown",move)
