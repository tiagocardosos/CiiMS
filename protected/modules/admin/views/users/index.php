<? $this->menu[]=array('label'=>'Manage Active Users', 'url'=>array('index?Users[status]=0'));?>
<? $this->menu[]=array('label'=>'Manage Inactive Users', 'url'=>array('index?Users[status]=0'));?>
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
			'id',
			'email',
			'displayName',
			array('name'=>'user_role','value'=>'UserRoles::model()->findByPk($data->user_role)->name'),
			array('name'=>'status', 'value'=>'$data->status ? "Active" : "Inactive"'),
			'created',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update} {delete}',
				'updateButtonImageUrl'=>false,
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

