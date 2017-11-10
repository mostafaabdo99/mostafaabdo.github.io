<?php @ob_start();
  @session_start();
require_once("coin_config/config.php");
require_once("coin_config/connection.php");
require_once("coin_config/global.php");

$fix_page ='index';

include(''.check_files.'/'.Fristcoin.'');
 
$id_user = intval(userid());
$date = @date(" Y-m-d H:i:s");
$update = mysqli_query($conn,"UPDATE coin_users SET date_ve ='$date' WHERE id ='$id_user' ");

if(isset($update)){


//Destroy entire session
unset($_SESSION['email']);
unset($_SESSION['Password']);
unset($_SESSION['Session_user256']);
@session_destroy ();

	echo'<div align="center" style="height:500px;padding:250px;font-size:18px;" >
	<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Logout successfully completed
	</div>';
echo'<meta http-equiv="refresh" content="2; url='.$siteurl.'" />';


}

 include(''.check_files.'/'.Lastcoin.'');
?>

