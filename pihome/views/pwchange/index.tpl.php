
<div class="container">
    <div class="row">
        
         
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            
         <?php if($err!=""){ ?> 
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="alert alert-dismissable alert-warning">
                    <i class="fa fa-exclamation-triangle"></i> <?php echo $err; ?>
                </div>
             </div>        
         <? } ?> 

         <?php if($msg!=""){ ?> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="alert alert-dismissable alert-success">
                    <i class="fa fa-check-square-o"></i> <?php echo $msg; ?>
                </div>
            </div>            
         <? } ?> 
            
            <h2 class="headline"><i class="fa fa-key"></i> <?php echo PWCH_HEADLINE;?></h2>           
           <form method="post" action="" class="form-vertical row-border">                   
            <input type="hidden" name="send" value="save">
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo PWCH_pass;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="password" name="pw" class="form-control"><br>
              </div>
            </div> 
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo PWCH_new_pw;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="password" name="newpw1" class="form-control"><br>
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo PWCH_newpw2;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="password" name="newpw2" class="form-control"><br>
                <br>
              </div>
            </div>
            <div class="form-group">                         
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo PWCH_save_pw;?></button><br>
                <br>
              </div>
            </div>
          </form>
          
        </div>  
         
        
    </div>
</div>




