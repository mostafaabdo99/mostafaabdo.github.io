<?@ob_start();
  @session_start();
require_once("../coin_config/config.php");
require_once("../coin_config/connection.php");
require_once("../coin_config/global.php");
?>
<style>
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<?
$post_password = mysqli_real_escape_string($conn,md5($_POST['password']));
$post_email = mysqli_real_escape_string($conn,$_POST['email']);


if(isset($_POST['login'])){

$sqlcoinuser1 = mysqli_query($conn,"SELECT * FROM coin_users WHERE email='$post_email'") or die(mysqli_error());
$rowemail1 = mysqli_num_rows($sqlcoinuser1);  


if($rowemail1 == 1){
$row = mysqli_fetch_array($sqlcoinuser1);
     $sha256 = $row['sha256'];
     $site_salt2="alarbcoin"; 
     $salted_hash2 = hash('sha256', $post_password.$site_salt2.$sha256);
$sqlcoinuser2 = mysqli_query($conn,"SELECT * FROM coin_users WHERE password='$salted_hash2'") or die(mysqli_error());
$rowemail2 = mysqli_num_rows($sqlcoinuser2);  
if($rowemail2 == 1 AND $row['level'] == 4){
	
	
	$_SESSION['Session_user256'] = $sha256;
	$_SESSION['email'] = $post_mail;
	$_SESSION['Password'] = $post_password;
	
	 echo'<div align="center" style="height:200px;padding:250px;font-size:18px;color:#FFFFFF;" ><p>Logged in successfully</p></div>';	

	 
}else{
	
	 echo'<div align="center" style="height:200px;padding:250px;font-size:18px;color:#FFFFFF;" ><p>The password is incorrect</p></div>';
	 
}	

}else{
	
	 echo'<div align="center" style="height:200px;padding:250px;font-size:18px;color:#FFFFFF;" ><p>This e-mail address does not exist</p></div>';	
}

	 echo'<meta http-equiv="refresh" content="2; url='.$siteurl.'/admincoin/index.php" />';	 
}

?>