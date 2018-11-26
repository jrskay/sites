'use strict';


var OrderForm = function()
{
	this.form          = $('#order-form');
    this.meal          = $('#meal');
    this.mealDetails   = $('#meal-details');
    this.orderSummary  = $('#order-summary');
    this.addMeal         = $('#order-form button');
    this.validateOrder = $('#validate-order');

    this.basketSession = new BasketSession();

}


OrderForm.prototype.onChangeMeal = function()
{
	var mealId = this.meal.val();
    console.log(mealId);

    console.log(getRequestUrl());

	$.getJSON
    (
        getRequestUrl() + '/meal?id=' + mealId, // URL vers un contrôleur PHP
        this.onAjaxChangeMeal.bind(this)        // Méthode appelée au retour de la réponse HTTP
    );
}


OrderForm.prototype.onAjaxChangeMeal = function(response)
{
	console.log(response);
    console.log(getWwwUrl());

	var imageUrl = getWwwUrl() + '/images/meals/' + response.Photo;

    $('#meal-details').children('p').text(response.Description);
    $('#meal-details').find('strong').text(response.SalePrice);
    $('#meal-details').children('img').attr('src', imageUrl);
    $('#order-form').find('input[name=salePrice]').val(response.SalePrice);
}


OrderForm.prototype.onSubmitForm = function(event) {
	event.preventDefault();

    var mealId = this.meal.val();  // $('#meal').val();
    var name =  this.meal.find('option:selected').text();
    var quantity = this.form.find('input[name=quantity]').val();
    var price =  this.form.find('input[name=salePrice]').val();

    this.basketSession.add(mealId, name, quantity, price);

}

OrderForm.prototype.onClickTrash = function(event) {
	event.preventDefault();
    var mealId = event.currentTarget.dataset.mealid;
	this.basketSession.remove(mealId);
}


OrderForm.prototype.run = function()
{

	this.onChangeMeal();
	this.meal.on('change', this.onChangeMeal.bind(this));
    $('#order-form button').on('click', this.onSubmitForm.bind(this) );
    $(document).on('click', '.button-cancel', this.onClickTrash.bind(this));


}
