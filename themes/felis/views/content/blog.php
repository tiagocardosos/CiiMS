<div class="wrap720">
	<div class="posts">
		<div class="inner clearfix">
			<div class="inner-t">
				<div class="heading bott-15">
           				<h3><? echo $data->attributes['title']; ?></h3>
       				</div>
       				<? if (isset($meta['disp-image']['value'])): ?>
				    	<div class="proj-img bott-15">
						<? echo CHtml::link('', Yii::app()->createUrl($meta['disp-image']['value']), array('class'=>'prettyPhoto zoom')); ?>
						<? echo CHtml::image(Yii::app()->baseUrl . $meta['disp-image']['value']); ?>
					</div>
				<? endif; ?>
				<a href="#comments" class="col1-12 null">
					<span><? echo date('j', strtotime($data->attributes['created'])); ?></span>
					<span class="post-date"><? echo date('M', strtotime($data->attributes['created'])); ?></span>
					<span class="num-comm"><? echo $data->attributes['comment_count']; ?></span>
				</a>
				<div class="post">
					<p class="auth-cat">Posted in 
						<? echo CHtml::link($data->category->attributes['name'], Yii::app()->createUrl($data->category->attributes['slug'])); ?>
						<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/pencil.gif', '', array('class'=>'ml-10')); ?>
					</p>
				
		            		<? echo $data['content']; ?>
		            	</div>
		        </div>
		</div>

		<div class="shady bott-27"></div>
	</div>
	
	<!-- Start Comments -->	
	<? if ($data->attributes['commentable']): ?>
	<div class="inner-blank clearfix">
		<div class="heading">
			<h4 id="comment_count" value="<? echo $data['comment_count']; ?>"><? echo $data['comment_count']; ?> Response(s):</h4>
		</div>
		<ul class="comments-list">
			<? foreach ($comments as $k=>$v): ?>
				<? if ($v->attributes['approved']): ?>
				<li>
					<a class="avatar float-l">
						<? echo CHtml::image('https://gravatar.com/avatar/'.md5(strtolower(trim($v->author->attributes['email']))), '', array('class'=>'avatar avatar-60 photo', 'height'=>60, 'width'=>60));
; ?>
					</a>
					<? echo CHtml::link('','', array('name'=>'comment-' . $v->attributes['id'])); ?>
					<div class="post">
						<p>
							<span><strong><? echo CHtml::link($v->author->attributes['displayName'], '#'); ?></strong></span>
							<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/auth-arr.gif');?>
							<? echo date('F d, Y @ h:i a', strtotime($v->attributes['created'])); ?>
							<? if (!Yii::app()->user->isGuest && Yii::app()->user->role >= 4): ?>				
								<a id="delete" value="<? echo $v->attributes['id']; ?>" class="button" style="float:right;"><span>Delete<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/repl.png');?></span></a>
							<? endif; ?>
						</p>
						<p>
							<? echo strip_tags($v->attributes['comment'], '<p><a><b><strong><i><em><u>'); ?>
						</p>
						<a href="#comment-box" class="button reply"><span>Reply<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/repl.png');?></span></a>	
						<? if (!Yii::app()->user->isGuest): ?>				
							<a id="flag" value="<? echo $v->attributes['id']; ?>" class="button"><span>Flag Comment<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/repl.png');?></span></a>
						<? endif; ?>
					</div>
				</li>
				<? endif; ?>
				<!-- children-comm -->
			<? endforeach; ?>
			<li id="new-comment" style="display:none"></li>
		</ul>	
		<? echo CHtml::link('', '', array('name'=>'comment-box')); ?>
		
		<div class="divider"></div>
		<div class="heading bg-none">
			<h4>Leave a comment</h4>
		</div>
		<? if (Yii::app()->user->isGuest) { ?>
			<p>Only registered users to can leave comments. Please <? echo CHtml::link('login', Yii::app()->createUrl('/login')); ?> to leave a comment.</p>
		<? } else { ?>	
			<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'reply',
					'focus'=>array($model,'comment'),
					'enableAjaxValidation'=>true,
					'errorMessageCssClass'=>'alertBox-alert',
				)); ?>
				<?php echo $form->error($model,'comment'); ?>
				<? echo $form->hiddenField($model, 'content_id', array('class'=>'test', 'value'=>$id)); ?>	
				<? echo $form->TextArea($model, 'comment', array('id'=>'comment', 'class'=>'wysiwyg')); ?>

				        <div class="button float-r" style="margin-top: 0px;">
				            <? echo CHtml::submitButton('Comment'); ?>
				        </div>
			<?php $this->endWidget(); ?>
		<? } ?>
		
	</div>
	<? endif; ?>
</div>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/' . Yii::app()->theme->name .'/commentform.js');
			   //->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.wysiwyg/jquery.wysiwyg.js')
			   //->registerCssFile(Yii::app()->baseUrl . '/js/jquery.wysiwyg/jquery.wysiwyg.css');
			   //->registerScript('wysiwyg', "$('.wysiwyg').wysiwyg();", CClientScript::POS_READY)
			   //->registerCss('wysiwgy', 'div.wysiwyg { background-color: #F0F0F0; border 1px solid #656565; }'); ?>
