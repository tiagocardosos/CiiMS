<? $this->menu[]=array('label'=>'Manage Settings', 'url'=>array('index'));?>

<? if (!$model->isNewRecord): ?>
	<? $this->menu[]=array('label'=>'Create New Setting', 'url'=>array('save'));?>
	<? $this->menu[]=array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->key),'confirm'=>'Are you sure you want to delete this item?'));?>
<? endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
