/* contact form */
$(document).ready(function(){
	var message = $("#comment");
	var form = $("#reply");
	
	message.blur(validateMessage);
	
	var inputs = form.find(":input").filter(":not(:submit)").filter(":not(:checkbox)").filter(":not([type=hidden])").filter(":not([validate=false])");

	form.submit(function()
	{
		if(validateMessage())
		{
			$.ajax({
				type: 'POST',
				url: 'comment/comment/',
				data: $("#reply").serialize(),
				success: function (data, textStatus, jqXHR)
				{
					$("#new-comment").replaceWith(data).slideDown(500);
				}
			});
		}
		else
		{
			return false;
		}
		return false;
	});

	
	function validateMessage()
	{
		if(!message.val())
		{
			message.animate({"border-color":"#ffbfbf"},200);
			message.animate({"background-color":"#ffe7e7"},200);
			return false;
		}
		else
		{			
			message.animate({"border-color":"#e0e0e0"},200);
			message.animate({"background-color":"#fff"},200);
			return true;
		}
	}
		
});
/* end contact form */
