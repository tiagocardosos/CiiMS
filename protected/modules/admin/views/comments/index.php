<? $this->menu[]=array('label'=>'Manage Comments', 'url'=>array('index')); ?>

<div class="box">
	<div class="box-header">
		<h1>Manage Comments</h1>
	</div>
	<div class="dataTables_wrapper">

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comments-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array(
			'class'=>'dataTable',
		),
		'pagerCssClass'=>'dataTables_paginate paging_full_numbers',
	'columns'=>array(
		'id',
		array('name'=>'content_id', 'value'=>'ucwords(Content::model()->findByPk($data->content_id)->slug)'),
		array('name'=>'user_id', 'value'=>'Users::model()->findByPk($data->user_id)->displayName'),
		'comment',
		array('name'=>'approved', 'value'=>'$data->approved ? "Yes" : "No"'),
		/*
		'created',
		'updated',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view} {update} {delete}',
			'viewButtonUrl'=>'Yii::app()->createUrl(Content::model()->findByPk($data->content_id)->slug, array("#"=>"comment-$data->id"))',
			'viewButtonImageUrl'=>false,
			'viewButtonOptions'=>array('class'=>'button plain'),
			'updateButtonImageUrl'=>false,
			'updateButtonUrl'=>'approve',
			'updateButtonLabel'=>'approve',
			'updateButtonOptions'=>array('class'=>'button plain'),
			'deleteButtonImageUrl'=>false,
			'deleteButtonOptions'=>array('class'=>'button plain delete')

		),
	),
)); ?>

	</div>
</div><!-- search-form -->
<style>
.summary { display:none; }
</style>

