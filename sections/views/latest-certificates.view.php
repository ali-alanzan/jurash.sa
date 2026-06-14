<!-- PAGE CONTENT -->
<!-- FEATURED PROPERTIES -->
<div class="ev-container ev-section-margin-v-m">

<div class="ev-title-dark uk-text-center">
<h3><?php echo echoOutput($translation['tr_201']); ?></h3>
</div>

<div class="uk-grid-medium uk-grid" uk-grid="">
 	<?php foreach($certificates as $item): ?>
 	<div class="uk-width-1-1 uk-width-1-1@s uk-width-1-4@m">
	      <a class="example-image-link" href="<?php echo $urlPath->image($item['certificate_image']); ?>" data-lightbox="example-set" data-title="<?php echo echoOutput($item['certificate_name']); ?>">
	      	<img class="example-image" src="<?php echo $urlPath->image($item['certificate_image']); ?>" alt="<?php echo echoOutput($item['certificate_name']); ?>" />
	      </a>
	</div>
	  <?php endforeach;?>
</div>

<div class="mt-4 uk-text-center ev-section-margin-v-m">
    <a href="<?php echo SITE_URL.'/'.strtolower(echoOutput($translation['tr_201']));?>" class="uk-button uk-text-center uk-button-large uk-button-primary uk-border-pill"><?php echo echoOutput($translation['tr_202'])?></a>
</div>

	<?php if(!empty($itemDetails['tr_content'])): ?>
	<div class="uk-width-1-1">
	<?php echo $itemDetails['tr_content']; ?>
	</div>
	<?php endif; ?>
</div>

<!-- END PAGE CONTENT -->
