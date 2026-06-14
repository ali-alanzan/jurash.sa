<?php

// Get Menu Footer

$footermenu = getFooterMenu($connect, $lang);

$navigationFooter = getNavigation($connect, isset($headerMenu['menu_id'])?$headerMenu['menu_id']:NULL, $lang);

require './sections/views/footer.view.php';

?>