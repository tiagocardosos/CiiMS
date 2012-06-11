<?php $this->beginContent('//layouts/main'); ?>
	<div class="full-width">
		<div class="three-fourth">
			<? echo $content; ?>
		</div>
		<? $title = $this->displayVar($this->params['data']['title'], ucwords($this->getAction()->getId())); ?>
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
				<h5>Navigation</h5>
				<div class="horizontal-rule"></div>
				<? $this->widget('zii.widgets.CMenu',array(
					'htmlOptions'=>array('class'=>'widget-list navigation'),
					'activeCssClass'=>'selected',
					'items'=>array(
						array('label'=>'About','url'=>Yii::app()->createUrl('/portfolio'), 'active'=>$title==='Portfolio'?true:false),
						array('label'=>'Blog', 'url'=>Yii::app()->createUrl('/blog'), 'active'=>$title==='Blog'?true:false),
						array('label'=>'Projects', 'url'=>Yii::app()->createUrl('/projects'), 'active'=>$title==='Projects'?true:false)
					))); 
				?>
			</div>
			<div class="one-fourth-last">
				<h5>Twitter Feed</h5>
				<div class="horizontal-rule"></div>
				<ul class="widget-list twitter">
					<?  Yii::import('ext.JTwitterParser');
						$JTwitterParser = new JTwitterParser(array('username'=>'charlesportwood'));
						foreach ($JTwitterParser->fetch_tweets() as $k=>$v): 
					?>
						<li>
							<span class="widget-twitter-time">
								<? echo CHtml::link($v['date'], $v['link']); ?>
							</span>
							<br />
							<? echo $v['desc']; ?>
						</li>
					<?	endforeach; ?>
				</ul>
			</div>
			<div class="one-fourth-last">
				<h5>Connect</h5>
				<div class="horizontal-rule"></div>
				<br />
				<? 
					echo CHtml::link(
						CHtml::image(Yii::app()->baseUrl . '/images/social-icons/LinkDeck/32/twitter.png'), 
									'https://www.twitter.com/charlesportwood', 
									array('escape'=>true, 'class'=>'social-icon')
						);
					
					echo CHtml::link(
					CHtml::image(Yii::app()->baseUrl . '/images/social-icons/LinkDeck/32/googleplus.png'), 
								'https://plus.google.com/u/0/103392860132365445794/posts', 
								array('escape'=>true, 'class'=>'social-icon')
					);
					
					echo CHtml::link(
					CHtml::image(Yii::app()->baseUrl . '/images/social-icons/LinkDeck/32/github.png'), 
								'https://www.github.com/charlesportwoodii', 
								array('escape'=>true, 'class'=>'social-icon')
					);
					
					echo CHtml::link(
					CHtml::image(Yii::app()->baseUrl . '/images/social-icons/LinkDeck/32/linkedin.png'), 
								'https://www.linkedin.com/profile/view?id=59000234', 
								array('escape'=>true, 'class'=>'social-icon')
					);
				
					echo CHtml::link(
					CHtml::image(Yii::app()->baseUrl . '/images/social-icons/LinkDeck/32/facebook.png'), 
								'https://www.facebook.com/charlesportwoodii', 
								array('escape'=>true, 'class'=>'social-icon')
					);
				
				
				?>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>
