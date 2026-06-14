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

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$languages = get_conditions_languages($connect);
$conditions = get_all_conditions($connect, $config['items_page']);
$number_pages = totalConditions($connect, $config['items_page']);
$activelanguages = get_active_languages($connect);

require '../views/conditions.view.php';

}else{

	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';

}else{
	
	header('Location: ./login.php');	

}


?>