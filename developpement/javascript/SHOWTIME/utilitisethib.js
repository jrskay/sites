function dateUsToFrench(date) {

	var month = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	var tabdate = date.split('-');
  // month[tabdate[1]-1] car il y a l'index 0
	var newDate = tabdate[2]+' '+month[tabdate[1]-1]+' '+tabdate[0];

	return newDate;
}
dateUsToFrench('2018-10-03');

function extractUrlParams () {

	var t = location.search.substring(1).split('&');

	var f = [];
	for (var i=0; i<t.length; i++) {
	var x = t[ i ].split('=');

	f[x[0]]=x[1];
	}
	return f;
}

function haveDateNextDay(date, day) {
	date.setDate(date.getDate() + day);
	return date;
}

'2018-10-11T14:00'

function splitSeance(string) {
	var hours = string.split('T');
    var day = hours[0];
	var resultHours = hours[1].split(':');
	var result = { day: day, hour: resultHours[0]+':'+resultHours[1] };
    return result;
}
