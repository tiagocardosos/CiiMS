<? $this->menu[]=array('label'=>'Manage Settings', 'url'=>array('index'));?>
<? $this->menu[]=array('label'=>'Create New Setting', 'url'=>array('save'));?>

<div class="box">
	<div class="box-header">
		<h1>Manage Users</h1>
	</div>
	<div class="dataTables_wrapper">
	<? /*
		<div class="dataTables_filter">
			<label><span class="icon search"></span> 
				<input id="filter" name="User[email]" type="text" placeholder="Search..."></label>
		</div>
*/ ?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'users-grid',
		'dataProvider'=>$model->search(),
		'htmlOptions'=>array(
			'class'=>'dataTable',
		),
		'pagerCssClass'=>'dataTables_paginate paging_full_numbers',
		'columns'=>array(
			'key',
			'value',
			'created',
			'updated',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update} {delete}',
				'updateButtonImageUrl'=>false,
				'updateButtonOptions'=>array('class'=>'button plain'),
				'updateButtonUrl'=>'Yii::app()->createUrl("/admin/settings/save/id/" . $data->key)',
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

