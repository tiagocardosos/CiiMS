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
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>
        
        
        <div class="column">
        
        <? echo $versions; ?>
        <?php if (!$model->isNewRecord)
        	echo $form->hiddenField($model, 'id'); 
        	echo $form->hiddenField($model, 'vid'); 
        	echo $form->hiddenField($model, 'parent_id', array('value'=>1)); 
        	echo $form->hiddenField($model, 'author_id', array('value'=>Yii::app()->user->id)); 
        	echo $form->hiddenField($model, 'comment_count'); 
        ?>
        <p><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Title')); ?></p>
        <p><?php echo $form->dropDownList($model,'category_id', CHtml::listData(Categories::model()->findAll(array('order' => 'name')),'id','name'));?></p>
        <p><? echo $form->textArea($model, 'content', array('placeholder'=>'Content')); ?></p>
        <p id="extract" style="display:none;"><? echo $form->textArea($model, 'extract', array('placeholder'=>'Extract')); ?></p>
        
        <p><?php echo $form->dropDownList($model,'status', array(1=>'Publish', 0=>'Save as Draft'));?></p>
        <p><?php echo $form->dropDownList($model,'commentable', array(1=>'Allow Comments', 0=>'Disable Comments'));?></p>
        <p><?php echo $form->dropDownList($model,'type_id', array(2=>'Blog Post', 1=>'Static Page'));?></p>
        
        <p><?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Slug (Optional)')); ?></p>
        <p><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Password (Leave Blank for none)')); ?></p>
        </div>

        <div class="clear"></div>
        
        <div class="action_bar">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'blue button')); ?>
          <?php echo CHtml::link('Show Extract', '#', array('id'=>'show-extract', 'class'=>'button')); ?>
          <a href="#modal" class="button">Cancel</a>
        </div>
        
      <?php $this->endWidget(); ?>
      
    </div>
  </div>
</div>

<script>
$("#show-extract").click(function() { $("#extract").toggle(); });
</script>

