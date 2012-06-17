<? $count = 1; ?>
<? foreach ($categories as $category): ?>
	<? $meta = Categories::model()->parseMeta($category->metadata); ?>
	<div class="one-third<? echo $count % 3 == 0 ? '-last' : ''?>" <? echo $count % 3 == 0 ? 'style="margin: 30px 0;"' : ''?>
		<? 
			if ($this->displayVar($meta['category-image']['value'])):
	    		echo CHtml::link(
	    			CHtml::image(Yii::app()->baseUrl . $meta['category-image']['value'], NULL, array('class'=>'three-column-picture')),
					Yii::app()->createUrl($category->slug), 
	    			array('title'=>$category->name, 'escape'=>'true')
				);
	    	endif;
	    ?>
	    <h6><? echo CHtml::link($category->name, Yii::app()->createUrl($category->slug)); ?></h6>
	</div>
	<? $count++; ?>
<? endforeach; ?>

<script type="text/javascript">
    $(document).ready(function(){
	    $("a[rel^='prettyPhoto']").prettyPhoto();
    });
</script>
