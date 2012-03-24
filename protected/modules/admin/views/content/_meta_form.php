<div class="box">
  <div class="box-header">
    <h1><? echo $model->isNewRecord ? 'Create' : 'Update' . ' Meta Data'; ?></h1>
    
    <ul>
      <li class="active"><a href="#one"><? echo $model->isNewRecord ? 'Create' : 'Update'; ?></a></li>
    </ul>
  </div>
  
  <div class="box-content">
    <div class="tab-content" id="one" style="display: block; ">
      
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>
        
        
        <div class="column">
	<?php echo $form->hiddenField($model, 'content_id', array('value'=>isset($id) ? $id : '')); ?>
        <p><?php echo $form->textField($model,'key',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Key')); ?></p>
 	<p><?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>2550, 'placeholder'=>'Value')); ?></p>
        </div>

        <div class="clear"></div>
        
        <div class="action_bar">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'blue button')); ?>
          <a href="#modal" class="button">Cancel</a>
        </div>
        
      <?php $this->endWidget(); ?>
      
    </div>
  </div>
</div>
