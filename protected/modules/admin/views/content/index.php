<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'author_id'=>array(
			'header'=>'Author',
			'value'=>'Users::model()->findByPk($data->author_id)->displayName'
		),
		'title',
		'status',
		'parent_id',
		'category_id'=>array(
			'header'=>'Category', 
			'value'=>'Categories::model()->findByPk($data->category_id)->name'
		),
		'comment_count',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl($data->slug)',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/content/save/id/" . $data->id)',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/content/delete/id/" . $data->id)',
		),
	),
)); ?>