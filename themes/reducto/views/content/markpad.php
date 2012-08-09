<div class="horizontal-rule"></div>
<div class="blog-data">
	<? if (isset($meta['blog-image'])): ?>
		<p><? echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image', 'style'=>'width: 900px')); ?></p>
	<? endif; ?>
</div>
	<h1>Markpad Editor for iPhone and iPad</h1>
	<div class="two-third">
		<h4>Markpad is fast. Markpad is easy. Markpad is simple.</h4>
		<p>
			Markpad is a simple and easy to use Markdown editor and previewer for iPhone and iPad. With Markpad you can easily create, edit, and review Markdown documents. Use Markpad to write notes, keep a journal, or preview Markdown output before saving it to your blog. Markpad Editor is available in the App Store for only <strong>.99c</strong>! Go get it today!
		</p>
	</div>
	<div class="one-third-last" style="margin-top: 30px;">
		<br />
		<center><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl .'/uploads/aitappstorelogo.jpg', NULL, array('width'=>'200px')), '#', array('escape'=>true)); ?></center>
	</div>
	<div class="horizontal-rule"></div>
	<p></p>
	<p></p>
	<div class="one-third">
		<h4>Preview Notes Instantly</h4>
		<p>With Markpad you can easily create a note then immediatly see what your note will look like in full HTML. Markpad has full Markdown support, and also supports Github Flavored Markdown - allowing you to see what your note will look like on any platform.</p>
		<p></p>
		<p></p>
		
		<h4>Optimized for iPad</h4>
		<p>
			Markpad has been optimzied to work in all orientations on both the iPhone and iPad - so when you're on the go you can use either device to create, edit, and preview Markdown notes. 
		</p>
		<p></p>
		<p></p>
		
		<h4>Awesome Search</h4>
		<p>Looking for that note you wrote last week? Only remember a single word? With Markpad you can search for your notes and find exactly what you were looking for.</p>
	</div>
	<div class="two-third-last" style="margin-top: 0px;">
		<p><? echo CHtml::image(Yii::app()->baseUrl . '/uploads/mzl.jhidogvc.png', NULL, array('class'=>'image')); ?></p>
	</div>
	
	<div class="horizontal-rule"></div>
	<p></p>
	<p></p>
	<div class="full-width">
		<center>
			<h2>Markpad is available now! What are you waiting for? Get it today!</h2>
			<br />
			<br />
			<br />
			<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl .'/uploads/aitappstorelogo.jpg', NULL, array('width'=>'200px')), '#', array('escape'=>true)); ?>
		</center>
	</div>
