'use strict';


var ValidateBasket = function()
{
	this.items = [];
	this.load();
};


ValidateBasket.prototype.load = function() {
	this.items = loadDataFromDomStorage('panier');

    if(this.items == null)
    {
    	wi
    }

	var orders = JSON.stringify(this.items);

    $('#totalOrder').val(orders);


	var total = 0;
    var tbody = $('<tbody>');


    for (var i = 0; i < this.items.length; i++) {
		total += (parseInt(this.items[i].quantity)*parseFloat(this.items[i].salePrice)) ;
		var tr = $('<tr>');
        tr.append('<td><em>'+this.items[i].name+'</em></td><td class="number">'+this.items[i].quantity+'</td><td class="number">'+this.items[i].salePrice+'</td><td class="number">'+(parseInt(this.items[i].quantity)*parseFloat(this.items[i].salePrice)).toFixed(2)+'</td>');
		tbody.append(tr);
	}

    var tva = total * 0.2;
    var tfoot = $('<tfoot>');
    tfoot.append('<tr><td></td><td></td><td>Total HT</td><td>'+total.toFixed(2)+' €</td></tr>');
    tfoot.append('<tr><td></td><td></td><td>TVA 20%</td><td>'+tva.toFixed(2)+' €</td></tr>');
	tfoot.append('<tr><td></td><td></td><td>Total TTC</td><td>'+(total + tva).toFixed(2)+' €</td></tr>');

	$('#recapTable').append(tfoot);
    $('#recapTable').append(tbody);



}
