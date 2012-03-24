<?php

$this->menu[]=array('label'=>'Create New Post', 'url'=>array('save'));
$this->menu[]=array('label'=>'New Metadata', 'url'=>Yii::app()->createUrl('/admin/content/metasave/id/' . $id));
$this->menu[] = array('label'=>'Update Post', 'url'=>array('save', 'id'=>$id));
$this->menu[] = array('label'=>'Delete Post', 'url'=>Yii::app()->createUrl('/admin/content/delete/id/' . $id));
?>

<div class="box">
	<div class="box-header">
		<h1>Manage Metadata for Content</h1>
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
			'content_id', 
			'key',
			'value',
			'created',
			'updated',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update} {delete}',
				'updateButtonImageUrl'=>false,
				'updateButtonOptions'=>array('class'=>'button plain'),
				'updateButtonUrl'=>'Yii::app()->createUrl("/admin/content/metasave/id/" . $data->content_id . "/key/" . $data->key)',
				'deleteButtonImageUrl'=>false,
				'deleteButtonOptions'=>array('class'=>'button plain delete'),
				'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/content/metadelete/id/" . $data->content_id . "/key/" . $data->key)',
			),
		),
	)); ?>

	</div>
</div><!-- search-form -->
<style>
.summary { display:none; }
</style>


