'use strict';

var BasketSession = function()
{
	this.items = null; // équivalent this.items = [];
  this.load();
};

BasketSession.prototype.add = function(mealId, name, quantity, salePrice)
{
  mealId    = parseInt(mealId);
  quantity  = parseInt(quantity);
  salePrice = parseFloat(salePrice);

  // pour éviter d'ajouter des lignes pour le meme id vos mieux additionner la Quantité et le prix pour le meme id donc on fait un boucle for
  for(var index = 0; index < this.items.length; index++)
  {

    if(this.items[index].mealId == mealId)
    {
        this.items[index].quantity += quantity;
        saveDataToDomStorage('panier', this.items);
        this.load();
        return;
    }
  }
  // on ajoute une ligne meal
  this.items.push(
  {
    mealId    : mealId,
    name      : name,
    quantity  : quantity,
    salePrice : salePrice
  });
  // on sauvegarde dans le localStorage
  saveDataToDomStorage('panier', this.items);
  // on fait la fonction load donc en gros on affiche
  this.load();
}

BasketSession.prototype.load = function()
{
	this.items = loadDataFromDomStorage('panier');
  // on demande si items est vide,
	if(this.items == null)
  {
    //si c'est le cas on met items en tableau vide car si on le laisse en valeur null ça va poser un problème lorsque l'on va faire un push dedans exemple ligne 27
    this.items = [];
  }

  var table = $('<table class="generic-table">');
	table.append('<tr><td class="number"><strong>Quantité</strong></td><td><strong>Produit</strong></td><td><strong>Prix Unitaire</strong></td><td><strong>Prix Total</strong></td></tr>');

	for (var i = 0; i < this.items.length; i++)
  {
    var tr = $('<tr>');
    tr.append('<td class="number">'+this.items[i].quantity+'</td><td><strong>'+this.items[i].name+'</strong></td><td class="number">'+this.items[i].salePrice.toFixed(2)+' €</td><td class="number">'+(this.items[i].salePrice*this.items[i].quantity).toFixed(2)+' €</td><td><button class="button button-cancel small" data-mealId="'+this.items[i].mealId+'"><i class="fa fa-trash"></i></button></td');

    table.append(tr);
  }

  $('#order-summary').html(table);
}


BasketSession.prototype.remove = function(mealId)
{
	for(var index = 0; index < this.items.length; index++)
    {
    	if(this.items[index].mealId == mealId)
        {
        	this.items.splice(index, 1);

            saveDataToDomStorage('panier', this.items);

            this.load();
        }
    }

}
