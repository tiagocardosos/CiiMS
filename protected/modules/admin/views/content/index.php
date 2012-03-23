<?php

$this->menu[]=array('label'=>'Create New Post', 'url'=>array('save'));

?>

<div class="box">
	<div class="box-header">
		<h1>Manage Posts</h1>
	</div>
	<div class="dataTables_wrapper">

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'content-grid',
		'dataProvider'=>$model->search(),
		'htmlOptions'=>array(
			'class'=>'dataTable',
		),
		'pagerCssClass'=>'dataTables_paginate paging_full_numbers',
		'columns'=>array(
			'title',			
			array('name'=>'status', 'value'=>'$data->status == 1 ? "Published" : "Draft"'),
			'created',
			'updated',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{view} {update} {delete}',
				'viewButtonImageUrl'=>false,
				'viewButtonOptions'=>array('class'=>'button plain'),
				'viewButtonUrl'=>'Yii::app()->createUrl($data->slug)',
				'updateButtonImageUrl'=>false,
				'updateButtonOptions'=>array('class'=>'button plain'),
				'updateButtonUrl'=>'Yii::app()->createUrl("/admin/content/save/id/" . $data->id)',
				'deleteButtonImageUrl'=>false,
				'deleteButtonOptions'=>array('class'=>'button plain delete'),
				'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/content/delete/id/" . $data->id)',
			),
		),
	)); ?>

	</div>
</div><!-- search-form -->
<style>
.summary { display:none; }
</style>


