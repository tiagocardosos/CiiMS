<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'displayName',
		'user_role'=>array(
			'header'=>'Role',
			'value'=>'UserRoles::model()->findByPk($data->user_role)->name'
		),
		'status',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
