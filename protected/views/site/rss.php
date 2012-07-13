<?php header ("content-type: text/xml"); ?>
<?php $url = 'http://'.Yii::app()->request->serverName . Yii::app()->baseUrl; ?>
<rss version="2.0">
	<channel>
		<title><?php echo Yii::app()->name; ?></title>
		<link><?php echo $url; ?></link>
		<description><?php echo Yii::app()->name; ?> Blog</description>
		<language>en-us</language>
		<pubDate><?php echo date('D, d M Y H:i:s T'); ?></pubDate>
		<lastBuildDate><?php echo date('D, d M Y H:i:s T'); ?></lastBuildDate>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<managingEditor><?php echo Yii::app()->params['editorEmail']; ?></managingEditor>
		<webMaster><?php echo Yii::app()->params['webmasterEmail']; ?></webMaster>
	</channel>
	
	<?php foreach ($data as $k=>$v): ?>
	<item>
		<title><?php echo $v['title']; ?></title>
		<link><?php echo $url.'/'.$v['slug']; ?></link>
		<description>
			<?php 
				$md = new CMarkdownParser; 
				echo strip_tags($md->transform($v['extract'])); 
			?>
		</description>
		<category><?php echo Categories::model()->findByPk($v['category_id'])->name; ?></category>
		<author><?php echo Users::model()->findByPk($v['author_id'])->email; ?> (<?php echo Users::model()->findByPk($v['author_id'])->displayName; ?>)</author>
		<pubDate><?php echo date('D, d M Y H:i:s T', strtotime($v['created'])); ?></pubDate>
		<guid><?php echo $url.'/'.$v['slug']; ?></guid>
		<?php if ($v['commentable']): ?>
			<comments><?php echo $url.'/'.$v['slug']; ?>#comments</comments>
		<? endif; ?>
	</item>
	<?php endforeach; ?>	
</rss>
