// En natif
var coucou = document.querySelectorAll('.coucou');

for (var i = 0; i < coucou.length; i++){
	coucou[i].addEventListener('click', sayPara);
}

function sayPara(){
	console.log(this.textContent);
}

// En jsquery
// $('.coucou').on('click', sayPara);
//
// function sayPara() {
// 	console.log($(this).text());
// }
