<?
require_once("coin_config/config.php");
require_once("coin_config/connection.php");
require_once("coin_config/global.php");

$pagename = make_safe($_REQUEST[email]);

if(isset($pagename)){
 $title=mysqli_real_escape_string($conn,$_REQUEST["email"]);
 $result=mysqli_query($conn,"SELECT * FROM coin_users where email='$title'");
 $found=mysqli_num_rows($result);
 $row=mysqli_fetch_array($result);
 
 if($found == 1){

$useremailq = $row['email'];
$emailcodeq = base64_encode($useremailq); 

//============================================
    $to = $row['email'];
    $subject = 'Password Recovery';
    $header = "From: \"".$sitename."\"<".$siteemail."> \n";
   // محتوى الرسالة يتضمن رابط تفعيل العضوية
    $message = "This notice is for a new payment request :\n\n";
    $message .= $siteurl."/index.php?coin=Activate&key=Forgot&Email=".$emailcodeq."\n\n";
    $message .= '<br/><br/>This message for Recovery your password';
//==========================================================================================================
    @mail($to, $subject, $message, $header);

   echo '<font color="green" >Password recovery message sent successfully</font>';

   //===============***************************  
}else{

   echo '<font color="red" >This mail is not on our list</font>';
 }
 // ajax search
 }
?>