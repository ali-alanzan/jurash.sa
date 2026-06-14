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
	header ('Location: ./error.php');
	}

if ($_SERVER['REQUEST_METHOD'] != 'POST'){

$id = id_user($_GET['id']);
}
if ( $_SERVER['REQUEST_METHOD'] != 'POST' && empty($_GET["id"]) ) {
	header('Location: ./home.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$user_id = cleardata($_POST['user_id']);
	$user_name = cleardata($_POST['user_name']);
	$user_email = cleardata($_POST['user_email']);
	$user_phone = cleardata($_POST['user_phone']);
	$user_status = cleardata($_POST['user_status']);


	$password_save = $_POST['user_password_save'];
	$password = $_POST['user_password'];
	$encryptPass = hash('sha512', $password);


	if (empty($password)) {
		$password = $password_save;
	} else{
		
		$password = hash('sha512', $password);
	}

$statment = $connect->prepare(
	"UPDATE users SET user_id = :user_id, user_name = :user_name, user_email = :user_email, user_phone = :user_phone, user_status = :user_status, user_password = :user_password WHERE user_id = :user_id"
	);

$statment->execute(array(

		':user_id' => $user_id,
		':user_name' => $user_name,
		':user_email' => $user_email,
		':user_phone' => $user_phone,
		':user_status' => $user_status,
		':user_password' => $password,

		));

// header('Location: ' . $_SERVER['HTTP_REFERER']);
echo '<script>
    location = "'.$_SERVER['HTTP_REFERER'].'";
</script>';
exit;
}else{

$id_user = id_user($_GET['id']);

$usr = get_user_per_id($connect, $id_user);

    if (!$usr){
    header('Location: ./home.php');
}

$usr = $usr['0'];

require '../views/edit.user.view.php';

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