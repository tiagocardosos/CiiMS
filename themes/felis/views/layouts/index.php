<?php $this->beginContent('//layouts/main'); ?>
        <div class="inner">
            <div class="short-tour">
                <div class="float-l">
                    <h2><? echo $meta['content_caption_top']['value']; ?></h2>

                    <p><? echo $meta['content_caption_bottom']['value']; ?></p>
                </div><img class="float-r" src="images/felis/check.png" alt="">
            </div>
        </div>
        <div class="shady bott-27"></div>

	<? echo $content; ?>
<?php $this->endContent(); ?>
