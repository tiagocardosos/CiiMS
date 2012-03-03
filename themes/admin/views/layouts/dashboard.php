<?php $this->beginContent('//layouts/main'); ?>
	<!-- Primary navigation -->
	<nav id="primary">
		<?
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel'=>false,	
				'lastItemCssClass'=>'bottom',							
			    	'items'=>array(
					array('label'=>'<span class="glyph dashboard"></span>Dashboard', 'url'=>Yii::app()->createUrl('/admin/'), 'itemOptions'=>array('class'=>Yii::app()->controller->id == 'default' ? 'active' : '')),
					array('label'=>'<span class="glyph new"></span>Content', 'url'=>Yii::app()->createUrl('/admin/content'), 'itemOptions'=>array('class'=>Yii::app()->controller->id == 'content' ? 'active' : '')),
					array('label'=>'<span class="glyph folder"></span>Files', 'url'=>Yii::app()->createUrl('/admin/files'), 'itemOptions'=>array('class'=>Yii::app()->controller->id == 'files' ? 'active' : '')),
					array('label'=>'<span class="glyph user"></span>Users', 'url'=>Yii::app()->createUrl('/admin/users'), 'itemOptions'=>array('class'=>Yii::app()->controller->id == 'users' ? 'active' : '')),
					array('label'=>'<span class="glyph cog"></span>Settings', 'url'=>Yii::app()->createUrl('/admin/settings'), 'itemOptions'=>array('class'=>Yii::app()->controller->id == 'settings' ? 'active' : '')),
					array('label'=>'<span class="glyph quit"></span>Logout', 'url'=>Yii::app()->createUrl('/logout')),
				    ),
				)
			);		
		?>
	</nav>
	<!-- End Primary Navigation -->
	
	<!-- Secondary Navigation -->
	<? if (!empty($this->menu)): ?>
		<nav id="secondary">
	      		<?
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel'=>false,		
			    	'items'=>$this->menu
				)
			);		
		?>
	    	</nav>
    	<? endif; ?>
    	<!-- End Secondary Navigation -->
    
    	<!-- Content -->
    	<section id="maincontainer">
	    	<div id="main" class="container_12">
			<? echo $content; ?>
		</div>
	</section>
	<!-- End Content -->
<?php $this->endContent(); ?>
