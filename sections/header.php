<?php

// Get Menu Header

$headerMenu = getHeaderMenu($connect, $lang);

$navigationHeader = getNavigation($connect, isset($headerMenu['menu_id'])?$headerMenu['menu_id']:NULL, $lang);

// Get Header Style

if ($theme['th_headerstyle'] == 'header1') {

	require './sections/views/header-1.view.php';

}elseif ($theme['th_headerstyle'] == 'header2') {
	
	require './sections/views/header-2.view.php';
}

?>