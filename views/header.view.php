<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $langDir; ?>"<?php echo (isset($fullHeight)) ? ' class="uk-height-1-1"' : NULL ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
<link rel="shortcut icon" href="<?php echo $urlPath->image($theme['th_favicon']); ?>">
<?php if(isset($titleSeoHeader) && !empty($titleSeoHeader)): ?>
<title><?php echo echoOutput($titleSeoHeader); ?></title>
<?php endif; ?>
<?php if(isset($descriptionSeoHeader) && !empty($descriptionSeoHeader)): ?>
<meta name="description" content="<?php echo echoOutput($descriptionSeoHeader); ?>">
<?php endif; ?>
<!--Open Graph Markup start-->
<meta property="og:title" content="<?php echo echoOutput($titleSeoHeader); ?>" />
<meta property="og:url"  content="" />
<meta property="og:site_name" content="Jurash.sa"/>
<meta property="og:image" content="<?php echo $urlPath->assets_img('jurash-icon.png'); ?>" />
<meta property="og:type" content="website"/>
<meta property="og:description"  content="<?php echo echoOutput($descriptionSeoHeader); ?>" />
<!--Open Graph Markup end-->
<?php foreach($getLanguages as $item): ?>
<link rel="alternate" hreflang="<?php echo echoOutput($item['language_code']); ?>" href="<?php echo $urlPath->home(); ?>?lang=<?php echo echoOutput($item['language_code']); ?>"/>
<?php endforeach; ?>
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('styles.css'); ?>">
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('lightbox.css'); ?>">
<?php if ($langDir == 'rtl'): ?>
<script type="text/javascript"> window.FontAwesomeConfig = { autoReplaceSvg: false }</script>
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('uikit-rtl.css'); ?>">
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('theme-rtl.css'); ?>">
<?php endif;?>
<script src="<?php echo $urlPath->assets_js('jquery.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit-icons.js'); ?>"></script>
<script async src="https://www.google.com/recaptcha/api.js"></script>

<script type="text/javascript">
/* Global js vars */
var SITEURL = "<?php echo SITE_URL; ?>";
</script>
<?php if(isset($settings['st_analytics']) && !empty($settings['st_analytics'])): ?>
<?php echo $settings['st_analytics']; ?>
<?php endif; ?>

</head> 
<body<?php echo (isset($fullHeight)) ? ' class="uk-height-1-1"' : NULL ?>>

<div id="preloader">
<div class="spinner">
<div class="uil-ripple-css" style="transform:scale(0.40);">
<div></div>
<div></div>
</div>
</div>
</div>

<?php if($maintenanceMode == 1 && isAdmin()): ?>
<div class="ev-alert-danger uk-margin-remove" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p><i class="fas fa-exclamation-triangle uk-margin-small-right"></i> <?php echo echoOutput($translation['tr_maintenancetitle']); ?></p>
</div>
<?php endif; ?>

<?php require './sections/sidemenu.php'; ?>

