<?php $this->beginContent('//layouts/main'); ?>
	<div class="full-width">
		<? echo $content; ?>	
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
		                    	<? echo CHtml::button('Search', array('class'=>'search-button')); ?>
		                    </li>
		                </ul>
	                </form>
			</div>
       		<div class="one-fourth-last">
       			<br />
				<h5>Categories</h5>
				<div class="horizontal-rule"></div>
				<ul class="widget-list">
					<?
						$categories = Yii::app()->cache->get(md5( md5(Yii::getPathOfAlias('webroot')) . md5(Yii::app()->name) . md5('categories-listing') ));
						if ($categories == false)
						{
							$categories = Yii::app()->db->createCommand('SELECT categories.id AS id, categories.name AS name, categories.slug AS slug, COUNT(DISTINCT(content.id)) AS content_count FROM categories LEFT JOIN content ON categories.id = content.category_id GROUP BY categories.id ')->queryAll();
							Yii::app()->cache->set(md5( md5(Yii::getPathOfAlias('webroot')) . md5(Yii::app()->name) . md5('categories-listing') ), $categories);							
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
</div>
<?php $this->endContent(); ?>
