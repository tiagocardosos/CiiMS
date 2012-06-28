<? if ($pages->getPageCount() == 0): ?>
	<h1>Well this is awkward...</h1>
	<p>
		It seems you have stumbled across one of our categories that doesn't have any content in it yet. 
		Why don't you try checking back later? There might be something there then!
	</p>
<? else: ?>
	<? foreach ($data as $v): ?>
		<? $meta = Content::model()->parseMeta($v->metadata); ?>
		<h1><? echo CHtml::link($v->title, Yii::app()->createUrl($v->slug)); ?></h1>
        <div class="horizontal-rule"></div>
        <div class="blog-data">
        	<? echo $v->created == $v->updated ? 'Posted' : 'Updated'; ?>
        	<span class="black"><? echo date('F jS, Y @ H:i', strtotime($v->created)); ?></span> 
        	by <span class="black"><? echo $v->author->displayName; ?></span> 
        	in <? echo CHtml::link($v->category->name, Yii::app()->createUrl($v->category->slug)); ?> - 
        	<? if ($v->commentable): ?>
        		<span class="black"><? echo $v->comment_count; ?></span> Comments
        	<? endif; ?>
        </div>
        <div class="horizontal-rule"></div>
		<? if (isset($meta['blog-image'])): ?>
			<p><? echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
		<? endif; ?>
        <div class="horizontal-rule"></div>
        <? $md = new CMarkdownParser; echo $md->transform($v->extract); ?>
        <? echo CHtml::link('Read More', Yii::app()->createUrl($v->slug), array('class'=>'medium button')); ?>
        
        <div class="thirty-margin-filler"></div>
        <div class="horizontal-rule"></div>
	<? endforeach; ?>
<? endif; ?>
