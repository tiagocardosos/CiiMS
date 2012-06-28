<?php $this->menu = array_merge($this->menu, array(
	array('label'=>'Manage Metadata', 'url'=>'')
)); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'vid',array('class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'parent_id',array('value'=>1, 'class'=>'span5')); ?>
	<?php echo $form->hiddenField($model,'author_id',array('value'=>Yii::app()->user->id, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'extract',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListRow($model,'status', array(1=>'Published', 0=>'Draft'), array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'commentable', array(1=>'Yes', 0=>'No'), array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'category_id', CHtml::listData(Categories::model()->findAll(), 'id', 'name'), array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'type_id', array(2=>'Blog Post', 1=>'Page;'),array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'password',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>150)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
