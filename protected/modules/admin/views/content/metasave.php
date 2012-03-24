<?php

$this->menu[] = array('label'=>'Manage Content', 'url'=>array('index'));
$this->menu[] = array('label'=>'Manage Metadata', 'url'=>array('meta', 'id'=>$id));
$this->menu[]=array('label'=>'Create New Post', 'url'=>array('save'));
$this->menu[]=array('label'=>'New Metadata', 'url'=>Yii::app()->createUrl('/admin/content/metasave/id/' . $id));
$this->menu[] = array('label'=>'Update Post', 'url'=>array('save', 'id'=>$id));
$this->menu[] = array('label'=>'Delete Post', 'url'=>Yii::app()->createUrl('/admin/content/delete/id/' . $id));
?>
<?php echo $this->renderPartial('_meta_form', array('id'=>$id, 'key'=>$key, 'model'=>$model)); ?>
