<div class="ev-team ev-section-margin-v-l">

<div class="ev-container ev-section-margin-v-l">

<div class="ev-title-dark uk-text-center uk-margin-remove-top">
<p><?php echo echoOutput($translation['tr_194']); ?></p>
<h3><?php echo echoOutput($translation['tr_195']); ?></h3>
</div>

<div class="uk-child-width-1-1@s uk-child-width-1-3@m uk-margin-large-top" uk-grid>
<?php foreach($staff as $item): ?>
<div>
    <img src="<?php echo $urlPath->image($item['staff_image']); ?>">
    <p><?php echo echoOutput($item['tr_name']); ?></p>
    <span><?php if(!empty($item['tr_designation'])){echo echoOutput($item['tr_designation']);} ?></span>
    <span class="ev-profiles"><?php if(!empty($item['staff_email'])): ?><a href="mailto:<?php echo echoOutput($item['staff_email']); ?>"><?php echo echoOutput($item['staff_email']); ?></a><?php endif; ?></span>
    <span class="ev-profiles"><?php if(!empty($item['staff_phone'])): ?><a href="tel:<?php echo echoOutput($item['staff_phone']); ?>"><?php echo echoOutput($item['staff_phone']); ?></a><?php endif; ?></span>
    <span class="ev-profiles"><?php if(!empty($item['staff_license_no'])): echo echoOutput($translation['tr_197']); ?>: <?php echo echoOutput($item['staff_license_no']); ?><?php endif; ?></span>
    <span class="ev-profiles"><?php if(!empty($item['staff_advertiser_no'])): echo echoOutput($translation['tr_198']); ?>: <?php echo echoOutput($item['staff_advertiser_no']); ?></a><?php endif; ?></span>
    <div class="ev-profiles">
        <?php if(!empty($item['staff_whatsapp'])): ?><a href="https://wa.me/<?php echo echoOutput((int)$item['staff_whatsapp']); ?>"><i class="fab fa-whatsapp"></i></a><?php endif; ?>
        <?php if(!empty($item['staff_facebook'])): ?><a href="<?php echo echoOutput($item['staff_facebook']); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
        <?php if(!empty($item['staff_twitter'])): ?><a href="<?php echo echoOutput($item['staff_twitter']); ?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
        <?php if(!empty($item['staff_linkedin'])): ?><a href="<?php echo echoOutput($item['staff_linkedin']); ?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
        <?php if(!empty($item['staff_instagram'])): ?><a href="<?php echo echoOutput($item['staff_instagram']); ?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
</div>

</div>
</div>
