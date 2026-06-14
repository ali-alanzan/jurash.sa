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


$id = id_service($_GET['id']);

if ( empty($_GET["lang"]) && empty($_GET["id"]) ) {
	header('Location: ./home.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$id_service = id_service($_GET['id']); 
$oldlang = lang($_GET['lang']);
$lang = lang($_GET['to']);

$exists = check_service($connect, $id_service, $lang);


if (!$exists)
{

$service = get_service_per_id_by_language($connect, $id_service, $oldlang);

$service = $service['0'];

$sentence = $connect->prepare( "INSERT INTO tr_services (tr_id,tr_service,tr_lang,tr_description,tr_name) VALUES (null, :tr_service, :tr_lang, :tr_description, :tr_name)");

$sentence->execute(array(
		':tr_service' => $id_service,
		':tr_lang' => $lang,
		':tr_description' => $service['tr_description'],
		':tr_name' => $service['tr_name']

		));

header('Location: ./edit_service.php?lang='.$lang.'&id='.$id_service);

}else{

header('Location: ./edit_service.php?lang='.$oldlang.'&id='.$id_service);

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