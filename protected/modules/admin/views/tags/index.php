<? $this->menu[]=array('label'=>'Manage Tags', 'url'=>array('index'));?>

<div class="box">
	<div class="box-header">
		<h1>Manage Tags</h1>
	</div>
	<div class="dataTables_wrapper">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tags-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array(
			'class'=>'dataTable',
		),
		'pagerCssClass'=>'dataTables_paginate paging_full_numbers',
	'columns'=>array(
		'id',
		array('name'=>'user_id', 'value'=>'Users::model()->findByPk($data->user_id)->displayName'),
		'tag',
		array('name'=>'approved', 'value'=>'$data->approved ? "Yes" : "No"'),
		'created',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

	</div>
</div><!-- search-form -->
<style>
.summary { display:none; }
</style>



