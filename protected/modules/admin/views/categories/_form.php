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
	'id'=>'categories-form',
	'enableAjaxValidation'=>false,
)); ?>
        
        <div class="column">
		<p><?php echo $form->dropDownList($model,'parent_id', CHtml::listData(Categories::model()->findAll(array('order' => 'name')),'id','name'));?></p>

		<p><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Category Name')); ?></p>
	
		<p><?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Slug')); ?></p>
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

