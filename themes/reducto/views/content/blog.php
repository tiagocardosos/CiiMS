<h1><? echo $data->title; ?></h1>
<div class="horizontal-rule"></div>
<div class="blog-data">Last Updated <span class="black"><? echo date('F jS, Y @ H:i', strtotime($data->updated)); ?></span></div>
<? if (isset($meta['blog-image'])): ?>
	<p><? echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
<? endif; ?>
<div class="clear"></div>
<p><? echo $data->content; ?></p>

<!-- TODO: // About the Author -->

<!-- TODO: // Comments -->