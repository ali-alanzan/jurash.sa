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

$certificate_name = cleardata($_POST['certificate_name']);
$certificate_status = cleardata($_POST['certificate_status']);

$certificate_image = $_FILES['certificate_image']['tmp_name'];

$imagefile = explode(".", $_FILES["certificate_image"]["name"]);
$renamefile = round(microtime(true)) . '.' . end($imagefile);

$image_upload = '../../images/';

move_uploaded_file($certificate_image, $image_upload . 'certificate_' . $renamefile);

$statment = $connect->prepare("INSERT INTO certificates (certificate_id, certificate_name, certificate_image, certificate_status) VALUES (null, :certificate_name, :certificate_image, :certificate_status)");

$statment->execute(array(
':certificate_name' => $certificate_name,
':certificate_image' => 'certificate_' . $renamefile,
':certificate_status' => $certificate_status
));

header('Location: ./certificates.php');


}

require '../views/new.certificate.view.php';

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