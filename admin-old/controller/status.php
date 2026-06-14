<?php

/*--------------------*/
// Description: Agencya - Real Estate CMS
// Author: Agencya
// Author URI: https://getagencya.com
/*--------------------*/

session_start();

require '../../config.php';
require '../functions.php';
require '../admin_config.php';
require '../views/header.view.php';

if (isset($_SESSION['user_email'])){

$connect = connect($database);
if(!$connect){

header('Location: ./error.php');

}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$status = get_all_status($connect, $config['items_page']);
$languages = get_status_languages($connect);
$activelanguages = get_active_languages($connect);
$number_pages = totalStatus($connect, $config['items_page']);

require '../views/status.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';

}else{
	
	header('Location: ./login.php');	

}


?>