<!-- Add room -->
<div class="modal fade" id="add_room" tabindex="-1" role="dialog" aria-labelledby="addroomLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addroomLabel"><small><?php echo ROOM_add;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border">  
            <input type="hidden" name="send" value="addroom">
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo ROOM_room;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="room_name" class="form-control"><br>
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


<!-- edit room -->
<div class="modal fade" id="edit_room" tabindex="-1" role="dialog" aria-labelledby="editroomLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editroomLabel"><small><?php echo ROOM_edit_room;?></small></h4>
      </div>
      <div class="modal-body">          
          <div class="row">
          <form method="post" action="" class="form-vertical row-border">  
          <input type="hidden" name="send" value="editroom">
          <input type="hidden" name="roomid" id="roomid" value="">
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo ROOM_room;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="room_name" id="roomname" class="form-control"><br>
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


<!-- Del room -->
<div class="modal fade" id="del_room" tabindex="-1" role="dialog" aria-labelledby="delroomLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delroomLabel"><small><?php echo ROOM_del_room;?></small></h4>
        <input type="hidden" name="delroomid" id="delroomid" value="">
      </div>
      <div class="modal-body">                        
          <div class="alloff"><b><?php echo ROOM_del_quest;?></b></div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> <?php echo BTN_cancel;?></button>
          <button type="button" onclick="delRoom()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> <?php echo BTN_delete;?></button>
        </div>
      </div>     
    </div>
  </div>


<div class="container">
    <div class="row">
		 
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            <h2 class="headline"><i class="fa fa-home"></i> <?php echo ROOM_HEADLINE;?> 
                <span class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#add_room" class="btn btn-success"><i class="fa fa-plus"></i> <span class="hidden-xs">
                        <?php echo ROOM_add;?></span>
                    </a>
                </span></h2>
                        
            
            
            <ul id="room_devices">
                <?php foreach($rooms as $room){ ?>
                <li id="<?php echo $room['id'];?>">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1"><i class="fa fa-home roomicon"></i> </div>
                        <div class="col-xs-6 col-sm-6 col-md-6"><div class="room"><?php echo $room['room'];?></div></div>
                        <div class="col-xs-5 col-sm-5 col-md-5">                            
                            <div class="btn-group pull-right" role="group" aria-label="...">
                                <a onclick="setRoom('<?php echo $room['id'];?>','<?php echo $room['room'];?>')" data-toggle="modal" data-target="#edit_room" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a onclick="setDelRoomID('<?php echo $room['id'];?>')" data-toggle="modal" data-target="#del_room" class="btn btn-default"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </li>  
                <?php } ?>
            </ul>
            
            
            
        </div>  
         
        
    </div>
</div>