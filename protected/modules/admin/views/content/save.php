<?php

$this->menu[] = array('label'=>'Manage Content', 'url'=>array('index'));
if (!$model->isNewRecord)
{
	$this->menu[] = array('label'=>'Manage Metadata', 'url'=>array('meta', 'id'=>$id));
	$this->menu[] = array('label'=>'Create New Post', 'url'=>array('save'));
	$this->menu[] = array('label'=>'Delete Post', 'url'=>Yii::app()->createUrl('/admin/content/delete/id/' . $id));
}
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
