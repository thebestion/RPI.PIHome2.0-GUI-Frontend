

<div class="container">
    <div class="row">
		 
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            <h2 class="headline"><i class="fa fa-lightbulb-o"></i> <?php echo $room_name;?></h2>
            
            
            <ul id="room_devices">
                <?php foreach($lampen as $lampe){ 
                if($lampe['status']=="1"){ $onbtn = "btn-primary"; $offbtn = "btn-default"; $lamp = "lighton"; }
                else{ $onbtn = "btn-default"; $offbtn = "btn-primary"; $lamp = "lightoff"; }
                ?>
                <li><div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1">
                            <i id="lamp_<?php echo $lampe['id'];?>" class="fa fa-lightbulb-o <?php echo $lamp;?>"></i>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="device"><?php echo $lampe['device'];?> <?php if($lampe['sunset']=="1"){ ?><i class="fa fa-moon-o"></i><?php } ?>
                            </div><small><?php echo $room_name;?></small></div>                    
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <span class="pull-right">
                                <a onclick="off(<?php echo $lampe['id'];?>)" id="btn2_<?php echo $lampe['id'];?>" class="btn <?php echo $offbtn;?>">
                                    <?php echo BTN_OFF;?>
                                </a>
                            </span>
                            <span class="pull-right" style="margin-right:10px;">
                                <a onclick="on(<?php echo $lampe['id'];?>)" id="btn1_<?php echo $lampe['id'];?>" class="btn <?php echo $onbtn;?>">
                                    <?php echo BTN_ON;?>
                                </a>
                            </span>
                        </div>
                    </div>
                </li>  
                <?php } ?>
            </ul>
            
            
            
        </div>  
         
        
    </div>
</div>