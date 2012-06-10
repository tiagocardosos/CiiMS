<div class="inner">
	<div class="page-description">
		<span class="float-l"></span>
	</div>
</div>
        <div class="shady bott-27"></div>
        <div id="works2-container">
<? /*
	<ul class="portfolio-filter filter">
            	<li class="all-projects curr">
            		<a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79">All works</a></li>
				<li class="awesome"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=18">Awesome</a></li><li class="canadian"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=25">Canadian</a></li><li class="commercials"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=28">Commercials</a></li><li class="fresh-meat"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=35">Fresh meat</a></li><li class="landed"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=29">Landed</a></li><li class="new"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=24">New</a></li><li class="special"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=19">Special</a></li><li class="summer-deals"><a href="http://themes.evgenyfireform.com/wp-felis/?page_id=79&pcategory=36">Summer deals</a></li>            
	</ul>
	*/ ?>
			
	<div class="inner clearfix">
        	<div class="inner-t">
                	<div id="works2">
                	<? foreach ($categories as $k=>$v): ?>        
                		<? $meta = Categories::model()->parseMeta($v->metadata); ?>
				<div class="col1-3" data-id="1">
					<div class="item-holder">
						<div class="proj-img works2">
							<? echo CHtml::link('', Yii::app()->createUrl($v->attributes['slug']), array('class'=>'more-info-href')); ?>
							<? echo CHtml::image($meta['image']['value'], '', array('class'=>'l-w wp-post-image')); ?>
						</div>
						<div class="descr">
							<h5><? echo CHtml::link($v->attributes['name'], Yii::app()->createUrl($v->attributes['slug'])); ?></h5>
							<p><? echo $meta['category_description']['value']; ?></p>
						</div>								
					</div>
				</div>
			<? endforeach; ?>
			</div>
		</div>
	</div>
