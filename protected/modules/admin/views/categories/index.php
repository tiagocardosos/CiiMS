<div class="well">
	<?php $this->widget('bootstrap.widgets.BootButton', array('label'=>'New Category', 'url'=>Yii::app()->createUrl('/admin/categories/save'), 'type'=>'primary', 'size'=>'normal', 'htmlOptions'=>array('style'=>'float:right;'))); ?>
	<br />
	<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'parent_id'=>array(
			'name'=>'parent_id',
			'value'=>'Categories::model()->findByPk($data->parent_id)->name'
		),
		'name',
		'slug',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl($data->slug)',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/categories/save/id/".$data->id)'
		),
	),
)); ?>
</div>