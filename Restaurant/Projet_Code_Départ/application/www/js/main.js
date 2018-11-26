'use strict';


// pour éviter des petites erreurs on va trier les url ce window.location.href.indexOf("") est une fonction native de js
if( window.location.href.indexOf("/order") != -1 && window.location.href.indexOf("?orderId") == -1)
{
	console.log('order');

	var orderForm = new OrderForm();

	orderForm.run();
} else if (window.location.href.indexOf("/basket") != -1)
	{
	console.log('validate')
	var validate = new ValidateBasket();
	}
