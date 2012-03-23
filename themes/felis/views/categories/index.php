<div class="wrap720">
	<? if ($postCount == 0): ?>
		<div class="posts">
			<div class="inner clearfix">
				<div class="inner-t">
			   		<div class="heading bott-15">
		   					<h3>There's nothing here!</h3>
	       				</div>
	       				<div class="post">
			    		<p>We're always looking to add new content. Either there is nothing in this category, or we just haven't gotten around to this piece yet. Why don't you check out some of our other projects?</p>
			    	</div>
	       			</div>
	       		</div>
		</div>
	<? endif; ?>
	<div class="posts">
	<? $category = $posts[0]->category->attributes['slug']; ?>
	<? $count = 0; foreach ($posts as $k=>$v): ?>
		<? $metadata = Content::model()->parseMeta($v->metadata); ?>
		<? if ($page == 1 && $count == 0): ?>
			<div class="inner clearfix">
				<div class="inner-t">
			   		<div class="heading bott-15">
		   					<h3><? echo CHtml::link($v->attributes['title'], Yii::app()->createUrl($v->attributes['slug'])); ?></h3>
	       				</div>
	       				<? if (isset($metadata['disp-image']['value'])): ?>
					    	<div class="proj-img bott-15">
					    		<? echo CHtml::link('', Yii::app()->createUrl($metadata['disp-image']['value']), array('class'=>'prettyPhoto zoom')); ?>
					    		<? echo CHtml::link('', Yii::app()->createUrl($v->attributes['slug'])); ?>
						    	<? echo CHtml::image(Yii::app()->baseUrl . $metadata['disp-image']['value']); ?>
					    	</div>
				    	<? endif; ?>
			    		<? 
			    			$d = date('j', strtotime($v['created']));
			    			$m = date('M', strtotime($v['created']));
				    		$cal = "<span>{$d}</span><span class=\"post-date\">{$m}</span><span class=\"num-comm\">{$v->attributes['comment_count']}</span>";
						echo CHtml::link($cal, Yii::app()->createUrl('/'.$v->attributes['slug']), array('class'=>'col1-12')); 
					?>
				<div class="post">
					<p class="auth-cat">Posted in 
						<? echo CHtml::link($v->category->attributes['name'], Yii::app()->createUrl($v->category->attributes['slug'])); ?>
						<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/pencil.gif', '', array('class'=>'ml-10')); ?>
					</p>
			    		<p><? echo $v->attributes['extract']; ?>[...]</p>
			    		<? echo CHtml::link('<span>Read more' . CHtml::image(Yii::app()->baseUrl.'/images/felis/arr.gif') . '</span>', Yii::app()->createUrl($v->attributes['slug']), array('class'=>'button')); ?>
			    	</div>
				</div>
		    	</div>
			
    			<div class="shady bott-27"></div>
		<? 
		   $count++;
		   echo '<div class="small-posts-wrap"> <!-- BEGIN POST WRAP -->';
		   continue;
		   endif; 
		?>
		
		<? if ($count == 0): ?>
			<div class="small-posts-wrap"> <!-- BEGIN POST WRAP -->	
		<? endif; ?>
		<div class="small-post">
    			<div class="inner">
        			<div class="inner-t">
        				<div class="heading bott-15">
                				<h3><? echo CHtml::link($v->attributes['title'], Yii::app()->createUrl($v->attributes['slug'])); ?></h3>
         		   		</div>
         		   		<? if (isset($metadata['disp-image-mini']['value'])): ?>
		    				<div class="proj-img bott-15">
					    		<? echo CHtml::link('', Yii::app()->createUrl($metadata['disp-image-mini']['value']), array('class'=>'prettyPhoto zoom')); ?>
					    		<? echo CHtml::link('', Yii::app()->createUrl($v->attributes['slug'])); ?>
						    	<? echo CHtml::image(Yii::app()->baseUrl . $metadata['disp-image-mini']['value']); ?>
					    	</div>
					<? endif; ?>
					<? 
			    			$d = date('j', strtotime($v['created']));
			    			$m = date('M', strtotime($v['created']));
				    		$cal = "<span>{$d}</span><span class=\"post-date\">{$m}</span><span class=\"num-comm\">{$v->attributes['comment_count']}</span>";
						echo CHtml::link($cal, Yii::app()->createUrl('/'.$v->attributes['slug']), array('class'=>'col1-12')); 
					?>
					<div class="post">
						<p class="auth-cat">Posted in 
							<? echo CHtml::link($v->category->attributes['name'], Yii::app()->createUrl($v->category->attributes['slug'])); ?>
							<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/pencil.gif', '', array('class'=>'ml-10')); ?>
						</p>
				    		<p><? echo $v->attributes['extract']; ?>[...]</p>
				    		<? echo CHtml::link('<span>Read more' . CHtml::image(Yii::app()->baseUrl.'/images/felis/arr.gif') . '</span>', Yii::app()->createUrl($v->attributes['slug']), array('class'=>'button')); ?>
			    		</div>
         			</div>
    			</div>
    			<div class="shady bott-27"></div>
    		</div>
		<? $count++; ?>
	<? endforeach; ?>
	</div> <!-- END SMALL POST WRAP -->      

	<div style="clear:both;"></div>
	<? if ($postCount > 5): ?>
	<? $pages = ceil((($postCount - 5) / 6) + 1); ?>
	<div class="portfolio-pagn">
		
		<? for ($i = 1; $i <= $pages; $i++): ?>
			<? if ($i == 1): ?>
				<? if ($page != 1): ?>
					<span><? echo CHtml::link('<<', Yii::app()->createUrl($category.'/'.($page-1))); ?></span>
				<? endif; ?>
			<? endif; ?>
			<span><? echo CHtml::link($i, Yii::app()->createUrl($category.'/'.$i), array('class'=>($i == $page ? 'page-active' : ''))); ?></span>
			<? if ($i == $pages): ?>
				<? if ($page != $pages): ?>
					<span><? echo CHtml::link('>>', Yii::app()->createUrl($category.'/'.($page+1))); ?></span>
				<? endif; ?>
			<? endif; ?>
		<? endfor; ?>
        </div>
        <? endif; ?>
	</div>
</div>
