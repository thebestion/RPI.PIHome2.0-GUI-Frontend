<?php 
header('content-type: text/javascript; charset=utf-8'); 
include('./../../config/dbconfig.inc.php');
include('./../../lang/'.LANGUAGE.'/index.php');
?>
/*
Main .JS
*/
$(document).ready(function(){
	
    // Auto-Open Dropdown Button
    $('.js-activated').dropdownHover().dropdown();
    
    <?php if($_GET['a']==="room"){ ?>
        // Get Devices as JSON an add to document
        getroomdevices(<?php echo $_GET['id']; ?>);
    <?php }else{ ?>
        // Get Devices as JSON an add to document
        getdevices();
    <?php } ?>


    <?php if($_GET['a']=="settings"){ ?>
        var a_sunrise = $('#a_sunrise').val();
        setDropDown(a_sunrise,'sunrise');  

        var a_timezone = $('#a_timezone').val();
        setDropDown(a_timezone,'timezone');  

        var a_country_code = $('#a_country_code').val();
        setDropDown(a_country_code,'country_code'); 

        var a_weather = $('#a_weather').val();
        setDropDown(a_weather,'weather'); 

        var a_weather_option = $('#a_weather_option').val();
        setDropDown(a_weather_option,'weather_option'); 

        var a_gcal_ical_activ = $('#a_gcal_ical_activ').val();
        setDropDown(a_gcal_ical_activ,'gcal_ical_activ'); 

        var a_oc_ical = $('#a_oc_ical').val();
        setDropDown(a_oc_ical,'oc_ical'); 
    <?php } ?>

});


function setSunset(id)
{    
    var status = $('#sunset_'+id).val();
    if(status=="1"){ var set = "0"; }else{ var set = "1"; }    
    $.get( "index.php?c=home&a=updatesunset&id="+id+"&set="+set, function( data ) {   

        var str = data.split("<!DOCTYPE html>").length - 1;
         if(str=="1")
         {               
            window.location = "home/";

         } else {
        
            if(data=="1"){
                if(set=="1"){
                    $('#ssbtn_'+id).removeClass('btn-default').addClass('btn-primary');
                }else{                
                    $('#ssbtn_'+id).removeClass('btn-primary').addClass('btn-default');
                }
                $('#sunset_'+id).val(set);
            }
        }
    });
}

function setAktiv(id)
{    
    var status = $('#aktiv_'+id).val();
    if(status=="1"){ var set = "0"; }else{ var set = "1"; }    
    $.get( "index.php?c=home&a=updateaktiv&id="+id+"&set="+set, function( data ) {     

        var str = data.split("<!DOCTYPE html>").length - 1;
         if(str=="1")
         {               
            window.location = "home/";

         } else {

            if(data=="1"){
                if(set=="1"){
                    $('#akbtn_'+id).removeClass('btn-danger').addClass('btn-success');
                    $('#akico_'+id).removeClass('fa-close').addClass('fa-check-circle');
                    // change icon
                }else{                
                    $('#akbtn_'+id).removeClass('btn-success').addClass('btn-danger');
                    $('#akico_'+id).removeClass('fa-check-circle').addClass('fa-close');
                }
                $('#aktiv_'+id).val(set);
            }
        }
    });
}





function shwokey(data){
    $('#apikey').html('Api-Key: <b>' + data + '</b>');
    $('#apikey2').html(data);
}

function setRoom(id,data){
    $('#roomname').val(data);
    $('#roomid').val(id);
}

function setDelRoomID(id){
    $('#delroomid').val(id);
}

function delRoom(){
    var rid = $('#delroomid').val();    
    $.get( "index.php?c=home&a=delroom&id="+rid, function( data ) {  
        var str = data.split("<!DOCTYPE html>").length - 1;
        if(str=="1"){ window.location = "home/"; } else {                              
            if(data=="1"){                   
                $('#'+rid).remove();
            }
        }
    });
}

function setUser(id,pass,user,name,admin,color){    
    $('#edituserid').val(id);
    $('#e_pass').val(pass);
    $('#e_user').val(user);
    $('#e_name').val(name);    
    $('#e_color').val(color);
    $('.input-group-addon i').css('background-color', color);    
    setDropDown(admin,'e_admin'); 
}

function setDelUserID(id){
    $('#deluserid').val(id);
}

function delUser(){
    var uid = $('#deluserid').val();    
    $.get( "index.php?c=home&a=deluser&id="+uid, function( data ) {  
        var str = data.split("<!DOCTYPE html>").length - 1;
        if(str=="1"){ window.location = "home/"; } else {                              
            if(data=="1"){                   
                $('#'+uid).remove();
            }
        }
    });
}




function setDropDown(state,element) {    
    var llist = document.getElementById(element);    
    for (var i=0; i<llist.options.length; i++){        
        if (llist.options[i].value == state){
            llist.options[i].selected = true;
            break;
        }
    } 

}


function setLamp(deviceid,device,room,letter,code,sort){
    $('#e_device').val(device);
    $('#deviceid').val(deviceid);
    setDropDown(room,'e_room'); 
    setDropDown(letter,'e_letter');    
    setDropDown(code.split('')[0],'e_c1'); 
    setDropDown(code.split('')[1],'e_c2');
    setDropDown(code.split('')[2],'e_c3');
    setDropDown(code.split('')[3],'e_c4');
    setDropDown(code.split('')[4],'e_c5');
    $('#e_sort').val(sort);
}                                          
                                          
                                          
$(function(){
    $('.colpick').colorpicker();
});


function getdevices(){  
    $("#devices").html("");
    $.get( "index.php?c=home&a=getlights", function( data ) {  
         
        var str = data.split("<!DOCTYPE html>").length - 1;
         if(str=="1")
         {               
            window.location = "home/";

         } else {
                                          
        var json = eval('(' + data + ')');        
        $.each( json, function( key, value ) 
        {                                
            if(value.sunset=="1"){ var sunset = ' <i class="fa fa-moon-o"></i>' }else{ var sunset = ''; }                                          
            if(value.status=="1"){ var onbtn = "btn-primary"; var offbtn = "btn-default"; var lamp = "lighton"; }
            else{ var onbtn = "btn-default"; var offbtn = "btn-primary"; var lamp = "lightoff"; }
            html = '<div class="row">';
            html += '<div class="col-xs-1 col-sm-1 col-md-1"><i id="lamp_'+value.id+'" class="fa fa-lightbulb-o '+lamp+'"></i></div>';
            html += '<div class="col-xs-6 col-sm-6 col-md-6"><div class="device">'+value.device+sunset+'</div><small>'+value.room+'</small></div>';
            html += '<div class="col-xs-5 col-sm-5 col-md-5">';
            html += '<span class="pull-right">';            
            html += "<a onclick='off(" + value.id + ")' id='btn2_" + value.id + "' class='btn "+offbtn+"'><?php echo BTN_OFF;?></a>";            
            html += '</span><span class="pull-right" style="margin-right:10px;">';            
            html += "<a onclick='on(" + value.id + ")' id='btn1_" + value.id + "' class='btn "+onbtn+"'><?php echo BTN_ON;?></a>";            
            html += '</span></div></div>';
            $( "<li>" ).html( html ).appendTo( "#devices" );            
        });  
                                          
        }
    });
}


$('#alloff').click(function() {    
    $.get( "index.php?c=home&a=alloff", function( data ) {        
        if(data=="1"){
            location.href="index.php";
        }
    });    
});


function on(value){ ac(value+"_on"); }


function off(value){ ac(value+"_off"); }


function ac(letter){
	var currentid = letter.split("_")[0];
	var currentstatus = letter.split("_")[1];
	var lamp = "#lamp_" + currentid;
	var btn1 = "#btn1_" + currentid;
	var btn2 = "#btn2_" + currentid;		
    if(currentstatus == "off"){              
        $.get( "index.php?c=home&a=set&id="+letter, function( data ) {            
        var str = data.split("<!DOCTYPE html>").length - 1;
        if(str=="1"){ window.location = "home/"; } else {                              
            if(data=="1"){                
                $(lamp).attr("class", "fa fa-lightbulb-o lightoff");                
                $(btn1).attr("class", "btn btn-default");
                $(btn2).attr("class", "btn btn-primary");                
            }
        }
        });
    }else{
        $.get( "index.php?c=home&a=set&id="+letter, function( data ) {  
            var str = data.split("<!DOCTYPE html>").length - 1;
            if(str=="1"){ window.location = "home/"; } else {                              
                if(data=="1"){
                    $(lamp).attr("class", "fa fa-lightbulb-o lighton");                
                    $(btn1).attr("class", "btn btn-primary");
                    $(btn2).attr("class", "btn btn-default");                
                }
            }
        });
    }
}
	

                                          
function setdellamp(lampid)
{    
    $('#dellampid').val(lampid);
}

                                          
function dellamp()
{
    var lid = $('#dellampid').val();    
    $.get( "index.php?c=home&a=deldevice&id="+lid, function( data ) {  
        var str = data.split("<!DOCTYPE html>").length - 1;
        if(str=="1"){ window.location = "home/"; } else {                              
            if(data=="1"){                   
                $('#'+lid).remove();
            }
        }
    });
}                                          
                                          
                                          