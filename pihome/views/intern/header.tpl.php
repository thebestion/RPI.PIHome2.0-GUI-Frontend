<?php
if($settings['weather_option']=="c_kms"){
    $temp = $weather['temp_celsius'];
    $wind = $weather['wind_kms'];
    $tsign = "&deg;C";
    $wsign = "km/s";
}elseif($settings['weather_option']=="k_mps"){
    $temp = $weather['temp_kelvin'];
    $wind = $weather['wind_mps'];   
    $tsign = "K";
    $wsign = "mps";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title><?php echo $title;?></title>  	
    <base href="<?php echo BASE;?>"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="apple-touch-icon" href="assets/icon/apple-touch-icon-57-precomposed.png">    
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icon/apple-touch-icon-144-precomposed.png"> 
    <link rel="shortcut icon" href="assets/icon/favicon.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">   
    <link href="assets/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
      
  	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php if($settings['weather']=="true"){ ?>
            <span class="pull-right visible-xs btn-ref"><a href="#" data-toggle="modal" data-target="#myWeather" class="btn btn-default"><i class="fa fa-sun-o"></i></a></span> <?php } ?>
          <span class="pull-right visible-xs btn-ref"><a href="#" data-toggle="modal" data-target="#all_off" class="btn btn-default"><i class="fa fa-power-off"></i></a></span>    
            <span class="pull-right visible-xs btn-ref"><a onclick="location.reload()" class="btn btn-default"><i class="fa fa-refresh"></i></a></span>    
              
          <a class="navbar-brand" href="<?php echo BASE;?>"><?php echo LOGO;?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo BASE;?>" class="hidden-xs"><i class="fa fa-lightbulb-o"></i> <?php echo NAV_home;?></a></li>
            <li><a href="#" data-toggle="modal" data-target="#all_off" class="hidden-xs"><i class="fa fa-power-off"></i> <?php echo NAV_alloff;?></a></li>                       <?php if($settings['weather']=="true"){ ?>
            <li><a href="#" data-toggle="modal" data-target="#myWeather" class="hidden-xs"><i class="fa fa-sun-o"></i> <?php echo NAV_weather;?></a></li>
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown"><i class="fa fa-home"></i> <?php echo NAV_rooms;?> <b class="fa fa-chevron-down"></b></a>
              <ul class="dropdown-menu">                  
                <?php foreach($rooms as $room){ ?>
                    <li><a href="home/room/<?php echo $room['id'];?>/"><i class="fa fa-lightbulb-o"></i> <?php echo $room['room'];?></a></li>             
                <?php } ?>
              </ul>
            </li>             
            <?php if($userdata['admin']=="1"){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown"><i class="fa fa-cog"></i> <?php echo NAV_settings;?> <b class="fa fa-chevron-down"></b></a>
              <ul class="dropdown-menu">
                <li><a href="home/lamps/"><i class="fa fa-lightbulb-o"></i> <?php echo NAV_set_devices;?></a></li>
                <li><a href="home/rooms/"><i class="fa fa-home"></i> <?php echo NAV_set_room;?></a></li>
                <li><a href="home/user/"><i class="fa fa-group"></i> <?php echo NAV_set_user;?></a></li>                
                <li><a href="home/settings/"><i class="fa fa-cog"></i> <?php echo NAV_set_settings;?></a></li>                 
              </ul>
            </li>   
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown"><span class="circle_home" style="background-color:<?php echo $userdata['color'];?>;"><? echo name($userdata['name']); ?></span>   <b class="fa fa-chevron-down"></b></a>
              <ul class="dropdown-menu">
                <li><a href="home/pwchange/"><i class="fa fa-pencil"></i> <?php echo NAV_edit_pass;?></a></li> 
                <li><a href="login/logout/"><i class="fa fa-sign-out"></i> <?php echo NAV_signout;?></a></li>  
              </ul>
            </li>  
          </ul>
        </div>
      </div>
    </div>      

	<div id="top"></div>
      

      

 
<!-- Weather -->
<div class="modal fade" id="myWeather" tabindex="-1" role="dialog" aria-labelledby="myWeatherLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myWeatherLabel"><small><?php echo WEATHER_TITLE." ".$settings['city'].",".$settings['country_code'];?> - <?php echo date('H:i');?> <?php echo WEATHER_CLOCK;?></small></h4>
      </div>
      <div class="modal-body">        
        <div class="row">             
            <div class="col-xs-10 col-sm-10 col-md-10">
                <h3><span><img border="0" src="assets/weather/<?php echo $weather['icon'];?>.png" title="<?php echo $weather['title'];?> - <?php echo $weather['description'];?>"></span> <span><?php echo $weather['title'];?> - <?php echo $weather['description'];?></span></h3>
            </div>            
            <div class="col-xs-7 col-sm-6 col-md-6 wdata">
                <?php echo WEATHER_SUNRISE;?>: <?php echo date('H:i', $weather['sunrise']);?> <?php echo WEATHER_CLOCK;?><br>
                <?php echo WEATHER_SUNSET;?>: <?php echo date('H:i', $weather['sunset']);?> <?php echo WEATHER_CLOCK;?><br>
                <?php echo WEATHER_WIND;?>: <?php echo $wind;?> <?php echo $wsign;?>
            </div>              
            <div class="col-xs-5 col-sm-6 col-md-6">
                <span class="pull-right degrees"><?php echo $temp." ".$tsign;?></span>
            </div> 
                    
        </div>  	            
      </div>     
    </div>
  </div>
</div>
      
      

<!-- All Off -->
<div class="modal fade" id="all_off" tabindex="-1" role="dialog" aria-labelledby="alloffLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="alloffLabel"><small><?php echo AO_device_off;?></small></h4>
      </div>
      <div class="modal-body">                        
          <div class="alloff"><b><?php echo AO_question;?></b></div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo AO_cancel;?></button>
          <button type="button" id="alloff" class="btn btn-danger"><i class="fa fa-power-off"></i> <?php echo AO_all_off;?></button>
        </div>
      </div>     
    </div>
  </div>

  