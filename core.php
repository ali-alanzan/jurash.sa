<?php

session_start();

require(__DIR__ . '/config.php');
require(__DIR__ . '/functions.php');
require(__DIR__ . '/routes.php');

$connect = connect();

if (!$connect) {
	exit();
}

// Site Configuration
$settings = getSettings($connect);
$theme = getTheme($connect);

// Get Languages
$getLanguages = getLanguages($connect);

// Get Local Language Cookies
$lang = checkLanguage($connect, $settings['st_language']);

// Get Translation
$translation = getStrings($connect, $settings['st_language'], $lang);

// Get General Settings
$currency = $settings['st_currency'];
$unit = $settings['st_unit'];

// Get Language Settings
$getInfoLangByCode = getInfoLangByCode($connect, $lang);

$langDir = $getInfoLangByCode['language_type'];

// Ads
$headerAd = getHeaderAd($connect, $lang);
$footerAd = getFooterAd($connect, $lang);
$sidebarAd = getSidebarAd($connect, $lang);

// Social Media Links
$socialMedia = getSocialMedia($connect);

// Get user info
if (isLogged()){

$userInfo = getUserInfo($connect);

}

// Default Pages
$defaultSearchPage = getDefaultPage($connect, $settings['st_defaultsearchpage'], $lang);
$defaultPropertiesPage = getDefaultPage($connect, $settings['st_defaultpropertiespage'], $lang);
$defaultContactPage = getDefaultPage($connect, $settings['st_defaultcontactpage'], $lang);
$defaultBlogPage = getDefaultPage($connect, $settings['st_defaultblogpage'], $lang);
$defaultPrivacyPage = getDefaultPage($connect, $settings['st_defaultprivacypage'], $lang);
$defaultTermsPage = getDefaultPage($connect, $settings['st_defaulttermspage'], $lang);
$defaultServicesPage = getDefaultPage($connect, $settings['st_defaultservicespage'], $lang);
$defaultCertificatesPage = getDefaultPage($connect, $settings['st_defaultcertificatespage'], $lang);

define('SEARCH_PAGE', isset($defaultSearchPage['tr_slug'])?$defaultSearchPage['tr_slug']:NULL);
define('PROPERTIES_PAGE', isset($defaultPropertiesPage['tr_slug'])?$defaultPropertiesPage['tr_slug']:NULL);
define('CONTACT_PAGE', isset($defaultContactPage['tr_slug'])?$defaultContactPage['tr_slug']:NULL);
define('BLOG_PAGE', isset($defaultBlogPage['tr_slug'])?$defaultBlogPage['tr_slug']:NULL);
define('PRIVACY_PAGE', isset($defaultPrivacyPage['tr_slug'])?$defaultPrivacyPage['tr_slug']:NULL);
define('TERMS_PAGE', isset($defaultTermsPage['tr_slug'])?$defaultTermsPage['tr_slug']:NULL);
define('SERVICES_PAGE', isset($defaultServicesPage['tr_slug'])?$defaultServicesPage['tr_slug']:NULL);
define('CERTIFICATES_PAGE', isset($defaultCertificatesPage['tr_slug'])?$defaultCertificatesPage['tr_slug']:NULL);

// Maintenance Mode
$maintenanceMode = $settings['st_maintenance'];

$urlPath = new Routes();

if (isLogged()) {

if ($maintenanceMode == 1 && !isAdmin() && basename($_SERVER['PHP_SELF']) != 'offline.php') {

	header('Location: '. $urlPath->offline());
}

}elseif($maintenanceMode == 1 && basename($_SERVER['PHP_SELF']) != 'offline.php') {

	header('Location: '. $urlPath->offline());
}


?>