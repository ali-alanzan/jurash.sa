<?php

/*--------------------*/
// Description: Agencya - Real Estate CMS
// Author: Agencya
// Author URI: https://getagencya.com
/*--------------------*/

session_start();

require '../../config.php';
require '../functions.php';
require '../views/header.view.php';
require '../admin_config.php';

if (isset($_SESSION['user_email'])){

$connect = connect($database);
if(!$connect){

header('Location: ./error.php');

}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$cities = get_all_cities($connect, $config['items_page']);
$number_pages = totalCities($connect, $config['items_page']);
$activelanguages = get_active_languages($connect);
$languages = get_cities_languages($connect);

require '../views/cities.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';

}else{
	
	header('Location: ./login.php');	

}


?>