<!-- PAGE CONTENT -->
<!-- FEATURED PROPERTIES -->
<div class="ev-container ev-section-margin-v-m">

<div class="ev-title-dark uk-text-center">
<p><?php echo echoOutput($translation['tr_199']); ?></p>
<h3><?php echo echoOutput($translation['tr_200']); ?></h3>
</div>


<div class="uk-grid-medium uk-grid">

<?php foreach ($services as $item) {?>

<div class="uk-width-1-1 uk-width-1-2@s uk-width-1-3@m">
<div class="ev-card-1">
<div>
<div class="uk-card uk-card-default uk-card-body">
<a href="#">
<div class="uk-inline">
<div class="uk-card-media-top uk-cover-container">
<img alt="" class="uk-border-rounded uk-cover" src="<?php echo $urlPath->image($item['service_image']); ?>" uk-cover="" style="height: 277px; width: 380px;">
<canvas width="600" height="400"></canvas>
</div>
</div>
</a>
<div class="ev-body">
<span class="ev-meta uk-text-small" style="text-align:center"><?php echo echoOutput($item['tr_name']); ?></span>
</div>
</div>
</div>
</div>
</div>

<?php }?>

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
