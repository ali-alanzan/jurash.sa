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


$id = id_certificate($_GET['id']);

if ( empty($_GET["id"]) ) {
	header('Location: ./home.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$certificate_id = cleardata($_POST['certificate_id']);
	$certificate_name = cleardata($_POST['certificate_name']);
	$certificate_status = cleardata($_POST['certificate_status']);

	$imagefile = explode(".", $_FILES["certificate_image"]["name"]);

	$image_save = $_POST['certificate_image_save'];
	$certificate_image = $_FILES['certificate_image'];

	if (empty($certificate_image['name'])) {
		$certificate_image = $image_save;
	} else{
			$imagefile = explode(".", $_FILES["certificate_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$image_upload = '../../images/';
		move_uploaded_file($_FILES['certificate_image']['tmp_name'], $image_upload . 'certificate_' . $renamefile);
		$certificate_image = 'certificate_' . $renamefile;
	}

$statment = $connect->prepare("UPDATE certificates SET certificate_id = :certificate_id, certificate_name = :certificate_name, certificate_status = :certificate_status, certificate_image = :certificate_image WHERE certificate_id = :certificate_id");

$statment->execute(array(

		':certificate_id' => $certificate_id,
		':certificate_name' => $certificate_name,
		':certificate_status' => $certificate_status,
		':certificate_image' => $certificate_image
		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_certificate = id_certificate($_GET['id']);

$certificate = get_certificate_per_id($connect, $id_certificate);

    if (!$certificate){
    header('Location: ./home.php');
}

$certificate = $certificate['0'];

require '../views/edit.certificate.view.php';

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