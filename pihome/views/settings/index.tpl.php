
<!--

√sunrise	true
√city	Berlin
√country_code	DE
√timezone

√weather	true
√weather_option	c_kms / k_mps

√gcal_ical_activ	true
√gcal_ical	

√oc_ical	true
√oc_user	
√oc_pass	
√oc_ical_url

-->

<div class="container">
    <div class="row">
		 
        <div class="col-xs-12 col-sm-12 col-md-12 lights">
            
            <h2 class="headline"><i class="fa fa-cog"></i> <?php echo SET_HEADLINE;?></h2>
            
            <form method="post" class="form-vertical row-border">                   
            <input type="hidden" name="send" value="save">
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_sunrise;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_sunrise" value="<?php echo $settings['sunrise']; ?>">
                  <select name="sunrise" id="sunrise" class="form-control">
                    <option value="true">Aktiv</option> 
                    <option value="false">Deaktiv</option> 
                  </select>
                  <br>
              </div>
            </div> 
            
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_city;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="city" value="<?php echo $settings['city']; ?>" class="form-control"><br>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_timezone;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="hidden" id="a_timezone" value="<?php echo $settings['timezone']; ?>">
                <select name="timezone" id="timezone" class="form-control">
                <?php
                foreach($timezones as $region => $list)
                {
                    echo '<optgroup label="' . $region . '" id="' . $region . '">' . "\n";
                    foreach($list as $timezone => $name)
                    {
                        echo '<option value="' . $timezone . '">' . $name . '</option>' . "\n";
                    }
                    echo '<optgroup>' . "\n";
                }
                ?>
                </select>    
                <br>
              </div>
            </div>
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_country_code;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_country_code" value="<?php echo $settings['country_code']; ?>">
                  <select name="country_code" id="country_code" class="form-control">  
                  <?php
                    foreach($countries as $key => $country)
                    {
                        echo '<option value="'. $key . '">'. $key . ' - ' . $country . '</option>';
                    }
                    ?>
                    </select>
              </div>
            </div>
                
                
            <div class="form-group">              
              <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
              </div>
            </div>
                
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_weather;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_weather" value="<?php echo $settings['weather']; ?>">
                  <select name="weather" id="weather" class="form-control">
                    <option value="true">Aktiv</option> 
                    <option value="false">Deaktiv</option> 
                  </select>
                  <br>
              </div>
            </div> 
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_units;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_weather_option" value="<?php echo $settings['weather_option']; ?>">
                  <select name="weather_option" id="weather_option" class="form-control">
                    <option value="c_kms">Celsius - km/s</option> 
                    <option value="k_mps">Kelvin - m/s</option> 
                  </select>
                  <br>
              </div>
            </div> 
            
                
                
            <div class="form-group">              
              <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
              </div>
            </div>  
                
                
               
             <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_gcal;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_gcal_ical_activ" value="<?php echo $settings['gcal_ical_activ']; ?>">
                  <select name="gcal_ical_activ" id="gcal_ical_activ" class="form-control">
                    <option value="true">Aktiv</option> 
                    <option value="false">Deaktiv</option> 
                  </select>
                  <br>
              </div>
            </div>    
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_gcal_url;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="gcal_ical" value="<?php echo $settings['gcal_ical']; ?>" class="form-control"><br>
              </div>
            </div>   
                
                
                
            <div class="form-group">              
              <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
              </div>
            </div>
                
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_caldav;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <input type="hidden" id="a_oc_ical" value="<?php echo $settings['oc_ical']; ?>">
                  <select name="oc_ical" id="oc_ical" class="form-control">
                    <option value="true">Aktiv</option> 
                    <option value="false">Deaktiv</option> 
                  </select>
                  <br>
              </div>
            </div>    
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_user;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="oc_user" id="oc_user" value="<?php echo $settings['oc_user']; ?>" class="form-control"><br>
              </div>
            </div> 
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_pass;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="oc_pass" id="oc_pass" value="<?php echo $settings['oc_pass']; ?>" class="form-control"><br>
              </div>
            </div>     
                
                
            <div class="form-group">
              <label class="col-xs-12 col-sm-12 col-md-12 control-label"><?php echo SET_caldav_url;?></label>                
              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="oc_ical_url" id="oc_ical_url" value="<?php echo $settings['oc_ical_url']; ?>" class="form-control"><br>
              </div>
            </div>    
                
                
              <div class="form-group">              
              <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
              </div>
            </div>
                
                
                
            <div class="form-group">                         
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo BTN_save;?></button><br>
                <br>
              </div>
            </div>
          </form>
            
            
            
            
            
        </div>  
         
        
    </div>
</div>




