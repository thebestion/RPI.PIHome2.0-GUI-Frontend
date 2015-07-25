
<!-- Add user -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="adduserLabel"><small><?php echo USER_add;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border">  
            <input type="hidden" name="send" value="adduser">
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_username;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="user_name" class="form-control"><br>
              </div>
            </div> 
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label" ><?php echo USER_name;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="name" class="form-control"><br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_stats;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="admin" class="form-control">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
                <br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_color;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="input-group colpick">
                    <input type="text" value="#565656" name="color" class="form-control" />
                    <span class="input-group-addon"><i></i></span>
                </div>
                  <br>
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


<!-- edit user -->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="edituserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="edituserLabel"><small><?php echo USER_edit_user;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border">
            <input type="hidden" name="send" value="edituser">
            <input type="hidden" name="edituserid" id="edituserid" value=""> 
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_username;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="user_name" id="e_user" class="form-control"><br>
              </div>
            </div> 
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_name;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="name" id="e_name"  class="form-control"><br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_pass;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" id="e_pass" class="form-control" disabled><br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_stats;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="admin" id="e_admin"  class="form-control">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
                <br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo USER_color;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="input-group colpick">
                    <input type="text" value="" name="color" id="e_color" class="form-control" />
                    <span class="input-group-addon"><i></i></span>
                </div>
                  <br>
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

<!-- API Key -->
<div class="modal fade" id="api_key" tabindex="-1" role="dialog" aria-labelledby="apiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="apiLabel"><small><?php echo USER_api_key;?></small></h4>        
      </div>
      <div class="modal-body">                        
          <div class="alloff" id="apikey"></div><br>
          Api-Url:<br> <small><?php echo BASE;?>api/?ak=<span id="apikey2"></span>&ch=X&co=XXXXX&s=X</small>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>          
        </div>
      </div>     
    </div>
  </div>



<!-- Del user -->
<div class="modal fade" id="del_user" tabindex="-1" role="dialog" aria-labelledby="deluserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deluserLabel"><small><?php echo USER_del_user;?></small></h4>
        <input type="hidden" name="deluserid" id="deluserid" value=""> 
      </div>
      <div class="modal-body">                        
          <div class="alloff"><b><?php echo USER_del_quest;?></b></div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>
          <button type="button" onclick="delUser()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> <?php echo BTN_delete;?></button>
        </div>
      </div>     
    </div>
  </div>




<div class="container">
    <div class="row">
		 
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            <h2 class="headline"><i class="fa fa-group"></i> <?php echo USER_HEADLINE;?>
                <span class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#add_user" class="btn btn-success"><i class="fa fa-plus"></i> <span class="hidden-xs">
                        <?php echo USER_add;?></span></a>
                </span>
            </h2>
            
            
            
            
            <ul id="room_devices">
                <?php foreach($users as $user){ ?>
                <li id="<?php echo $user['id'];?>">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1">
                            <div class="circle" style="background-color:<?php echo $user['color'];?>;"><?php echo name($user['name']);?></div>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="device"><?php echo $user['name'];?> </div>  
                            <small><?php echo $user['user'];?></small>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="btn-group pull-right" role="group" aria-label="...">
                                
                                <?php if($user['admin']=="1"){ $us = "Admin"; }else{ $us = "User"; } ?>  
                                <a title="<?php echo $us;?>" class="btn <?php if($user['admin']==1){ echo "btn-primary"; }else{ echo "btn-default"; }?>"><i class="fa fa-shield"></i></a>
                                
                    <a onclick="shwokey('<?php echo $user['apikey'];?>')" data-toggle="modal" data-target="#api_key" title="API Key" class="btn btn-default">
                        <i class="fa fa-key"></i></a>
                                <a onclick="setUser('<?php echo $user['id'];?>','<?php echo $user['pass'];?>','<?php echo $user['user'];?>','<?php echo $user['name'];?>','<?php echo $user['admin'];?>','<?php echo $user['color'];?>')" data-toggle="modal" data-target="#edit_user" title="Bearbeiten" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a onclick="setDelUserID('<?php echo $user['id'];?>')" data-toggle="modal" data-target="#del_user" title="Löschen" class="btn btn-default"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </li>  
                <?php } ?>
            </ul>
            
            
            
        </div>  
         
        
    </div>
</div>