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

$id_property = cleardata($_GET['id']);

if(!$id_property){
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2)
{
$id_property = cleardata($_GET['id']);

$statement = $connect->prepare('DELETE FROM sliders WHERE slider_id = :slider_id');

$statement->execute(array('slider_id' => $id_property));

// --------- Activity Log

$type ='slider';
$action ='deleted';
$item = $_GET['id'];
$log_user = $check_access['user_id'];

$logstatment = $connect->prepare(
		'INSERT INTO activity_log (log_id,log_date,log_user,log_type,log_action,log_item) VALUES (null, CURRENT_TIMESTAMP, :log_user, :log_type, :log_action, :log_item)'
		);

	$logstatment->execute(array(
		':log_user' => $log_user,
		':log_type' => $type,
		':log_action' => $action,
		':log_item' => $item
		));

// --------- Activity Log

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}

?>