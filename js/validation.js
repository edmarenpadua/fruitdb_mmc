window.onload = function(){
  search_form.submit.onclick = checkInput;
}

 
function checkInput(){
	msg="";
	str=search_form.s_input.value;
	if(str=="")
		msg = "Please enter a search keyword.";
	if(str.length < 3 && str.length > 0)
		msg = "Cannot search words with length less than 3.";
	if(str=="the" || str=="with")
		msg = "Cannot search articles.";
	document.getElementsByName('warning')[0].innerHTML=msg;
	if(str=="" || str.length < 3 && str.length > 0 || str=="the" || str=="with") return false;
	else return true;
}
