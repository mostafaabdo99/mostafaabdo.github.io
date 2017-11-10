<?
/*******************************************************************************
- Alarbcoin v 0.5.1
- Programmed By Abdelali Hboub
*******************************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<link rel="stylesheet" type="text/css" href="../themes/css/fonts.css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Alarbcoin v 0.5.1 | Installation</title>
<style>
*{margin:0; padding:0;outline:0;}
body{ background-color:#FFFFFF;
	color:#191919;
}
.spacer{
	clear:both;
}
#header{
	padding-left:20px;
	height:160px;
	color:#FFFFFF;
	border-bottom:2px groove #fff;
	background: #191919 url(../themes/img/logo1.png) top left no-repeat;
    font-family: 'Open Sans', sans-serif;
	font-size:12px;
}
#content{
	min-height:570px;
    font-family: 'Open Sans', sans-serif;
	font-size:12px;
	padding:6px;
}
input, #content textarea, #content a{
	text-align:left;
	background: #191919;
	opacity:.8;
	border:1px solid #E4E4E4;
	padding:6px;
	color:#FFFFFF;
    font-family: 'Open Sans', sans-serif;
	font-size:12px;
	text-decoration:none;
}
#footer{
	border-top:2px groove #fff;
	background: #191919;
	color:#FFFFFF;
	position:absolute;
	bottom:0;
    font-family: 'Open Sans', sans-serif;
	font-size:12px;
	width:100%;
}

</style>
</head>

<body>
<div id="header" align="left"><br /><br /><br /><br /><br />Alarbcoin <br />v 0.5.1</div>
<div id="content">

<div align="center">
<br /><br /><br />

<?
if($_REQUEST['step'] == '5'){
 echo '
	  <p align="left"><b>Successful installation</b><br />
	  Your installation has finished successfully!<br>
	  Please delete the install folder to avoid re-installing the script
	  </p>
	  <br /><br />
	  <a id="content" href="../admincoin/index.php">Control Board</a> - 
	  <a id="content" href="../index.php">Home</a>
	  ';
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
	  exit();		
}
if($_REQUEST['step'] == '4'){


$sname      = strip_tags($_POST['sname']);	
$surl       = strip_tags($_POST['surl']);
$smail      = strip_tags($_POST['smail']);	
$sdesc       = strip_tags($_POST['sdesc']);
$stags      = strip_tags($_POST['stags']);
$coin_sitecopyright      = 'ALL RIGHTS RESERVED © 2017';
$coin_sitestatus      = 1;
$coin_sitergister      = 1;
$coin_register_active      = 1;
$coin_sitetextstartus      = 'Site is close';
if(isset($_POST['do']) and $_POST['do'] == 'save')
	{
		include("../coin_config/config.php");
	$update = mysqli_query($conn,"
	INSERT INTO `coin_setting` (`coin_sitename`,`coin_siteurl`,`coin_siteemail`,`coin_sitedsc`,`coin_sitekey`,`coin_sitecopyright`,`coin_sitestatus`,`coin_sitergister`,`coin_sitetextstartus`,`coin_register_active`)
	VALUES ('$sname','$surl','$smail','$sdesc','$stags','$coin_sitecopyright','$coin_sitestatus','$coin_sitergister','$coin_sitetextstartus','$coin_register_active') 
			") or die(mysql_error());
		if(isset($update))
		{
			echo '<p align="center">Site settings added</p><br /><br />
			<a id="content" href="'.$_SERVER['PHP_SELF'].'?step=5">Next Step</a>
			';
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
			exit();
		}
	}
echo "
<form action='".$_SERVER['PHP_SELF']."?step=4' method='post'>
	<table align='center' cellpadding='10' cellspacing='0' width='100%'>
    	<tr>
        	<td colspan='2' align='center' class='tblhed'>Site settings<hr></td>
        </tr>
        <tr class='tbl1'>
        	<td class='tbl1'>Website name</td>
            <td><input type='text' name='sname' /></td>
        </tr>
        <tr class='tbl2'>
        	<td>Website link</td>
            <td><input type='text' name='surl' /></td>
        </tr>
        <tr class='tbl1'>
        	<td>Email Official</td>
            <td><input type='text' name='smail' /></td>
        </tr>
        <tr class='tbl2'>
        	<td>Site Description</td>
            <td><textarea name='sdesc' rows='5' cols='40'></textarea></td>
        </tr>
        <tr class='tbl1'>
        	<td>key words</td>
            <td><textarea name='stags' rows='5' cols='40'></textarea></td>
        </tr>
 <tr class='tbl2'>
        	<td colspan='2' align='center'>
            	<input type='submit' value='add' /><input type='reset' value='Reset' />
            </td>
        </tr>
    </table>
	<input type='hidden' name='do' value='save' />
	</form>
	

";
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
exit();
}


	
if($_REQUEST['step'] == '3'){
		include("../coin_config/config.php");
		include("../coin_config/connection.php");
echo '
	  <p align="left"><b>Third Step</b><hr><br />
	  administration
	  </p><hr><br />
	  ';
	  
$post_email = mysqli_real_escape_string($conn,$_POST['email']);
$post_pass = mysqli_real_escape_string($conn,md5($_POST['pass']));

	 
if($_POST){
$post_btc = 'XXX';
$balance = 0;
$active = 1;
$level = 4;
$p_salt = rand_string(20); 
$site_salt = "alarbcoin"; 
$salted_hash = hash('sha256', $post_pass.$site_salt.$p_salt);
$referral = 0; 
if(isset($_POST['add']) && $_POST['add'] == 'admin'){

	 $insertQuery = "INSERT INTO coin_users(id,email,wallet,password,level,balance,referred_by,sha256,active,date_ve,date_reg) 
VALUES('','$post_email','$post_btc','$salted_hash','$level','$balance','$referral','$p_salt','$active',NOW(),NOW())";
$result = mysqli_query($conn,$insertQuery); 

	if(isset($result)){
			echo '<p align="center">Admin information successfully added</p><br /><br />
			<a id="content" href="'.$_SERVER['PHP_SELF'].'?step=4">Next Step</a>
			';
			exit();
		}	
	}
}	
?>
<div align="center" style="width:50%;" >
<div align="center" style="width:100%;border:0px solid #000;" >
<form align="center" action="<? echo $_SERVER['PHP_SELF']."?step=3"; ?>" method="POST">
<div style="width:30%;border:0px solid #000;float:left;padding:15px;text-align:left;" >
Email: 
</div>
<div style="width:40%;border:0px solid #000;float:left;padding:15px;text-align:left;" >
<input style="border:1px solid #191919;" type="email" name="email" />
</div>
<br /><br />
<div style="width:30%;border:0px solid #000;float:left;padding:15px;text-align:left;" >
Password: 
</div>
<div style="width:40%;border:0px solid #000;float:left;padding:15px;text-align:left;" >
<input  style="border:1px solid #191919;" type="password" name="pass" />
</div><br /><br /><br /><br /><br /><br /><br /><br />
<div style="width:90%;border:0px solid #000;" >
<input type="submit" value="Add Admin" />
<input type="hidden" name="add" value="admin" />
</div>
</form>
</div>
</div>

<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
exit();	  
}
if($_REQUEST['step'] == '2'){
	echo '
	  <p align="left"><b>Second Step</b><hr><br />
	  CREATE TABLE
	  </p>
	  ';
	  include("../coin_config/config.php");

	  
	 $mysql1a = mysqli_query($conn,"
CREATE TABLE `coin_advertising` (
  `ads1` text NOT NULL,
  `ads2` text NOT NULL,
  `ads3` text NOT NULL,
  `ads4` text NOT NULL,
  `ads5` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	 ") or die(mysqli_error($conn));
	 $mysql1b = mysqli_query($conn,"
INSERT INTO `coin_advertising` (`ads1`, `ads2`, `ads3`, `ads4`, `ads5`) VALUES
('advertising 1', 'advertising 2', 'advertising 3', 'advertising 4', 'advertising 5');
	 ") or die(mysqli_error($conn));
	 if($mysql1a AND $mysql1b){
	echo '<p align="left">CREATE TABLE Advertising</p><br />';	 
	}
  
	 $mysql2a = mysqli_query($conn,"
CREATE TABLE `coin_footer` (
  `tele` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Privacy` varchar(255) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `link3` varchar(255) NOT NULL,
  `title4` varchar(255) NOT NULL,
  `link4` varchar(255) NOT NULL,
  `title5` varchar(255) NOT NULL,
  `link5` varchar(255) NOT NULL,
  `title6` varchar(255) NOT NULL,
  `link6` varchar(255) NOT NULL,
  `title7` varchar(255) NOT NULL,
  `link7` varchar(255) NOT NULL,
  `title8` varchar(255) NOT NULL,
  `link8` varchar(255) NOT NULL,
  `title9` varchar(255) NOT NULL,
  `link9` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	 ") or die(mysqli_error($conn));
	 $mysql2b = mysqli_query($conn,"
INSERT INTO `coin_footer` (`tele`, `address`, `Privacy`, `title1`, `link1`, `title2`, `link2`, `title3`, `link3`, `title4`, `link4`, `title5`, `link5`, `title6`, `link6`, `title7`, `link7`, `title8`, `link8`, `title9`, `link9`) VALUES
('123-456-789', 'your address` here', 'http://localhost/alarbcoin/Pages7.html', 'Title Page 1', '#', 'Title Page 2', '#', 'Title Page 3', '#', 'Title Page 1', '#', 'Title Page 2', '#', 'Title Page 3', '#', 'Title Page 1', '#', 'Title Page 2', '#', 'Title Page 3', '#');
	 ") or die(mysqli_error($conn));
	 if($mysql2a AND $mysql2b){
	echo '<p align="left">CREATE TABLE Footer</p><br />';	 
	}	
	  
	 $mysql3a = mysqli_query($conn,"
CREATE TABLE `coin_options` (
  `Min_claim` int(11) NOT NULL,
  `Max_claim` int(11) NOT NULL,
  `Min_Withdraw` int(11) NOT NULL,
  `Refrral_commission` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

	 ") or die(mysqli_error($conn));
	 $mysql3b = mysqli_query($conn,"
INSERT INTO `coin_options` (`Min_claim`, `Max_claim`, `Min_Withdraw`, `Refrral_commission`, `time`) VALUES
(1, 100, 20000, 50, 15);
") or die(mysqli_error($conn));
	 if($mysql3a AND $mysql3b){
	echo '<p align="left">CREATE TABLE Footer</p><br />';	 
	}
	
	 $mysql4 = mysqli_query($conn,"
	 
CREATE TABLE `coin_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

") or die(mysqli_error($conn));
	 if($mysql4){
	echo '<p align="left">CREATE TABLE Pages</p><br />';	 
	}

	
	 $mysql5 = mysqli_query($conn,"
	 
CREATE TABLE `coin_referral` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `id_sponser` int(11) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

") or die(mysqli_error($conn));
	 if($mysql5){
	echo '<p align="left">CREATE TABLE Referral</p><br />';	 
	}


	
	 $mysql5 = mysqli_query($conn,"
	 
CREATE TABLE `coin_setting` (
  `coin_sitename` varchar(255) NOT NULL,
  `coin_siteurl` varchar(255) NOT NULL,
  `coin_siteemail` varchar(255) NOT NULL,
  `coin_sitedsc` text NOT NULL,
  `coin_sitekey` text NOT NULL,
  `coin_sitecopyright` text NOT NULL,
  `coin_sitestatus` int(1) NOT NULL,
  `coin_sitergister` int(1) NOT NULL,
  `coin_sitetextstartus` text NOT NULL,
  `coin_register_active` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

") or die(mysqli_error($conn));
	 if($mysql5){
	echo '<p align="left">CREATE TABLE Setting</p><br />';	 
	}
	  
	 $mysql6a = mysqli_query($conn,"
CREATE TABLE `coin_statistics` (
  `users` int(11) NOT NULL,
  `withdraw` varchar(255) NOT NULL,
  `calims` int(11) NOT NULL,
  `bitcoin` varchar(255) NOT NULL,
  `visitor` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

	 ") or die(mysqli_error($conn));
	 $mysql6b = mysqli_query($conn,"
INSERT INTO `coin_statistics` (`users`, `withdraw`, `calims`, `bitcoin`, `visitor`) VALUES
(0, '0', 0, '0', 0);
") or die(mysqli_error($conn));
	 if($mysql6a AND $mysql6b){
	echo '<p align="left">CREATE TABLE Statistic</p><br />';	 
	}


	
	 $mysql7 = mysqli_query($conn,"

CREATE TABLE `coin_users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `referred_by` int(11) NOT NULL DEFAULT '0',
  `commissions_ref` varchar(255) NOT NULL DEFAULT '0',
  `sha256` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `t_withdraw` varchar(255) NOT NULL DEFAULT '0',
  `date_ve` datetime NOT NULL,
  `date_reg` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

") or die(mysqli_error($conn));
	 if($mysql7){
	echo '<p align="left">CREATE TABLE Users</p><br />';	 
	}

	
	 $mysql8 = mysqli_query($conn,"

CREATE TABLE `coin_visitor` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(255) NOT NULL,
  `date_vi` datetime NOT NULL,
  `date_en` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

") or die(mysqli_error($conn));
	 if($mysql8){
	echo '<p align="left">CREATE TABLE Visitor</p><br />';	 
	}


	
	 $mysql9 = mysqli_query($conn,"

CREATE TABLE `coin_visitor_statis` (
  `id` int(11) NOT NULL auto_increment,
  `visitor` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

") or die(mysqli_error($conn));
	 if($mysql9){
	echo '<p align="left">CREATE TABLE Visitor Statis</p><br />';	 
	}


	
	 $mysql9 = mysqli_query($conn,"

CREATE TABLE `coin_withdraw` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `withdraw` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

") or die(mysqli_error($conn));
	 if($mysql9){
	echo '<p align="left">CREATE TABLE Withdraw</p><br />';	 
	}






	
	$mysqllast = mysqli_query($conn,"
CREATE TABLE `coin_claims` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `claim` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	") or die(mysqli_error($conn));
	if($mysqllast){
	echo '<p align="left">CREATE TABLE Claim</p><br />
	create all table complete<br /><br />
	<a id="content" href="'.$_SERVER["PHP_SELF"].'?step=3">Next step</a>
    ';
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
	exit();
	
	}
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?	
}

if($_REQUEST['step'] == '1'){
	  echo '
	  <p align="left"><b>First Step</b><br />
	  check file "config.php".
	  </p>
	  ';	
	  include("../coin_config/config.php");
	  if(isset($conn)){
	  echo '<p align="center">The file "config.php" was called <br />
	  Correct form Please make sure that the database data in this file is correct and that there are no errors</p><br />
	  <a id="content" href="'.$_SERVER["PHP_SELF"].'?step=2" ?>Next step</a>';
?>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY ALARBCOIN<br />
</div>
<?
	  }else{die("The database information in the wrong config.php file should be corrected");}
	  exit();
}else{echo 'Welcome to the Alarbcoin V0.5.1 script install page';}


?>
<form action="install.php" method="get" dir="ltr">

<style>
#text {
    border: 1px solid #ccc;
    padding: 5px;
    resize: both;
    overflow: auto;
    width : 500px;
	min-height : 100px;
}
</style><br />
<div id="text" style="text-align:left;" contenteditable="true">
<p style="text-align:center;"><b >Terms and conditions of use of the script</b></p><br />
<p>- The rights of the programmer should not be deleted</p>
<p>- The script should not be used for scam</p>
<p>- It should not be used in what angers God (لا يجب استخدامه في ما يغضب الله)</p>
<p>- It is prohibited to trade or use it to make money (script)</p>
<p>- You have full freedom to publish the script</p>
<p>- No problem in developing or modifying the script without deleting the rights</p>
<br /></div>

<br /><br />
</form>
<a id="content" href="<? echo $_SERVER['PHP_SELF']."?step=1" ?>">I have read the above terms and agree to them.... Next step</a>
</div>



<div class="spacer"></div>
</div>
<div id="footer" align="center"><br />
Alarbcoin v 0.5.1
<br />
Programmed By Abdelali Hboub
<br />
ALL RIGHTS RESERVED © 2017 | PRIVACY POLICY |POWERED BY <a style="text-decoration:none;color:#F3F781;" href="http://www.alarbcoin.com" >ALARBCOIN</a><br />
</div>
</body>
</html>