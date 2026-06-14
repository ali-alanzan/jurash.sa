<?php 

/*--------------------*/
// Description: Agencya - Real Estate CMS
// Author: Agencya
// Author URI: https://getagencya.com
/*--------------------*/

require '../config.php';
require './functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){

    header('Location: ./controller/home.php');

}else{
    
    header('Location: ./controller/login.php');
}



?>