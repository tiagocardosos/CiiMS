<?php
$this->menu[]=array('label'=>'Manage Categories', 'url'=>array('index'));
$this->menu[]=array('label'=>'Create New Category', 'url'=>array('create'));
$this->menu[]=array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
