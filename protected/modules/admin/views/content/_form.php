<div class="box">
  <div class="box-header">
    <h1><? echo $model->isNewRecord ? 'Create' : 'Update' . ' ' . get_class($model); ?></h1>
    
    <ul>
      <li class="active"><a href="#one"><? echo $model->isNewRecord ? 'Create' : 'Update'; ?></a></li>
      <li><? echo CHtml::link('Preview', Yii::app()->createUrl('/admin/content/preview/' . $model->id), array('id'=>'preview-content')); ?></li>
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
        <p><? echo $form->textArea($model, 'content', array('placeholder'=>'Content', 'class'=>'wysiwyg')); ?></p>
        <p id="extract" style="display:none;"><? echo $form->textArea($model, 'extract', array('placeholder'=>'Extract', 'class'=>'wysiwyg')); ?></p>
        
        <p><?php echo $form->dropDownList($model,'status', array(1=>'Publish', 0=>'Save as Draft'));?></p>
        <p><?php echo $form->dropDownList($model,'commentable', array(1=>'Allow Comments', 0=>'Disable Comments'));?></p>
        <p><?php echo $form->dropDownList($model,'type_id', array(2=>'Blog Post', 1=>'Static Page'));?></p>
        
        <p><?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Slug (Optional)')); ?></p>
        <p><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Password (Leave Blank for none)')); ?></p>
        </div>

        <div class="clear"></div>
        
        <div class="action_bar">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'blue button')); ?>
          <?php echo CHtml::link('Extract', '#', array('id'=>'show-extract', 'class'=>'button')); ?>
          <a href="#modal" class="button">Cancel</a>
        </div>
        
      <?php $this->endWidget(); ?>
      
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
	$("#show-extract").click(function() { $("#extract").toggle();});
	$("#preview-content").click(function() { 
		// Save the Data
		$.ajax({
			type: 'POST',
			data: $('form').serialize(),
			url: '<? echo $model->id; ?>',
			success: function()
			{
				$(location).attr('href','../../preview/id/<? echo $model->id; ?>');
			}
		});
		return false; 
	});
	$('.wysiwyg').wysiwyg();
});
</script>

