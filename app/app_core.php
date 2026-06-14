<?php

require '../config.php';
require '../routes.php';
require './app_functions.php';

$connect = connect();

// Site Configuration
$settings = getSettings($connect);

// Theme Configuration
$theme = getTheme($connect);

// Get Languages
$getLanguages = getLanguages($connect);

// Get Language
$lang = checkLanguage(getParamsLang());

// Get Translation
$translation = getStrings($connect, $settings['st_language'], $lang);

// Get General Settings
$currency = $settings['st_currency'];
$unit = $settings['st_unit'];

// Default Pages
$defaultSearchPage = getDefaultPage($connect, $settings['st_defaultsearchpage'], $lang);
$defaultPropertiesPage = getDefaultPage($connect, $settings['st_defaultpropertiespage'], $lang);
$defaultContactPage = getDefaultPage($connect, $settings['st_defaultcontactpage'], $lang);
$defaultBlogPage = getDefaultPage($connect, $settings['st_defaultblogpage'], $lang);
$defaultPrivacyPage = getDefaultPage($connect, $settings['st_defaultprivacypage'], $lang);
$defaultTermsPage = getDefaultPage($connect, $settings['st_defaulttermspage'], $lang);

define('SEARCH_PAGE', isset($defaultSearchPage['tr_slug'])?$defaultSearchPage['tr_slug']:NULL);
define('PROPERTIES_PAGE', isset($defaultPropertiesPage['tr_slug'])?$defaultPropertiesPage['tr_slug']:NULL);
define('CONTACT_PAGE', isset($defaultContactPage['tr_slug'])?$defaultContactPage['tr_slug']:NULL);
define('BLOG_PAGE', isset($defaultBlogPage['tr_slug'])?$defaultBlogPage['tr_slug']:NULL);
define('PRIVACY_PAGE', isset($defaultPrivacyPage['tr_slug'])?$defaultPrivacyPage['tr_slug']:NULL);
define('TERMS_PAGE', isset($defaultTermsPage['tr_slug'])?$defaultTermsPage['tr_slug']:NULL);

$urlPath = new Routes();

?>