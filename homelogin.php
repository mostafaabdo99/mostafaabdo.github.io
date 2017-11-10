<?
require_once("coin_config/config.php");
require_once("coin_config/connection.php");
require_once("coin_config/global.php");
?>
<style>
/* Style inputs with type="text", select elements and textareas */
input[type=text],input[type=email],input[type=password] ,select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container2 {
    border-radius: 5px;
    background-color: #333;
    padding: 20px;
}
.hrefpass a{
  color:#FFFFFF;	
  text-decoration: none;	
}
.hrefpass a:hover{
  color:#4caf50;	
	
}
</style>
<?
$urlvalue = make_safe($_REQUEST[value]);
if($urlvalue=='order1'){
?>

<div class="container2" style="width:70%;">
<div>
  <form  method="POST" action="<?=$siteurl?>/index.php">

    <label for="fname">Address Email</label>
    <input type="text" id="fname" name="mail" placeholder="Address Email..">

    <label for="lname">Password</label>
    <input type="Password" id="lname" name="pass" placeholder="Password..">

    <input type="submit" value="Submit" >
    <input type="hidden" value="LGN" name="login" >
	<br/>
	<br/>
    <label class="hrefpass"><a href="<?=$siteurl?>/Forgot">Forgot Your Password?</a></label>
  </form>
</div>
</div>

<?
}elseif($urlvalue=='order2'){

if($sitergister == 2){
	
?>
<style>
body {
  background: #FFFFFF; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #FFFFFF, #FFFFFF);
  background: -moz-linear-gradient(right, #FFFFFF, #FFFFFF);
  background: -o-linear-gradient(right, #FFFFFF, #FFFFFF);
  background: linear-gradient(to left, #FFFFFF, #FFFFFF);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<?	
	echo'<div align="center" style="height:50px;padding:10px;font-size:18px;color:red;" >
	<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Sign up has been suspended. Please return later
	</div>';
	
exit();}
	
?>
<div class="alert withe">
<div class="container2" style="width:70%;">
<div>
  <form method="POST" action="<?=$siteurl?>/index.php">

    <label for="fname">Address Email</label>
    <input type="email" id="fname" name="email" placeholder="Address Email..">

    <label for="fname">Address Bitcoin</label>
    <input type="text" id="fname" name="bitcoin" placeholder="Wallet..">

    <label for="lname">Password</label>
    <input type="Password" id="lname" name="password" placeholder="Password..">

    <label for="lname">R-Password</label>
    <input type="Password" id="lname" name="rpassword" placeholder="Password..">

    <input type="submit" value="Submit" >
    <input type="hidden" value="RGT" name="register" >

  </form>
</div>
</div>
<br/> 
</div>
<?
}
?>