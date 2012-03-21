<div class="shady bott-27"></div>
<div class="wrap720" style="width: 100%;">
        <div class="posts">
                <div class="inner clearfix">
                        <div class="inner-t">
                        <div class="heading bott-15">
                            <h3>Search</h3>
                        </div>
                		<form id="contact" method="GET" action="<? echo Yii::app()->createUrl('/search'); ?>">
			        	<center>
			        		<? echo CHtml::textField('q', $_GET['q'], array('style'=>'width: 400px;', 'placeholder'=>'What are you looking for?', )); ?>
			        	</center>
		                </form>
		                
		                <? if (sizeof($data) == 0): ?>
		                	<p style="text-align:center;">Sorry, we didn't find anything that matched that criteria.</p>
		                <? endif; ?>
		        </div>
		</div>
		<? if (sizeof($data) != 0): ?>
		<br />
		<div class="inner clearfix">
			<div class="inner-t">
				<div class="heading bott-15">
		                    <h3>Results</h3>
		                </div>
		                <? foreach ($data as $k=>$v): ?>
						<div class="inner-t">
					   		<div class="heading bott-15">
				   					<h3><? echo CHtml::link($v->attributes['title'], Yii::app()->createUrl($v->attributes['slug'])); ?></h3>
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
		                
		                <? endforeach; ?>
			</div>
                </div>
                <? endif; ?>
        </div>
</div>


