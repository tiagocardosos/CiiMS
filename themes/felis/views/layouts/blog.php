<?php $this->beginContent('//layouts/main'); ?>
<div class="inner">
	<div class="page-description">
		<span class="float-l"></span>
	</div>
</div>
        <div class="shady bott-27"></div>
	<? echo $content; ?>

        <div class="col1-4 sidebar omega">          
            <div class="heading">
                <h5>Categories</h5>
            </div>
            
            <ul class="arrows bott-27">
                <?
			$categories = Yii::app()->cache->get('categories-listing');
			if ($categories == false)
			{
				$categories = Yii::app()->db->createCommand('SELECT id, name, slug FROM categories')->queryAll();
				Yii::app()->cache->set('categories-listing', $categories);							
			}
			
			foreach ($categories as $k=>$v)
			{
				if ($v['name'] != 'Uncategorized')
				{
					echo '<li>' . CHtml::link($v['name'], Yii::app()->createUrl('/'.$v['slug'])) . '</li>';
				}	
			}
		?>
            </ul>
<!--
            <div class="heading">
                <h5>Tags</h5>
            </div>

            <ul class="tags bott-27 clearfix">
                <li><a href="#">nostrum</a></li>

                <li><a href="#">exercitationem</a></li>

                <li><a href="#">cupiditate</a></li>

                <li><a href="#">vero</a></li>

                <li><a href="#">nostrum</a></li>

                <li><a href="#">dolorum</a></li>

                <li><a href="#">dignissimos</a></li>

                <li><a href="#">minima</a></li>

                <li><a href="#">exercitationem</a></li>
            </ul>

            <div class="heading">
                <h5>Twitroll</h5>
            </div>
-->
            <!--<div class="tweet bott-27"></div> -->
        </div>
<?php $this->endContent(); ?>
