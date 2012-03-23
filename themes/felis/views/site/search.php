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
		
		<div style="clear:both;"></div>
        	<? if ($postCount > 15): ?>
		<? $pages = $count % 15;?>
        		<div class="portfolio-pagn">

                		<? for ($i = 1; $i <= $pages; $i++): ?>
                        		<? if ($i == 1): ?>
                                		<? if ($id != 1): ?>
                                        		<span><? echo CHtml::link('<<', Yii::app()->createUrl('/search/'.($id-1))); ?></span>
                                		<? endif; ?>
                        		<? endif; ?>
                        		<span><? echo CHtml::link($i, Yii::app()->createUrl($category.'/'.$i), array('class'=>($i == $id ? 'page-active' : ''))); ?></span>
                        		<? if ($i == $pages): ?>
                                		<? if ($id != $pages): ?>
                                        		<span><? echo CHtml::link('>>', Yii::app()->createUrl($category.'/'.($id+1))); ?></span>
                                		<? endif; ?>
                        		<? endif; ?>
                		<? endfor; ?>
        		</div>
        		<? endif; ?>
                <? endif; ?>
        </div>
</div>


