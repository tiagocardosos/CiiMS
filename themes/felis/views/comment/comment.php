<li>
	<? echo CHtml::link('','', array('name'=>'comment-' . $v->attributes['id'])); ?>
	<div class="post">
		<p>
			<span><strong><? echo CHtml::link($v->user->attributes['displayName'], '#'); ?></strong></span>
			<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/auth-arr.gif');?>
			<? echo date('F d, Y @ h:i a', time()); ?>
		</p>
		<p>
			<? echo strip_tags($v->attributes['comment'], '<p><a><b><strong><i><em><u>'); ?>
		</p>
		<a href="#comment-box" class="button reply"><span>Reply<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/repl.png');?></span></a>
	</div>
</li>
<li id="new-comment" style="display:none"></li>
