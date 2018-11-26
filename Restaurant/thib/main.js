if( window.location.href.indexOf("/order/validate") == -1) {
	console.log('order');

	var orderForm = new OrderForm();

	orderForm.run();
} else {
	console.log('validate')
	var validate = new ValidateBasket();
}
