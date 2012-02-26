<body id="login">
	<div id="login_container">
		<div id="login_form">
			
			<p style="width: 540px;"><center>Welcome to Ethreal. Please use the form below to login.</center></p>
			
			<? echo CHtml::beginForm(); ?>
			<p>
				<? echo CHtml::TextField('password', '', array('id'=>'email', 'placeholder'=>'Email', 'class'=>'{validate: {required: true}}')); ?>
	      		</p>
			<p>
				<? echo CHtml::PasswordField('password', '', array('id'=>'password', 'placeholder'=>'Password', 'class'=>'{validate: {required: true}}')); ?>
	      		</p>
			<? echo CHtml::submitButton('Login', array('class'=>'button blue', 'escape'=>false)); ?>

			<? echo CHtml::endForm(); ?>
  		</div>
	</div>
</body>
