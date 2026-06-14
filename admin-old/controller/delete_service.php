<?php 

/*--------------------*/
// Description: Agencya - Real Estate CMS
// Author: Agencya
// Author URI: https://getagencya.com
/*--------------------*/

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';
require '../views/header.view.php';


$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$id_service = cleardata($_GET['id']);

if(!$id_service){
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

$id_service = cleardata($_GET['id']);

$statement = $connect->prepare('DELETE FROM services WHERE service_id = :service_id');
$statement->execute(array('service_id' => $id_service));

$statement = $connect->prepare('DELETE FROM tr_services WHERE tr_service = :tr_service');
$statement->execute(array('tr_service' => $id_service));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}


?>