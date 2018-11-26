function onClickExecute()
{
    var radioChoice;
    radioChoice = $('input[name=what]:checked').val();
    console.log(radioChoice);
    if (radioChoice == 1) {
    $.get('test_thib.php', ajaxGetHtmlArticle);
    } else if (radioChoice == 2) {
    	$.getJSON('test_json.php', ajaxGetJsonData);
      }


}
