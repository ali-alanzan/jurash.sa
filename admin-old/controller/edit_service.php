<?php 
ob_start();
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
	header ('Location: ./error.php');
	}


$id = id_service($_GET['id']);

if ( empty($_GET["lang"]) && empty($_GET["id"]) ) {
	header('Location: ./home.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
   
	$service_id = cleardata($_POST['service_id']);
	$service_icon   = cleardata($_POST['service_icon']);
	$service_status = cleardata($_POST['service_status']);

	$imagefile = explode(".", $_FILES["service_image"]["name"]);

	$image_save = $_POST['service_image_save'];
	$service_image = $_FILES['service_image'];

	if (empty($service_image['name'])) {
		$service_image = $image_save;
	} else{
			$imagefile = explode(".", $_FILES["service_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$image_upload = '../../images/';
		move_uploaded_file($_FILES['service_image']['tmp_name'], $image_upload . 'service_' . $renamefile);
		$service_image = 'service_' . $renamefile;
	}

$statment = $connect->prepare("UPDATE services SET service_icon = :service_icon, service_status = :service_status, service_image = :service_image WHERE service_id = :service_id");

$statment->execute(array(
		':service_icon' => $service_icon,
		':service_status' => $service_status,
		':service_image' => $service_image,
		':service_id' => $service_id

		));

	$tr_service = cleardata($_POST['tr_service']);
	$tr_id = cleardata($_POST['tr_id']);
	$tr_lang = cleardata($_POST['tr_lang']);
	$tr_name = $_POST['tr_name'];
	$tr_description = $_POST['tr_description'];

$sentence = $connect->prepare("UPDATE tr_services SET tr_name = :tr_name, tr_description = :tr_description WHERE tr_id = :tr_id AND tr_lang = :tr_lang AND tr_service = :tr_service");

$sentence->execute(array(

		':tr_name' => $tr_name,
		':tr_id' => $tr_id,
		':tr_lang' => $tr_lang,
		':tr_service' => $tr_service,
		':tr_description' => $tr_description
		));


header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_service = id_service($_GET['id']);

$lang = lang($_GET['lang']);

$service = get_service_per_id_by_language($connect, $id_service, $lang);

    if (!$service){
    header('Location: ./home.php');
}

$service = $service['0'];

$languages = get_languages_by_service($connect, $id_service);
$activelanguages = get_languages_not_services($connect, $id_service);

require '../views/edit.service.view.php';

}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>