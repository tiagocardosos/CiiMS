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
<div id="new-comment" style="display:none;"></div>