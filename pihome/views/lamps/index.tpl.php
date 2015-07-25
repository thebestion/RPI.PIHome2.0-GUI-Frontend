<!-- Add device -->
<div class="modal fade" id="add_lamp" tabindex="-1" role="dialog" aria-labelledby="addlampLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addlampLabel"><small><?php echo LAMP_add;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border"> 
            <input type="hidden" name="send" value="adddevice">                       
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_stat;?></label>                
              <div class="col-xs-12 col-sm-5 col-md-5">
                <select name="aktiv" class="form-control">
                    <option value="1">enable</option>
                    <option value="0">disable</option>
                </select>
                <br>
              </div>
            </div>             
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_name;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="device_name" class="form-control"><br>
              </div>
            </div>             
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_room;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="room_id" class="form-control">
                    <?php foreach($rooms as $room){ ?>
                        <option value="<?php echo $room['id'];?>"><?php echo $room['room'];?></option>
                    <?php } ?>
                </select><br>
              </div>
            </div>              
            <div class="form-group">
                <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_code;?></label>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="letter" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select><br>
                </div>
                    
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c1" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c2" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c3" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c4" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c5" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select><br>
                </div>
            </div>              
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_sort;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="number" name="sort" value="0" class="form-control"><br>
              </div>
            </div>                         
          </div>          
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo BTN_save;?></button>          
        </form>
        </div>
      </div>     
    </div>
  </div>



<!-- Edit device -->
<div class="modal fade" id="edit_lamp" tabindex="-1" role="dialog" aria-labelledby="editlampLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editlampLabel"><small><?php echo LAMP_edit_lamp;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border"> 
            <input type="hidden" name="send" value="editdevice">
            <input type="hidden" id="deviceid" name="deviceid" value="">
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_name;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="device_name" id="e_device" class="form-control"><br>
              </div>
            </div>             
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_room;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="room" id="e_room" class="form-control">
                    <?php foreach($rooms as $room){ ?>
                        <option value="<?php echo $room['id'];?>"><?php echo $room['room'];?></option>
                    <?php } ?>
                </select><br>
              </div>
            </div>              
            <div class="form-group">
                <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_code;?></label>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="letter" id="e_letter" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select><br>
                </div>
                    
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c1" id="e_c1" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c2" id="e_c2" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c3" id="e_c3" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c4" id="e_c4" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <select name="c5" id="e_c5" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select><br>
                </div>
            </div>              
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo LAMP_sort;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="number" name="sort" value="0" class="form-control"><br>
              </div>
            </div>               
          
          </div>          
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo BTN_save;?></button>          
        </form>
        </div>
      </div>     
    </div>
  </div>



<!-- Del lamp -->
<div class="modal fade" id="del_lamp" tabindex="-1" role="dialog" aria-labelledby="dellampLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="dellampLabel"><small><?php echo LAMP_del_lamp;?></small></h4>
        <input type="hidden" name="dellampid" id="dellampid" value="">
      </div>
      <div class="modal-body">                        
          <div class="alloff"><b><?php echo LAMP_del_quest;?></b></div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>
          <button type="button" onclick="dellamp()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> <?php echo BTN_delete;?></button>
        </div>
      </div>     
    </div>
  </div>


<div class="container">
    <div class="row">
		 
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            <h2 class="headline"><i class="fa fa-lightbulb-o"></i> <?php echo LAMP_HEADLINE;?>
                <span class="pull-right">
                <a href="#" data-toggle="modal" data-target="#add_lamp" class="btn btn-success">
                    <i class="fa fa-plus"></i> <span class="hidden-xs"><?php echo LAMP_add;?></span></a>
            </span></h2>
            
            <ul id="room_devices">
                <?php foreach($lampen as $lampe){ ?>
                <li id="<?php echo $lampe['id'];?>">
                    <div class="row">
                        <div class="hidden-xs col-sm-1 col-md-1">
                            <i id="lamp_<?php echo $lampe['id'];?>" class="fa fa-lightbulb-o lightoff"></i>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4">
                            <div class="device"><?php echo $lampe['id'];?> - <?php echo $lampe['device'];?></div>
                            <small><?php echo $lampe['room'];?> - <?php echo $lampe['letter'];?> <?php echo $lampe['code'];?></small>
                        </div>                           
                        <div class="col-xs-6 col-sm-7 col-md-7">
                            <div class="btn-group pull-right" role="group" aria-label="">
                                <?php if($lampe['sunset']==1){ $btns="btn-primary"; }else{ $btns="btn-default"; }?>
                                <a onclick="setSunset('<?php echo $lampe['id'];?>')" id="ssbtn_<?php echo $lampe['id'];?>" title="<?php echo LAMP_sunset;?>" class="btn <?php echo $btns; ?>"><i class="fa fa-moon-o"></i></a>
                                <input type="hidden" id="sunset_<?php echo $lampe['id'];?>" value="<?php echo $lampe['sunset'];?>">
                                
                                <?php if($lampe['aktiv']==1){ $btna="btn-success"; }else{ $btna="btn-danger"; }?>
                                <input type="hidden" id="aktiv_<?php echo $lampe['id'];?>" value="<?php echo $lampe['aktiv'];?>">                                
                                <a onclick="setAktiv(<?php echo $lampe['id'];?>)" title="<?php echo LAMP_stat;?>" id="akbtn_<?php echo $lampe['id'];?>" class="btn <?php echo $btna; ?>">
                                    <?php if($lampe['aktiv']==1){ echo '<i id="akico_'.$lampe['id'].'" class="fa fa-check-circle"></i>'; }
                                    else{ echo '<i id="akico_'.$lampe['id'].'" class="fa fa-close"></i>'; }?>
                                    
                                </a>
                                <a onclick="setLamp('<?php echo $lampe['id'];?>','<?php echo $lampe['device'];?>','<?php echo $lampe['room_id'];?>','<?php echo $lampe['letter'];?>','<?php echo $lampe['code'];?>','<?php echo $lampe['sort'];?>')" data-toggle="modal" data-target="#edit_lamp" title="<?php echo LAMP_edit;?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a onclick="setdellamp('<?php echo $lampe['id'];?>')" data-toggle="modal" data-target="#del_lamp" title="<?php echo BTN_delete;?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </li>  
                <?php } ?>
            </ul>
            
        </div>  
         
    </div>
</div>