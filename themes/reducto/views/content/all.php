<h1>Blogroll</h1>
<div class="horizontal-rule"></div>
<div class="three-fourth">
	<? foreach($data as $content): ?>
		<? $meta = Content::model()->parseMeta($content->metadata); ?>
		<h1><? echo CHtml::link($content->title, Yii::app()->createUrl($content->slug)); ?></h1>
		<div class="horizontal-rule"></div>
		<div class="blog-data">
			Posted <span class="black"><? echo date('F jS, Y @ H:i', strtotime($content->created)); ?></span> 
			by <span class="black"><? echo $content->author->displayName; ?></span>
			in <? echo CHtml::link($content->category->name, Yii::app()->createUrl($content->category->slug)); ?>
			<span class="black"><? echo $content->comment_count; ?></span> Comments</div>
		<div class="horizontal-rule"></div>
		<? if ($this->displayVar($meta['post-image']['value'])): ?>
			<p><? echo CHtml::image(Yii::app()->baseUrl . $meta['post-image']['value'], NULL, array('class'=>'image')); ?></p>
		<? endif; ?>
		<p><? echo strip_tags($content->extract, '<p><br>'); ?></p>
		<? echo CHtml::link('Read More', Yii::app()->createUrl($content->slug), array('class'=>'medium button')); ?>
		
		<div class="thirty-margin-filler"></div>
		<div class="horizontal-rule"></div>
	<? endforeach; ?>
	</div>
 	<center>
    <?php 
		// Auto pagination
		if ($pages != array())
		{
			$this->widget('CLinkPager', array(
	            'currentPage'=>$pages->getCurrentPage(),
	            'itemCount'=>$itemCount,
	            'pageSize'=>$pages->pageSize,
	            'maxButtonCount'=>10,
	            'header'=>'',
	       		'htmlOptions'=>array('class'=>'pages'),
	        ));
		}
	?>
	</center>