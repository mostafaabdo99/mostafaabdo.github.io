<?
if($fix_page){}else{echo'<meta http-equiv="refresh" content="0; url=index.php" />';exit();}

?>
<!DOCTYPE HTML>
<html>
<head>
<title><?=$sitename?> | Control Board</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src='<?=$siteurl?>/themes/js/jquery.timeago.js'></script>
<script src='js/morris.js'></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>



   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="index.php"><img src="<?=$siteurl?>/themes/img/logo1.png" alt="<?=$sitename?>" width="150" ></a></h1>
							</div>
					<div class="w3layouts-left">
							
							<!--search-box-->
								<div class="w3-search-box">
									<form action="#" method="post">
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="w3layouts-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
<?
$sqlwall1 = mysqli_query($conn,"SELECT * FROM `coin_withdraw` WHERE  id AND status= 0");
$numm = mysqli_num_rows($sqlwall1);

?>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="badge"><?=$numm?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have <?=$numm?> pending Withdraw</h3>
												</div>
											</li>
<?
$sqlwall2 = mysqli_query($conn,"SELECT * FROM `coin_withdraw` WHERE status= 0 ORDER BY `coin_withdraw`.`date` DESC LIMIT 5");
while($frow2w = mysqli_fetch_array($sqlwall2)){
$uidw2 = $frow2w['uid'];
$date_ww = $frow2w['date'];
$reff2 = $uidw2 + 5000;	
	
?>
<script type="text/javascript">
   jQuery(document).ready(function() {
     $("time.timeagow").timeago();
   });
</script>  
											<li><a href="#">
											   <div class="user_img"><img src="images/in4.png" alt=""></div>
											   <div class="notification_desc">
												<p>ID USER : <?=$reff2?></p>
												<p><span>
												<time class="timeagow" datetime="<?=$date_ww?>"><?=$date_ww?></time>
												</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li>
<?
}
?>
												<div class="notification_bottom">
													<a href="index.php?coin=Withdraw&order=pending">See all pending Withdraw</a>
												</div> 
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">0</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 0 new notification</h3>
												</div>
											</li>
<!--
											 <li><a href="#">
												<div class="user_img"><img src="images/in7.jpg" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 -->
											 <li>
												<div class="notification_bottom">
													<a href="#">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">0</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 0 pending tasks</h3>
												</div>
											</li>
<!--
											<li><a href="#">
												<div class="task-info">
													<span class="task-desc">Database update</span><span class="percentage">40%</span>
													<div class="clearfix"></div>	
												</div>
												<div class="progress progress-striped active">
													<div class="bar yellow" style="width:40%;"></div>
												</div>
											</a></li>
-->
											<li>
												<div class="notification_bottom">
													<a href="#">See all pending tasks</a>
												</div> 
											</li>
										</ul>
									</li>	
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							
							<div class="clearfix"> </div>				
						</div>
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/in4.png" alt=""> </span> 
												<div class="user-name">
													<p>ADMIN</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="index.php?coin=Setting"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="<?=$siteurl?>/Profile" target="_blank"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->