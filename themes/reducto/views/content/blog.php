<h1><? echo $data->title; ?></h1>
<div class="horizontal-rule"></div>
<div class="blog-data">
	<? echo $data->created == $data->updated ? 'Posted' : 'Updated'; ?>
	<span class="black"><? echo date('F jS, Y @ H:i', strtotime($data->created)); ?></span>
	by <span class="black"><? echo CHtml::link($data->author->displayName, Yii::app()->createUrl('/portfolio'), array('rel'=>'author')); ?></span>
	in <? echo CHtml::link($data->category->name, Yii::app()->createUrl($data->category->slug)); ?> - 
	<? if ($data->commentable): ?>
		<? echo CHtml::link("<span class=\"black\">{$data->comment_count}</span> Comments", '#comments', array('escape'=>true)); ?>
	<? endif; ?>
</div>
<div class="horizontal-rule"></div>
<? if (isset($meta['blog-image'])): ?>
	<p><? echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
<? endif; ?>
<div class="clear"></div>
<div class="content">
	<? $md = new CMarkdownParser; echo $md->safeTransform($data->content); ?>
</div>


<!-- TODO: // Post Hook Expression -->

<!-- TODO: // Comments -->
<div class="thirty-margin-filler"></div>
<div class="horizontal-rule"></div>
<div class="thirty-margin-filler"></div>

<? if ($data->commentable): ?>
<h3><? echo Yii::t('comments', 'n==0#No Comments|n==1#{n} Comment|n>1#{n} Comments', count($comments)); ?>: </h3>
<? echo CHtml::link(NULL, NULL, array('name'=>'comments')); ?>
<div class="horizontal-rule"></div>
<div class="thirty-margin-filler"></div>
	<? $count = 0; ?>
	<? foreach ($comments as $comment): ?>	
		<? if (!$comment->approved): ?>
			<? continue; ?>
		<? endif; ?>
		<? $count++; ?>
		
		<div id="comment-<? echo $comment->id; ?>">
			<? echo CHtml::image('https://gravatar.com/avatar/' . md5(Users::model()->findByPk($comment->user_id)->email), NULL, array('class'=>'avatar')); ?>
			<p class="comment-post red-block">
				By: <? echo Users::model()->findByPk($comment->user_id)->displayName; ?>
				on <? echo date('F jS, Y @ H:i', strtotime($comment->created)); ?>
			</p>
			<p class="<? echo $count%2 == 0 ? 'green' : 'blue'; ?>-block comment-post" style="margin-top: 7px"><? echo $comment->comment; ?></p>
			<div style="float:right;">
				<? if (isset(Yii::app()->user->role) && Yii::app()->user->role == 5): ?>
					<? echo CHtml::link('Delete', NULL, array('id'=>'delete', 'value'=>$comment->id, 'class'=>'small button', 'style'=>'margin-left: 5px;')); ?>
				<? endif; ?>
				
				
				<? if (!Yii::app()->user->isGuest): ?>
					<? echo CHtml::link('Flag', NULL, array('id'=>'flag', 'value'=>$comment->id, 'class'=>'small button', 'style'=>'margin-left: 5px;')); ?>		
					<? echo CHtml::link('Reply', '#reply', array('class'=>'small button', 'style'=>'margin-left: 5px;')); ?>
				<? endif; ?>
			</div>
		</div>
		<div class="thirty-margin-filler"></div>
		<div class="horizontal-rule"></div>
	<? endforeach; ?>
	<div id="new-comment" style="display:none;"></div>
	<? echo CHtml::link(NULL, NULL, array('name'=>'reply')); ?>
	<? if (Yii::app()->user->isGuest): ?>
		<p>Only registered users to can leave comments. Please <? echo CHtml::link('login', Yii::app()->createUrl('/login')); ?> to leave a comment.</p>
	<? else: ?>
		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'reply',
				'focus'=>array($model,'comment'),
				'enableAjaxValidation'=>false,
				'errorMessageCssClass'=>'alertBox-alert',
			)); ?>
			<? echo $form->error($model,'comment'); ?>
			<? echo $form->hiddenField($model, 'content_id', array('value'=>$data->id)); ?>	
			<? echo CHtml::hiddenField('count', NULL, array('value'=>$count)); ?>	
			<? echo $form->textArea($model, 'comment', array('id'=>'comment', 'placeholder'=>'Type your comment here')); ?>
	
			<? echo CHtml::submitButton('Comment', array('class'=>'small button', 'style'=>'float:right;')); ?>
		<?php $this->endWidget(); ?>
	<? endif; ?>
	<? Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/' . Yii::app()->theme->name .'/commentform.js'); ?>
<? endif; ?>
