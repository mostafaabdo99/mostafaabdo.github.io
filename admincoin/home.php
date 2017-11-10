 <?
if($fix_page){}else{echo'<meta http-equiv="refresh" content="0; url=index.php" />';exit();}


$sqltotale = mysqli_query($conn, "SELECT * FROM coin_statistics");
$row22w = mysqli_fetch_assoc($sqltotale); 
$users = $row22w['users'];
$withdraw = $row22w['withdraw'];
$claims = $row22w['calims'];
$bitcoin = $row22w['bitcoin'];

?>
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>User</h3>
								<h4><?=$users?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Claim Total</h3>
								<h4><?=$claims?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-btc" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Bitcoin</h3>
								<h4><? echo number_format($bitcoin/100000000, 8, ',', ' ');?>Ƀ</h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Withdraw Total</h3>
								<h4><?=$withdraw?>Ƀ</h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<div class="agileinfo-grap">
<div class="agileits-box">
<h3>Statistics : Visitor (New)</h3>
	<div class="toolbar">
<style>
#chartdiv {
	width	: 100%;
	height	: 500px;
}
</style>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<div id="chartdiv"></div>
 <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>
  <script>
var chartData = AmCharts.loadJSON('<?=$siteurl?>/data.php'); 
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": chartData
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
  </script>

	</div>
</div>
</div>
<!--photoday-section-->	
			
                        
                    	<div class="col-sm-4 wthree-crd">
                            <div class="card">
                                <div class="card-body">
                                    <div class="widget widget-report-table">
                                        <header class="widget-header m-b-15">
                                        </header>
                                        
                                        <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                        <div class="card-header" style="padding:20px 0 28px 0;">
                                        <h3>Withdraw</h3>
                                        </div>
										
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Status</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												
<?
$sqlwall = mysqli_query($conn,"SELECT * FROM `coin_withdraw` WHERE  id LIMIT 7");

while($wrow = mysqli_fetch_array($sqlwall)){
$uidw = $wrow['uid'];
$reff = $uidw + 5000;	
$withd = $wrow['withdraw'];	
$sqlus = mysqli_query($conn,"SELECT * FROM `coin_users` WHERE  id ='$uidw'");
$eraw = mysqli_fetch_array($sqlus);
$eemail = $eraw['email'];

	if($wrow['status'] == 0){
	$status = "<a style='color:red;'>Wait confirm</a>";	
	}elseif($wrow['status'] == 1){
	$status = "<font color='blue' >pending</font>";	
	}elseif($wrow['status'] == 2){
	$status = "<font color='green' >success</font>";	
	}elseif($wrow['status'] == 3){
	$status = "<font color='red' >cancel</font>";	
	}
	
?>	
                                                    <tr>
                                                        <td><?=$reff?></td>
                                                        <td><?=$status?></td>
                                                        <td><?=$withd?>Ƀ</td>
                                                    </tr>
<?
}
?>
													</tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 w3-agileits-crd">
						
                            <div class="card card-contact-list">
							<div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3>Users</h3>
                                </div>
                                <div class="card-body p-b-20">
                                    <div class="list-group">
<?
$sqlusall = mysqli_query($conn,"SELECT * FROM `coin_users` WHERE  id ORDER BY `coin_users`.`date_reg` DESC LIMIT 5 ");

while($urow = mysqli_fetch_array($sqlusall)){

$uemail = $urow['email'];
$ulevel = $urow['level'];
$uidu = $urow['id'];

if($ulevel == 1){
	$nulevel = "User";
}elseif($ulevel == 4){
	$nulevel = "Admin";
	
} 
?>	
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="images/in4.png" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading"><?=$uidu+5000?></div>
                                                	<small class="lg-item-text"><?=$uemail?></small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading"><?=$nulevel?></div>
                                                </div>
                                            </div>
                                        </a>
<?
}
?>

                                   	</div>
                                </div>
                            </div>
							</div>
                      	</div>
                    	<div class="col-sm-4 w3-agile-crd">
                            <div class="card">
                                <div class="card-body card-padding">
                                    <div class="widget">
                                        <header class="widget-header" style="padding:0 0 16px 0;" >
                                            <h4 class="widget-title">Activities</h4>
                                        </header>
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            <div class="streamline">
<?
$sqlusall2 = mysqli_query($conn,"SELECT * FROM `coin_users` WHERE  id ORDER BY `coin_users`.`date_reg` DESC LIMIT 6 ");
$i = 1;
while($urow2 = mysqli_fetch_array($sqlusall2)){

$date_v = $urow2['date_ve'];
$email_v = $urow2['email'];
$uid_v = $urow2['id'];

    if($i % 4 == 0) {
        $color ="sl-success";
    }elseif($i % 3 == 0) {
        $color ="sl-danger";
    }elseif($i % 2 == 0){
        $color ="sl-primary";
	}else{
        $color ="";
	}

    $i++;

    
?>
<script type="text/javascript">
var zeropad = function (num) {
  return ((num < 10) ? '0' : '') + num;
};
var iso8601 = function (date) {
  return date.getUTCFullYear()
    + "-" + zeropad(date.getUTCMonth()+1)
    + "-" + zeropad(date.getUTCDate())
    + "T" + zeropad(date.getUTCHours())
    + ":" + zeropad(date.getUTCMinutes())
    + ":" + zeropad(date.getUTCSeconds()) + "Z";
};

function prepareDynamicDates() {
  $('time.loaded').attr("datetime", iso8601(new Date()));
  $('time.modified').attr("datetime", iso8601(new Date(document.lastModified)));
}

function loadNumbers() {
  jQuery.timeago.settings.strings.numbers = ["zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
}
function unloadNumbers() {
  jQuery.timeago.settings.strings.numbers = [];
}

function loadCutoffSetting() {
  jQuery.timeago.settings.cutoff = 7*24*60*60*1000;
}

function unloadCutoffSetting() {
  jQuery.timeago.settings.cutoff = 0;
}

function setupDisposal() {
  jQuery.timeago.settings.refreshMillis = 50;
  $('abbr.disposal').attr("title", iso8601(new Date())).timeago();
}

function loadPigLatin() {
  jQuery.timeago.settings.strings = {
    suffixAgo: "ago-hay",
    suffixFromNow: "omNow-fray",
    seconds: "ess-lay an-thay a-hay inute-may",
    minute: "about-hay a-hay inute-may",
    minutes: "%d inutes-may",
    hour: "about-hay an-hay hour-hay",
    hours: "about-hay %d hours-hay",
    day: "a-hay ay-day",
    days: "%d ays-day",
    month: "about-hay a-hay onth-may",
    months: "%d onths-may",
    year: "about-hay a-hay ear-yay",
    years: "%d years-yay"
  };
}

function loadRussian() {
  (function() {
    function numpf(n, f, s, t) {
      // f - 1, 21, 31, ...
      // s - 2-4, 22-24, 32-34 ...
      // t - 5-20, 25-30, ...
      var n10 = n % 10;
      if ( (n10 === 1) && ( (n === 1) || (n > 20) ) ) {
        return f;
      } else if ( (n10 > 1) && (n10 < 5) && ( (n > 20) || (n < 10) ) ) {
        return s;
      } else {
        return t;
      }
    }

    jQuery.timeago.settings.strings = {
      prefixAgo: null,
      prefixFromNow: "через",
      suffixAgo: "назад",
      suffixFromNow: null,
      seconds: "меньше минуты",
      minute: "минуту",
      minutes: function(value) { return numpf(value, "%d минута", "%d минуты", "%d минут"); },
      hour: "час",
      hours: function(value) { return numpf(value, "%d час", "%d часа", "%d часов"); },
      day: "день",
      days: function(value) { return numpf(value, "%d день", "%d дня", "%d дней"); },
      month: "месяц",
      months: function(value) { return numpf(value, "%d месяц", "%d месяца", "%d месяцев"); },
      year: "год",
      years: function(value) { return numpf(value, "%d год", "%d года", "%d лет"); }
    };
  })();
}

function resetRefreshMillis() {
  jQuery.timeago.settings.refreshMillis = 60000;
}

function loadMillis() {
  var millisSubstitution = function(number, millis) { return millis + " milliseconds"; };
  jQuery.timeago.settings.strings = {
    suffixAgo: "ago",
    suffixFromNow: "from now",
    seconds: millisSubstitution,
    minute: millisSubstitution,
    minutes: millisSubstitution,
    hour: millisSubstitution,
    hours: millisSubstitution,
    day: millisSubstitution,
    days: millisSubstitution,
    month: millisSubstitution,
    months: millisSubstitution,
    year: millisSubstitution,
    years: millisSubstitution
  };
}

function loadNoSpaces() {
  jQuery.extend(jQuery.timeago.settings.strings, {
    minutes: "%dminutes",
    wordSeparator: ""
  });
}

function loadNullSpaces() {
  jQuery.extend(jQuery.timeago.settings.strings, {
    minutes: "%dminutes",
    wordSeparator: null
  });
}

function loadYoungOldYears() {
  jQuery.extend(jQuery.timeago.settings.strings, {
    years: function(value) { return (value < 21) ? "%d young years" : "%d old years"; }
  });
}

function loadDoNotAllowFuture() {
  var mockDateToUse = "2010-01-01";
  $.timeago.settings.allowFuture = false;
  enableMockedDate(mockDateToUse);
}

function unloadDoNotAllowFuture() {
  $.timeago.settings.allowFuture = true;
  disableMockedDate();
}

function loadDoNotAllowPast() {
  var mockDateToUse = "2010-01-01";
  $.timeago.settings.allowFuture = true;
  $.timeago.settings.allowPast = false;
  $.timeago.settings.strings.inPast = "in the past";
  enableMockedDate(mockDateToUse);
}

function unloadDoNotAllowPast() {
  $.timeago.settings.allowFuture = true;
  $.timeago.settings.allowPast = true;
  disableMockedDate();
}

function enableMockedDate(dateToReturn) {
  var mockDate = dateToReturn;
  window.NativeDate = Date;
  window.Date = function () {
    if(arguments.length === 0) {
      return new window.NativeDate(mockDate);
    } else if(arguments.length === 1) {
      return new window.NativeDate(arguments[0]);
    } else  if(arguments.length === 7) {
      return new window.NativeDate(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4], arguments[5], arguments[6]);
    } else {
      throw "Mocking Date with this number of parameters is not implemented.";
    }
  };
}

function disableMockedDate() {
  window.Date = window.NativeDate;
  delete window.NativeDate;
}
</script>
<script type="text/javascript">
   jQuery(document).ready(function() {
     $("time.timeago").timeago();
   });
</script>  
                                                <div class="sl-item <?=$color?>">
                                                    <div class="sl-content">
                                                        <small class="text-muted">
														<time class="loaded timeago" datetime="<?=$date_v?>"><?=$date_v?></time>
														</small>
                                                        <p><?=$email_v?></p>
                                                    </div>
                                                </div>
<?
}
?>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	