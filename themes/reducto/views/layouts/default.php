<?php $this->beginContent('//layouts/main'); ?>
	<div class="three-fourth">
		<? echo $content; ?>
	</div>	
    <div class="one-fourth-last">
    	<div class="one-fourth-last" style="margin: 30px 0 0 0;">
			<h5>Search</h5>
			<div class="horizontal-rule"></div>
			<form id="search" method="GET" action="<? echo Yii::app()->createUrl('/search'); ?>">
	                <ul class="widget-list search">
	                    <li>
	                    	<? echo CHtml::textField('q', $this->displayVar($_GET['q']), 
	                    							array(
	                    								'placeholder'=>'What are you looking for?',
	                    								'style'=>'width: auto;' 
														)
													); 
	                    	?>
	                    </li>
	                    <li class="search-last" style="margin-right: 0px;">
	                    	<? echo CHtml::submitButton('Search', array('class'=>'search-button')); ?>
	                    </li>
	                </ul>
                </form>
		</div>
   		<div class="one-fourth-last">
   			<br />
			<h5>Categories</h5>
			<div class="horizontal-rule"></div>
			<ul class="widget-list">
				<li><? echo CHtml::link('All Blogs', Yii::app()->createUrl('/blogs')); ?></li>
				<?
					$categories = Yii::app()->cache->get('categories-listing');
					if ($categories == false)
					{
						$categories = Yii::app()->db->createCommand('SELECT categories.id AS id, categories.name AS name, categories.slug AS slug, COUNT(DISTINCT(content.id)) AS content_count FROM categories LEFT JOIN content ON categories.id = content.category_id WHERE content.type_id = 2 AND content.status = 1 GROUP BY categories.id')->queryAll();
						Yii::app()->cache->set('categories-listing', $categories);							
					}
					
					foreach ($categories as $k=>$v)
					{
						if ($v['name'] != 'Uncategorized')
						{
							echo '<li>';
							echo CHtml::link($v['name'], Yii::app()->createUrl('/'.$v['slug']));
							echo '<span class="widget-hint" style="display: block; ">' . $v['content_count'] .' Posts</span>';
							echo '</li>';
						}	
					}
				?>
			</ul> 				
		</div>
    </div>
<?php $this->endContent(); ?>
