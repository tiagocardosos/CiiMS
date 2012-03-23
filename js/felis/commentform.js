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
	
	$("a#delete").click(function() { 
		$.ajax({
			type: 'POST',
			url: 'admin/comments/delete/id/' + $(this).attr('value')
		});
		$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Comment has been deleted',
				// (string | mandatory) the text inside the notification
				text: 'This comment has been deleted.',
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		$(this).parent().parent().parent().slideUp();
		return false;
	});
	
	$("a#flag").click(function() { 
		$.ajax({
			type: 'POST',
			url: 'comment/flag/id/' + $(this).attr('value')
		});
		
		$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Comment has been flagged',
				// (string | mandatory) the text inside the notification
				text: 'This comment has been flagged for review, and a moderator will review it shortly. Abuse of this feature will result in a ban according to our account terms of service.',
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: false,
				// (int | optional) the time you want it to be alive for before fading out
				time: ''
			});
		return false;
	});	
});
/* end contact form */
