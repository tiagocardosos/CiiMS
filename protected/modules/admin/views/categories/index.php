<?php

$this->menu[]=array('label'=>'Create New Category', 'url'=>array('create'));

?>

<div class="box">
	<div class="box-header">
		<h1>Manage Categories</h1>
	</div>
	<div class="dataTables_wrapper">

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'categories-grid',
		'dataProvider'=>$model->search(),
		'htmlOptions'=>array(
			'class'=>'dataTable',
		),
		'pagerCssClass'=>'dataTables_paginate paging_full_numbers',
		'columns'=>array(
			array('name'=>'id', 'value'=>'Categories::model()->findByPk($data->id)->name'),
			array('name'=>'parent_id', 'value'=>'Categories::model()->findByPk($data->parent_id)->name'),
			'name',
			'slug',
			'created',
			'updated',
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


