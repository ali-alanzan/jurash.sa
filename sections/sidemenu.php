<?php

// Get Menu Header

$headerMenu = getHeaderMenu($connect, $lang);

$navigationHeader = getNavigation($connect, isset($headerMenu['menu_id'])?$headerMenu['menu_id']:NULL, $lang);

require './sections/views/sidemenu.view.php';

?>