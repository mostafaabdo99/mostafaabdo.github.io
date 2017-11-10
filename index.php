<?php @ob_start();
  @session_start();
require_once("coin_config/config.php");
require_once("coin_config/connection.php");
require_once("coin_config/global.php");
date_default_timezone_set('Europe/London');
if(strpos($dlinks, 'coin') == TRUE){}else{exit();}
if($sitestatus == 2){
	
?>
<style>
body {
  background: #FFFFFF; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #FFFFFF, #8DC26F);
  background: -moz-linear-gradient(right, #FFFFFF, #8DC26F);
  background: -o-linear-gradient(right, #FFFFFF, #8DC26F);
  background: linear-gradient(to left, #FFFFFF, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<?	
	echo'<div align="center" style="height:200px;padding:250px;font-size:18px;color:#000000;" >
	'.$sitetextstartus.'
	</div>';
	
exit();}

$fix_page ='index';
$sqltotale = mysqli_query($conn, "SELECT * FROM coin_statistics");
$row22w = mysqli_fetch_assoc($sqltotale); 
$tt_users = $row22w['users'];
$tt_withdraw = $row22w['withdraw'];
$tt_claims = $row22w['calims'];
$tt_bitcoin = $row22w['bitcoin'];
$tt_visitor = $row22w['visitor'];
$allvisitor = $tt_visitor+1;
$ip_address = getUserIP();
$sqlvisitor = mysqli_query($conn, "SELECT * FROM coin_visitor WHERE ip='$ip_address'");
$ipnum = mysqli_num_rows($sqlvisitor);
$rowvv = mysqli_fetch_assoc($sqlvisitor); 
$date_vi = $rowvv['date_vi']; 
$time_date_vi =@strtotime($date_vi);
$date_timer_v = $time_date_vi+5*60;
$datenowv = time();

$sqlvisitorDay = mysqli_query($conn, "SELECT * FROM coin_visitor_statis WHERE date order by date DESC LIMIT 1");
$drow = mysqli_fetch_array($sqlvisitorDay);
$lastdate = $drow['date'];
$vid = $drow['id'];
$visitorDayv = $drow['visitor'];
$tmienow = @strtotime(date("Y-m-d"));
$lasttime = @strtotime($drow['date']);
$lasttime24 = $lasttime+24*60*60;

if($ipnum == 1 AND $datenowv >= $date_timer_v){
	
mysqli_query($conn,"UPDATE coin_visitor SET date_vi=NOW()") or die(mysqli_error($conn));	

}elseif($ipnum == 0){
	
mysqli_query($conn,"UPDATE coin_statistics SET visitor='$allvisitor' ") or die(mysqli_error($conn));	
$insertvisitor = "INSERT INTO coin_visitor(id,ip,date_vi,date_en) 
VALUES('','$ip_address',NOW(),NOW())";
mysqli_query($conn,$insertvisitor) or die(mysqli_error($conn)); 

if($lasttime24 > $tmienow){
$vDay = $visitorDayv+1;
mysqli_query($conn,"UPDATE coin_visitor_statis SET visitor='$vDay' WHERE id='$vid'") or die(mysqli_error($conn));	
}else{
	
$visitorDay = 1;	
$insertvisitor2 = "INSERT INTO coin_visitor_statis(id,visitor,date) 
VALUES('','$visitorDay',NOW())";
mysqli_query($conn,$insertvisitor2) or die(mysqli_error($conn)); 	
}

}
$slqads = mysqli_query($conn, "SELECT * FROM coin_advertising");
$adsr = mysqli_fetch_array($slqads);
$ads1 = $adsr['ads1'];
$ads2 = $adsr['ads2'];
$ads3 = $adsr['ads3'];
$ads4 = $adsr['ads4'];
$ads5 = $adsr['ads5'];


$sqloption = mysqli_query($conn, "SELECT * FROM coin_options");
$orow = mysqli_fetch_assoc($sqloption); 
$minReward = $orow['Min_claim'];
$maxReward = $orow['Max_claim'];
$wminimum = $orow['Min_Withdraw'];
$Commission = $orow['Refrral_commission'];
$timer = $orow['time'];

$urlsafe = make_safe($_REQUEST[coin]);

include(''.check_files.'/'.Fristcoin.'');
switch ($urlsafe) {
 
 case "":
 include(''.check_files.'/'.namefiles.'.php');
 break;
 
 case "Referral":
 include(''.check_files.'/'.namefiles.'.php');
 break; 
 
 case "Withdraw":
 include(''.check_files.'/'.namefiles.'.php');
 break; 
 
 case "Profile":
 include(''.check_files.'/'.namefiles.'.php');
 break;
   
 case "Pages":
 include(''.check_files.'/'.namefiles.'.php');
 break;
     
 case "Forgot":
 include(''.check_files.'/'.namefiles.'.php');
 break;
  
 
 case "Activate":
 include(''.check_files.'/'.namefiles.'.php');
 break;
  
  default:
         head(index);
     break;
}
 include(''.check_files.'/'.Lastcoin.'');
?>