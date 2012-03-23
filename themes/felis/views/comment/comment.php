<li>
	<? echo CHtml::link('','', array('name'=>'comment-' . $v->attributes['id'])); ?>
	<a class="avatar float-l">
						<? echo CHtml::image('https://gravatar.com/avatar/'.md5(strtolower(trim($v->author->attributes['email']))), '', array('class'=>'avatar avatar-60 photo', 'height'=>60, 'width'=>60));
; ?>
					</a>
	<div class="post">
		<p>
			<span><strong><? echo CHtml::link($v->author->attributes['displayName'], '#'); ?></strong></span>
			<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/auth-arr.gif');?>
			<? echo date('F d, Y @ h:i a', time()); ?>
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
<li id="new-comment" style="display:none"></li>
