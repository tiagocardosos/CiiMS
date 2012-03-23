<?
	$this->pageTitle = Yii::app()->name . ' | Administration';
?>

<div class="box column-left">
	<div class="box-header">
		<span class="glyph chart"></span><h1>Statistics</h1>
	</div>

	<ul class="statistics" style="float:left; width: 50%;">
		<? foreach ($stats as $k=>$v): ?>
			<? foreach ($v as $j=>$l): ?>
				<li><? echo CHtml::link('<span>' . $l. '</span>' . ucwords($j));?></li>
			<? endforeach; ?>
		<? endforeach; ?>
	</ul>
	
	<ul class="statistics" style="float:right; width: 50%;">
		<? foreach ($comments as $k=>$v): ?>
			<? foreach ($v as $j=>$l): ?>
				<li><? echo CHtml::link('<span>' . $l. '</span>' . ucwords(str_replace('_', ' ', $j)));?></li>
			<? endforeach; ?>
		<? endforeach; ?>
	</ul>
	
</div>

<div class="box column-right">
	<div class="box-header">
		<span class="glyph listicon"></span><h1>Drafts</h1>
	</div>
	<div class="box-content">	
	<? foreach ($drafts as $k=>$v): ?>
		<h5><? echo CHtml::link($v->title, Yii::app()->createUrl('/admin/content/edit/' . $v->id)); ?></h5>
		<p>Posted in <? echo CHtml::link($v->category->name, Yii::app()->createUrl('/admin/categories/view/' . $v->category->id)); ?> by <? echo CHtml::link($v->author->displayName, Yii::app()->createUrl('/admin/users/view/' . $v->author->id)); ?></p>
		<p><? echo $v->extract; ?></p>
		<hr />
	<? endforeach; ?>
	</div>
</div>

<div class="box column-left">
	<div class="box-header">
		<span class="glyph note"></span><h1>Recent Comments</h1>
	</div>
	<div class="box-content">	
	<? foreach ($recentComments as $k=>$v): ?>
		<p>Posted by <? echo CHtml::link($v->author->displayName, Yii::app()->createUrl('/admin/users/view/' . $v->author->id)); ?></p>
		<p><? echo $v->comment; ?></p>
		<hr />
	<? endforeach; ?>
	</div>
</div>







	
