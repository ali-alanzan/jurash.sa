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

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

	$service_icon   = cleardata($_POST['service_icon']);

	$service_image = $_FILES['service_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["service_image"]["name"]);

	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$image_upload = '../../images/';

	move_uploaded_file($service_image, $image_upload . 'service_' . $renamefile);

	$statment = $connect->prepare(
		"INSERT INTO services (service_id, service_icon, service_image,service_status) VALUES (null, :service_icon, :service_image, 1)"
		);

	$statment->execute(array(
		':service_icon' => $service_icon,
		':service_image' => 'service_' . $renamefile

		));

$statment = $connect->prepare('SELECT @@identity AS id');
$statment->execute();
$row = $statment->fetch(PDO::FETCH_ASSOC);
$id = $row["id"];

$tr_lang = cleardata($_POST['tr_lang']);
$tr_name = cleardata($_POST['tr_name']);
$tr_description = cleardata($_POST['tr_description']);

$sentence = $connect->prepare("INSERT INTO tr_services (tr_id,tr_service,tr_lang,tr_name,tr_description) VALUES (null, :tr_service, :tr_lang, :tr_name, :tr_description)");

$sentence->execute(array(
		':tr_service' => $id,
		':tr_lang' => $tr_lang,
		':tr_name' => $tr_name,
		':tr_description' => $tr_description

		));
// print_r($sentence);die();
	header('Location: ./services.php');

}

$languages = get_active_languages($connect);

require '../views/new.service.view.php';

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>