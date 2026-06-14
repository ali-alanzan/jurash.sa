<?php

/*--------------------*/
// Description: Agencya - Real Estate CMS
// Author: Agencya
// Author URI: https://getagencya.com
/*--------------------*/

session_start();

require '../../config.php';
require '../admin_config.php';
require '../functions.php';
require '../views/header.view.php';

if (isset($_SESSION['user_email'])){

$connect = connect($database);
if(!$connect){

header('Location: ./error.php');

}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$subscribers = get_all_subscribers($connect, $config['items_page']);
$number_total = totalsubscribers($connect, $config['items_page']);

require '../views/subscribers.view.php';

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';

}else{
	
	header('Location: ./login.php');	

}


?>