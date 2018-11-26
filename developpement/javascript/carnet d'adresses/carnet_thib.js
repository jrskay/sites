var contacts = loadData();


function onClickAddContact()
{
	$('#contact-form').toggleClass('hide');

}


function onClickSaveContact() {

	var contact = {
    	civility: $('#title').val(), // document.getElementById('title').value;
        lastname: $('#lastName').val(), // document.getElementById('lastName').value;
        firstname: $('#firstName').val(),
    	phone: $('#phone').val()
    };

    contacts.push(contact);

    saveDataToDomStorage('addressBook', contacts);

}

function loadData() {

	var data = loadDataFromDomStorage('addressBook');

    if (data == null) {

    	return [];


    } else {

    	return data;

    }



}

 $('#add-contact').on('click', onClickAddContact);
 $('#save-contact').on('click', onClickSaveContact);
