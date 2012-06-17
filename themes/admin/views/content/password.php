<body id="login">
	<div id="login_container">
		<div id="login_form">
			<p style="width: 520px;">
			<center>This content has been protected by a password. Please provide the password before proceeding.</center>
			<br />
			</p>
			<? echo CHtml::beginForm(); ?>

			<p style="width: 430px;">
				<? echo CHtml::PasswordField('password', '', array('id'=>'password', 'placeholder'=>'Password', 'class'=>'{validate: {required: true}}')); ?>
	      		</p>
	      		<? echo CHtml::hiddenField('id', $id); ?>
			<? echo CHtml::submitButton('Authenticate', array('class'=>'button blue', 'escape'=>false)); ?>

			<? echo CHtml::endForm(); ?>
  		</div>
	</div>
</body>
