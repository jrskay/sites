// 1ere methode
// var gege = new Perso();
//
// gege.boire();
//
// console.log(gege.hp);

// 2e methode
var gege = new Perso('Gégé',5, 120, 2, 1800);

console.log(gege.hp);

console.log(gege.biere);

gege.boire();

console.log(gege.hp);

console.log(gege.biere);

var bernard = new Perso('Bernard', 20, 95, 1, 2000);


console.log(bernard.hp);

bernard.tomber();

console.log(bernard.hp);

gege.attaquer(bernard);
