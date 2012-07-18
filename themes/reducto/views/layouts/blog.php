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
	                    	<? echo CHtml::button('Search', array('class'=>'search-button')); ?>
	                    </li>
	                </ul>
                </form>
		</div>
		
		<!-- Add This -->
		<div class="one-fourth-last">
			<br />
			<h5>Share This Post</h5>
			<div class="horizontal-rule"></div>
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_facebook"></a>
				<a class="addthis_button_linkedin"></a>
				<a class="addthis_button_twitter"></a>
				<a class="addthis_button_google_plusone_share" g:plusone:size="medium"></a>
				<a class="addthis_button_preferred_5"></a>
				<a class="addthis_button_compact"></a>
			</div>
			<? Yii::app()->clientScript->registerScriptFile('http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-5006c955766d11a9'); ?>
		</div>
		<!-- Tag Cloud -->
		
		<!-- Ad[s] -->
		
		<div class="one-fourth-last">
			<h5>More in this Category</h5>
			<div class="horizontal-rule"></div>
			<ul class="widget-list">
				<?
					$related = Yii::app()->db->createCommand('
						SELECT id, title, slug, comment_count FROM content  WHERE category_id = ' . $this->params['data']['category_id'] .
						' AND id != ' . $this->params['data']['id'] . ' AND vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id) ORDER BY updated DESC LIMIT 5')->queryAll();

					
					foreach ($related as $k=>$v)
					{
						echo '<li>';
						echo CHtml::link($v['title'], Yii::app()->createUrl('/'.$v['slug']));
						echo '<span class="widget-hint" style="display: block; ">' . $v['comment_count'] .' Comments</span>';
						echo '</li>';
					}
				?>
			</ul> 				
		</div>
	</div>
<?php $this->endContent(); ?>
