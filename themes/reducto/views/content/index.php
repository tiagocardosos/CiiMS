<? echo CHtml::image('uploads/003.jpg', NULL, array('class'=>'image'));?>

<div class="horizontal-rule"></div>
<div id="featured-wrapper">
	<h1>Want to know more about me?</h1>
	<p>
		
	</p>
	<div class="one-fourth">
		<h4>Writer</h4>
		<p>
			People say you should do what you love, and love what you do. I love writing, whether it be poetry, journaling, short stories, 
			or novels such as <? echo CHtml::link('Terah Lai Shorehn', Yii::app()->createUrl('terah-lai-shorehn')); ?>. 
			Writing is what keeps me sharp, and keeps me sane, and it's what I love to do. 
		</p>
		<p>
			Enjoy my writing? Why don't you check out a few of the <? echo CHtml::link('things I have written', Yii::app()->createUrl('/blog')); ?>?
			Perhaps you'll find something you enjoy too.
		</p>
	</div>
	<div class="one-fourth">
		<h4>Software Engineer</h4>
		<p>
			Since I was eight, I've been fascinated with web applications. Since I wrote my first HTML blog in 1998, I've been in love 
			with developing great software. While I specialize in web application development, I am fluent in several programming languages (PHP, SQL, Objective-C, C, JS) and have written several apps, 
			toolsets, and web applications to suite the needs of various clients (including this blog framework).
		</p>
		<p>
			Are you in need of a new developer for your website? Head over to my <? echo Chtml::link('profile', Yii::app()->createUrl('/portfolio')); ?>
			and contact me! I'd love to do business with you.
		</p>
	</div>
	<div class="one-fourth-last" style="margin-top: 30px;">
		<h4>Photographer</h4>
		<p>
			I've been told I have an eye for beautiful things. Works of nature are no exception. In my free time I enjoy taking long walks 
			through whatever place I am at and taking photos of anything that catches my eye. If I take something I really like, 
			I'll share it on my blog in the <? echo CHtml::link('photography section', Yii::app()->createUrl('/photography')); ?>.
		</p>
		<p>
			Want to see more of my work? Take a look at the <? echo CHtml::link('photography section', Yii::app()->createUrl('/photography')); ?>.
			Interested in buying a print from me? Head over to my <? echo Chtml::link('profile', Yii::app()->createUrl('/portfolio')); ?> 
			and contact me through one of the social networks I am on. I'd love to hear from you!
		</p>
	</div>
</div>
<div id="twitter-feed">
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
		<h5>Recent Tweets</h5>
			<div class="horizontal-rule"></div>
			<ul class="widget-list twitter">
				<?  Yii::import('ext.JTwitterParser');
					$JTwitterParser = new JTwitterParser(array('username'=>'charlesportwood', 'max'=>3));
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
