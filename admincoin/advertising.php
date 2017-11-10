<?
if($fix_page){}else{echo'<meta http-equiv="refresh" content="0; url=index.php" />';exit();}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><font color="blue">Advertising</font></li>
</ol>
 	<div class="grid-form">
<!----->
<div class="grid-form1">
<?
$slqads = mysqli_query($conn, "SELECT * FROM `coin_advertising`")or die(mysqli_error($conn));
$adsr = mysqli_fetch_array($slqads);
$place1 = $adsr['ads1'];
$place2 = $adsr['ads2'];
$place3 = $adsr['ads3'];
$place4 = $adsr['ads4'];
$place5 = $adsr['ads5'];


if(isset($_POST['ads'])){

$post_ads1 = mysqli_real_escape_string($conn,$_POST['uplace1']);
$post_ads2 = mysqli_real_escape_string($conn,$_POST['uplace2']);
$post_ads3 = mysqli_real_escape_string($conn,$_POST['uplace3']);
$post_ads4 = mysqli_real_escape_string($conn,$_POST['uplace4']);
$post_ads5 = mysqli_real_escape_string($conn,$_POST['uplace5']);

$UpdateQuery = mysqli_query($conn,"UPDATE coin_advertising SET ads1='$post_ads1',ads2='$post_ads2',ads3='$post_ads3',ads4='$post_ads4',ads5='$post_ads5' ") or die(mysqli_error($conn));

if($UpdateQuery){
	
echo '<p style="font-size:18px;text-align:center;color:green;" >Successfully Update</p><br/><br/>';
echo'<meta http-equiv="refresh" content="3; url=index.php?coin=Advertising" />';	
}	

}else{
?>
<h3 id="forms-horizontal">Advertising</h3>
<h4 id="forms-horizontal">Add code ads</h4>
<form class="form-horizontal" Action="index.php?coin=Advertising" Method="POST" >

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Place 1</label>
    <div class="col-sm-10">
      <textarea name="uplace1" style="height:100px;" class="form-control" id="inputEmail3" placeholder="Advertising"><?=$place1?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Place 2</label>
    <div class="col-sm-10">
      <textarea name="uplace2" style="height:100px;" class="form-control" id="inputEmail3" placeholder="Advertising"><?=$place2?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Place 3</label>
    <div class="col-sm-10">
      <textarea name="uplace3" style="height:100px;" class="form-control" id="inputEmail3" placeholder="Advertising"><?=$place3?></textarea>
    </div>
  </div>
    
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Place 4</label>
    <div class="col-sm-10">
      <textarea name="uplace4" style="height:100px;" class="form-control" id="inputEmail3" placeholder="Advertising"><?=$place4?></textarea>
    </div>
  </div>
      
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Place 5</label>
    <div class="col-sm-10">
      <textarea name="uplace5" style="height:100px;" class="form-control" id="inputEmail3" placeholder="Advertising"><?=$place5?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="ads" class="btn btn-default">Update</button>
    </div>
  </div>
</form>
<?
}
?>

</div>
<!---->
	
</div>			
