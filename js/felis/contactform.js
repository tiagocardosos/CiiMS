/* contact form */
$(document).ready(function(){
	var form = $("#contact");
	var name = $("#name");
	var email = $("#email");
	var message = $("#message");
	
	name.blur(validateName);
	email.blur(validateEmail);
	message.blur(validateMessage);
	
	var inputs = form.find(":input").filter(":not(:submit)").filter(":not(:checkbox)").filter(":not([type=hidden])").filter(":not([validate=false])");

	form.submit(function(){
		if(validateName() & validateEmail() & validateMessage()){
			
			var $name = name.val();
			var $email = email.val();
			var $message = message.val();
			$.ajax({
				type: 'GET',
				url: "get_mail.php",
				data: form.serialize(),
				success: function(ajaxCevap) {
					$('#list').hide();
					$('#list').html(ajaxCevap);
					$('#list').fadeIn("normal");
					name.attr("value", "");
					email.attr("value", "");
					message.attr("value", "");
				}
			});

			return false;
		}else{
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

	function validateName(){
		if(!name.val()){
			name.animate({"border-color":"#ffbfbf"},200);
			name.animate({"background-color":"#ffe7e7"},200);
			return false;
		}
		else{
			name.animate({"border-color":"#e0e0e0"},200);
			name.animate({"background-color":"#fff"},200);
			return true;
		}
	}
	
	function validateMessage(){
		if(!message.val()){
			message.animate({"border-color":"#ffbfbf"},200);
			message.animate({"background-color":"#ffe7e7"},200);
			return false;
		}else{			
			message.animate({"border-color":"#e0e0e0"},200);
			message.animate({"background-color":"#fff"},200);
			return true;
		}
	}
		
});
/* end contact form */