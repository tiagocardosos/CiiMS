<div class="box">
  <div class="box-header">
    <h1><? echo $model->isNewRecord ? 'Create' : 'Update' . ' ' . get_class($model); ?></h1>
    
    <ul>
      <li class="active"><a href="#one"><? echo $model->isNewRecord ? 'Create' : 'Update'; ?></a></li>
    </ul>
  </div>
  
  <div class="box-content">
    <div class="tab-content" id="one" style="display: block; ">
      
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>
        
        <div class="column">
        <p><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Email')); ?></p>
        <p><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>64, 'placeholder'=>'Password', 'value'=>'')); ?></p>
        <p><?php echo $form->textField($model,'firstName',array('size'=>60,'maxlength'=>255, 'placeholder'=>'First Name')); ?></p>
        <p><?php echo $form->textField($model,'lastName',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Last Name')); ?></p>
        <p><?php echo $form->textField($model,'displayName',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Display Name')); ?></p>
        <p><?php echo $form->dropDownList($model,'user_role', CHtml::listData(UserRoles::model()->findAll(array('order' => 'name')),'id','name'));?></p>
        <p><?php echo $form->dropDownList($model,'status', array(0=>'Inactive', 1=>'Active'));?></p>
        </div>

        <div class="clear"></div>
        
        <div class="action_bar">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'blue button')); ?>
          <a href="#modal" class="modal button">Cancel</a>
        </div>
        
      <?php $this->endWidget(); ?>
      
    </div>
  </div>
</div>
