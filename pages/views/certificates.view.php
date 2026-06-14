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

	<?php if(!empty($itemDetails['tr_content'])): ?>
	<div class="uk-width-1-1">
	<?php echo $itemDetails['tr_content']; ?>
	</div>
	<?php endif; ?>
</div>

<!-- PARTNERS -->
<?php require './sections/partners.php'; ?>

<!-- END PAGE CONTENT -->
