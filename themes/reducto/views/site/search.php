<form id="contact" method="GET" action="<? echo Yii::app()->createUrl('/search'); ?>">
	<center>
		<? 
			echo CHtml::textField('q', $this->displayVar($_GET['q']), array('style'=>'width: 400px; float:none;', 'placeholder'=>'What are you looking for?', ));
			echo CHtml::button('Search', array('class'=>'search-button', 'style'=>'float:none; margin-left: 15px;')); 
		?>
	</center>
</form>	
<br /><br />
<div class="horizontal-rule"></div>

<div class="three-fourth">		
	<? if ($this->displayVar($_GET['q'])): ?>
		<? if ($itemCount == 0): ?>
			<h2>No Results Found</h2>
			<p>Sorry, we tried looking but we didn't find a match for the specified criteria. Try refining your search.</p>
		<? endif; ?>
	<? endif; ?>
	
	<? foreach ($data as $k=>$v): ?>
        <h1><? echo CHtml::link($v->title, Yii::app()->createUrl($v->slug)); ?></h1>
        <div class="horizontal-rule"></div>
        <div class="blog-data">
        	Posted <span class="black"><? echo date('F jS, Y @ H:i', strtotime($v->created)); ?</span> 
        	by <span class="black"><? echo $v->author->displayName; ?></span> 
        	in <? echo CHtml::link($v->category->name, Yii::app()->createUrl($v->category->slug)); ?> - 
        	<span class="black"><? echo $v->comment_count; ?></span> Comments</div>
        <div class="horizontal-rule"></div>
        <p><? echo strip_tags($v->extract, '<p><br>'); ?></p>
        <? echo CHtml::link('Read More', Yii::app()->createUrl($v->slug), array('class'=>'medium button')); ?>
        
        <div class="thirty-margin-filler"></div>
        <div class="horizontal-rule"></div>
        <? endforeach; ?>
    <br /><br />
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
	<META NAME="robots" CONTENT="noindex,nofollow">
</div>