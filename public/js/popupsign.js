var domain  = localStorage.getItem("doaminname"); 

jQuery(document).ready(function($)
{
 
    $('.sigin_pop').on('click',function()
    {
    
           var txt='<div class="modal" id="myModal" aria-hidden="false" style="display: block;">'
	+'<div class="modal-dialog modal-medium">'
     + '<div class="modal-content">'
       + '<div class="modal-header">'
          +'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'
          +'<h4 class="modal-title">Sign in</h4>'
        +'</div><div class="container"></div>'
        +'<div class="modal-body">'
           +'<form id="form1" action="" method="POST" enctype="multipart/form-data">'
            +'<fieldset>'
                +'<ul>'
                    +'<li><div class="form-group"><label class="col-sm-3 control-label" style="padding:0;">Username:</label><div class="col-sm-9">'
                       + '<input class="form-control" style="width:100%" type="username" id="username" name="username" placeholder="Username" required /></div></div></li>'
                    +'<li><div class="form-group"><label class="col-sm-3 control-label" style="padding:0;">Password:</label><div class="col-sm-9">'
                       + '<input class="form-control" style="width:100%" type="password" id="password" name="password" placeholder="Enter your password" required validationMessage="Please enter your password" /></div></div>'
                   + '</li>'
                   
                     + ' <li><div class="form-group"><label class="col-sm-3 control-label"></label><div class=" btn-dangnhap col-sm-9"><a href=" ' + domain + '/admin/forgot">Forgot your password? </a><a data-toggle="modal" href="#myModal" class="sigup_pop_new close_open">Sign in </a><button id="submitButton" class="btn btn-primary">Sign up</button></div>'
                    +'</li>'
                   + '<div id="cis"></div>'
                +'</ul>'
            +'</fieldset>'
        +'</form>'

       +' </div>'

      +'</div>'
    +'</div>'
    +'<script src=" ' + domain + '/js/ajax.js"></script>'
+'</div>';

        
        
        $('body > .container').prepend(txt);
    }) ;  
    // singup form 
    
        $('.sigup_pop').on('click',function()
    {
 
           var txt='<div class="modal" id="myModal" aria-hidden="false" style="display: block;">'
	+'<div class="modal-dialog modal-medium">'
     + '<div class="modal-content">'
       + '<div class="modal-header">'
          +'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'
          +'<h4 class="modal-title">Sign up</h4>'
        +'</div><div class="container"></div>'
        +'<div class="modal-body">'
           +'<form id="form2" action="" method="POST" enctype="multipart/form-data">'
            +'<fieldset>'
                
                +'<ul>'
                    +'<li><div class="form-group"><label class="col-sm-3 control-label" style="padding:0;">Username:</label><div class="col-sm-9">'
                       + '<input class="form-control" style="width:100%" type="username" id="username" name="username" placeholder="Username" required /></div></div></li>'
                    +'<li><div class="form-group"><label class="col-sm-3 control-label" style="padding:0;">Password:</label><div class="col-sm-9">'
                       + '<input class="form-control" style="width:100%" type="password" id="password" name="password" placeholder="Enter your password" required validationMessage="Please enter your password" /></div></div>'
                   + '</li>'
                   +'<li><div class="form-group"><label class="col-sm-3 control-label" style="padding:0;">Email:</label><div class="col-sm-9">'
                        +'<input class="form-control" style="width:100%" type="email" id="email" name="email" placeholder="abc@email.com" required data-email-msg="Email format is not valid" />'
                    +'</li>'
                   
                     + ' <li><div class="form-group"><label class="col-sm-3 control-label"></label><div class=" btn-dangnhap col-sm-9"><a href=" ' + domain + '/admin/forgot">Forgot your password? </a><a data-toggle="modal" href="#myModal" class="sigin_pop_new close_open">Sign in </a><button id="submitButton" class="btn btn-primary">Sign up</button></div>'
                    +'</li>'

                   + '<div id="cis"></div>'
                +'</ul>'
            +'</fieldset>'
        +'</form>'

       +' </div>'

      +'</div>'
    +'</div>'
    +'<script src=" ' + domain + '/js/ajax.js"></script>'
+'</div>';

        
        
        $('body > .container').prepend(txt);
    }) ; 
//chang pass function

$('.changepass').click(function()
    {
        var txt=   '<div class="content clearfix"><div id="nav1"><ul class="me-nu1  nav nav-pills nav-stacked"><li class="menu-nav active"><a href="#">Change Password</a></li></ul></div><div class="clearfix bottom-line "></div>'
                         + ' <div class="col-md-12 col-sm-9 col-xs-12">'
                        +'	<form id="form3" action="" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">'
                                +	'<fieldset>'
                                 +	  ' <legend>Change personal password</legend>'
                                      +  '	<ul>'
                                         +   ' <li>'
                                            +   '	 <div class="form-group">'
    										+		'<label class="col-sm-3 control-label">Current Password:</label>'
   												+	'	 <div class="col-sm-9">'
													+	'	<input  class="form-control" type="password"  id="inputPassword" placeholder="Current Password" name="password" class="form-control" required="">   '
                                                     +   '  </div>'
 											+'	 </div>'
                                            +' </li>'
                                            + '<li>'
                                             +  '	 <div class="form-group">'
    											+'	<label class="col-sm-3 control-label">New Password:</label>'
   												+	'	 <div class="col-sm-9">'
												+			'<input class="form-control" type="password"  id="inputPassword" placeholder="New Password" name="passwordrepeat1" class="form-control" required="">   '
                                                  +        '</div>'
 												+ '</div>'
                                            +' </li>'
                                           +  '<li>'
                                           +    	' <div class="form-group">'
    										+		'<label class="col-sm-3 control-label">Retype password:</label>'
   													+	' <div class="col-sm-9">'
													+	'	<input  class="form-control" type="password"  id="inputPassword" placeholder="Retype password" name="passwordrepeat2" class="form-control" required="">   '
                                                     +    ' </div>'
 											+	 '</div>'
                                             +'</li>'
                                           + ' <li>'
                                             +	'<div class="form-group">'
                                               + '	<button type="submit" id="submitButton" class="btn btn-primary">Send</button>'

                                              + ' </div>'
                                           + ' </li>'
                                            + '<div id="cis"></div>'
                                           + ' </ul>'
                                        + '</fieldset>'
                                    +' </form>'
                                     +'<script src=" ' + domain + '/js/ajax.js"></script>'
                        +'</div></div>';
                        $('.page_content').html(txt);
    });
       $('.changeava').click(function()
    {
        $.ajax({
               //type: "POST",
               url: domain + "/admin/changeavatar",
               
               success: function(result){
                           
                                $('.page_content').html(result);
                                
                           
                       }
   });
   return false;
    });
     $('.creat_channel').click(function()
    {
        $.ajax({
               //type: "POST",
               url: domain + "/channel",
               
               success: function(result){
                           
                                $('.page_content').html(result);
                                
                           
                       }
   });
   return false;
    });
	$('.edit_channel').click(function()
    {
        $.ajax({
               type: "POST",
               url: domain + "/channel/edit",
               
               success: function(result){
                           
                                $('.page_content').html(result);
                                
                           
                       }
   });
   return false;
    });
   
    
$('button.delete-video').click(function(){
	$('form#video-delete>div>input.video-id').val($(this).val());
});
$('form#video-delete>div>button.check-delete').click(function(){
var seriecode=$('form#video-delete>div>input.video-id').val();
//var code=$('form#video-delete>div>input.playlist-code').val();


$.ajax({
		type: "POST",
		url: domain + "/main/delete",
		
		data: {video:seriecode},
		beforeSend : function(){
			console.log("testing");
			$('.choose-content').html('<img src=" ' + domain + '/img/loading.gif">');
		},
		success: function(data){
			if(!data){                                
				$('.result-delete').html('<div class="alert alert-danger">There was an error occurred</div> ');

			}else 
			{
				console.log(data);
				$('.result-delete').html('<div class="alert alert-success">Video was removed</div> ');
				location.reload();
			}
		}
	});
	return false;

});
$('.change-screen>button.change').click(function()
{
	$('.page_content').html('<img src=" ' + domain + '/img/loading.gif">');
	var txt = '<div class="content clearfix"><div id="nav1"><ul class="me-nu1  nav nav-pills nav-stacked"><li class="menu-nav active"><a href="#">Change Wallpaper</a></li></ul></div><div class="clearfix bottom-line "></div>'

+'<div class="avata col-md-12 col-sm-9 col-xs-12">'
	+'<div class="avata col-md-3">'
		+'<p>Chọn ảnh khác</p>'
	+'</div>'
	+'<div class="avata col-md-9">'
		+'<form id="form6" method="post"	action= " ' + domain + '/channel/changeimg" enctype="multipart/form-data">'
			+'<label for="file">Filename:(<5Mb)</label>'
			+'<input type="file" name="imagefile" id="imagefile"><br>'

			+'<button id="submitButton" class="btn btn-primary">change</button>'
		+'</form>'
	   +'<div id="cis"></div>'
	+'</div>'
	+'<script src=" ' + domain + '/js/ajax.js"></script>'
+'</div></div>';
	$('.page_content').html(txt);
   return false;
    });
});

//compare 

var check="";
var check2="";

function vntoen(str)
{
	var codeVN=new Array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
"ế","ệ","ể","ễ",
"ì","í","ị","ỉ","ĩ",
"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
"ờ","ớ","ợ","ở","ỡ",
"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
"ỳ","ý","ỵ","ỷ","ỹ",
"đ",
"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
"Ằ","Ắ","Ặ","Ẳ","Ẵ",
"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
"Ì","Í","Ị","Ỉ","Ĩ",
"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
"Đ"," ");
var codeEN=new Array("a","a","a","a","a","a","a","a","a","a","a",
"a","a","a","a","a","a",
"e","e","e","e","e","e","e","e","e","e","e",
"i","i","i","i","i",
"o","o","o","o","o","o","o","o","o","o","o","o",
"o","o","o","o","o",
"u","u","u","u","u","u","u","u","u","u","u",
"y","y","y","y","y",
"d",
"A","A","A","A","A","A","A","A","A","A","A","A",
"A","A","A","A","A",
"E","E","E","E","E","E","E","E","E","E","E",
"I","I","I","I","I",
"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
"U","U","U","U","U","U","U","U","U","U","U",
"Y","Y","Y","Y","Y",
"D","-");

for(var i=0;i<codeVN.length;i++)
	{
		str=str.replace(RegExp(codeVN[i],"g"),codeEN[i]);
	}
	return str;
}
function compare()
{
	var channel_name=$("#channel_name").val();
if(channel_name!=check){
	$("#channel_code").val(vntoen(channel_name));
	check=channel_name;
	}

	
	var channel_cod=$("#channel_code").val();
	if(channel_cod!=check2){

     $.ajax({
               type: "POST",
               url: domain + "/channel/compare",
			   data: { channel_code: channel_cod},
			    beforeSend : function(){
               $('#load_channel').html('<img src=" ' + domain + '/img/loading.gif">');
			   },
               success: function(result){
			   
								if(result){
									$('#load_channel').html('<div class="alert alert-success" role="alert">to accept</div>');
									$('button.compare-submit').prop("disabled", false);
									}
									else{
										$('#load_channel').html('<div class="alert alert-warning" role="alert">Choose another name</div>');
										$('button.compare-submit').prop({disabled: true});
									}
                                
                           
                       }
	});
	check2=channel_cod;
	}
}