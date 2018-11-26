
var lettre = ['a','z','e','r','t','y','u','i','o','p','m','l','k','j','h','g','f','d','s','q','w','x','c','v','b','n', 'A','Z','E','R','T','Y','U','I','O','P','M','L','K','J','H','G','F','D','S','Q','W','X','C','V','B','N','1','2','3','4','5','6','7','8','9','0', '-', '_'];

var p = document.getElementById('p');
var f = document.getElementById('f');

var a = "jn,;sdè";
var b = [];

var mdp = "";
console.log(a);

for (var j = 0; j < a.length; j++) {
  b.push(a[j]);
}

var index = 0;
var coup = 0;

for (var i = 0; i < lettre.length; i++) {
  coup++;

  if(b[index] == lettre[i]) {
    mdp += lettre[i];
    console.log(lettre[i]);
    p.innerHTML += " lettre ajouter = <strong>"+mdp+"</strong><br><br>";
    console.log("lettre ajouter = "+mdp);
    i = -1;
    index++
  }

}

if(a.length == mdp.length){
  f.innerHTML = "le mdp est <strong>"+mdp+"</strong>, il à été trouver en <strong>"+coup+"</strong> essais.";
  console.log("le mdp est " + mdp);

} else {
  p.innerHTML = "Le programme n'a pas pu aboutir...";
}
