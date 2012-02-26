/* contact form */
$(document).ready(function(){
	var form = $("#contact");
	var email = $("#email");
	var password = $("#password");
	var password2 = $("#password2");
	var firstName = $("#firstName");
	var lastName = $("#lastName");
	var displayName = $("#displayName");
	
	email.blur(validateEmail);
	password.blur(validatePassword);
	password2.blur(validatePassword);
	var inputs = form.find(":input").filter(":not(:submit)").filter(":not(:checkbox)").filter(":not([type=hidden])").filter(":not([validate=false])");

	form.submit(function(){
		if(validateEmail() & validatePassword()){
			return true;
		}
		else{
			return false;
		}
	});
	
	function validateEmail(){
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/;
		if(filter.test(a)){
			email.animate({"border-color":"#e0e0e0"},200);
			email.animate({"background-color":"#fff"},200);
			return true;
		}
		else{
			email.animate({"border-color":"#ffbfbf"},200);
			email.animate({"background-color":"#ffe7e7"},200);
			return false;
		}
	}
		
});
/* end contact form */
