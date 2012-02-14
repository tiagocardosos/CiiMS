<div class="wrap720">
	<div class="posts">
	<? $count = 0; foreach ($posts as $k=>$v): ?>
		<? if ($page == 1 && $count == 0): ?>
			<div class="inner clearfix">
				<div class="inner-t">
			   		<div class="heading bott-15">
		   					<h3><? echo CHtml::link($v->attributes['title'], Yii::app()->createUrl($v->attributes['slug'])); ?></h3>
	       					</div>
			    	<div class="proj-img bott-15">
				    	<a href="images/content/img680x300.jpg" class="prettyPhoto zoom"></a> <a href="blog-single.html"></a> <img src="images/content/img680x300.jpg" alt=""> <i></i>
			    	</div>
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
		<? endif; ?>
		
		<? if ($count == 0): ?>
			<div class="small-posts-wrap"> <!-- BEGIN POST WRAP -->	
		<? endif; ?>
		<div class="small-post">
    			<div class="inner">
        			<div class="inner-t">
        				<div class="heading bott-15">
                				<h3><? echo CHtml::link($v->attributes['title'], Yii::app()->createUrl($v->attributes['slug'])); ?></h3>
         		   		</div>
            				<div class="proj-img bott-15">
                				<a href="images/content/img310x140.jpg" class="prettyPhoto zoom"></a> <a href="blog-single.html"></a> <img src="images/content/img310x140.jpg" alt=""> <i></i>
            				</div>
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

	<div class="portfolio-pagn">
		<span><a href="#" class="page-active">1</a></span> <span><a href="#">2</a></span> <span><a href="#">3</a></span> <span><a href="#">4</a></span> <span><a href="#">5</a></span>
        </div>
	</div>
</div>
