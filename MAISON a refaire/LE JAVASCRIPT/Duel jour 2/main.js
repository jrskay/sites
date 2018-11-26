var jean = new Perso('Jean', 250, 30, 3, 50);
var alan = new Perso('Alan', 250, 60, 1, 10);
var max = new Perso('Max', 250, 15, 8, 90);
//
// console.log(alan);
//
// console.log(jean);
//
// console.log(max);

// jean.attaque(alan);
//
// max.attaque(jean);
//
// max.sort(alan);
//
// alan.defendre();

var fight = new Program(alan, max);

console.log(fight);
