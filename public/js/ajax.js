var domain  = localStorage.getItem("doaminname"); 

 
$('.close').click(function(){
        $('body > .modal-backdrop').remove();
        $('body').toggleClass('modal-open');
        $('.container > #myModal').remove();
    });


$("#form1").submit(function() {
   var $form = $(this);
   $.ajax({
               type: "POST",
               url: domain + "/admin/loginajax",
               data: $form.serialize(),
			   	beforeSend : function(){			
  
			   },
               success: function(data){
                            if(!data){
                                $('.modal-body').html('<div class="alert alert-success">Login Success</div> ');
                                 window.location.href = '/';
                            }else 
                            {
                                $('#cis').html('<div class="alert alert-warning">'+data+'</div> ');
                                
                            }
                       }
   });
   return false;
});
$("#form2").submit(function() {
 
   var $form = $(this);
   $.ajax({
               type: "POST",
               url: domain + "/admin/register",
               data: $form.serialize(),
               success: function(data){
                            if(!data){
                                 //$('body > .modal-backdrop').remove();
                                //$('body').toggleClass('modal-open');
                                //$('.container > #myModal').remove();
                                $('.modal-body').html('successful registration');
                                location.reload();
                            
                                
                                
                            }else 
                            {
                                $('#cis').html(data);
                                
                            }
                       }
   });
   return false;
});
//chang pass


$("#form3").submit(function() {
 
   var $form = $(this);
   $.ajax({
               type: "POST",
               url: domain + "/admin/changepass",
               data: $form.serialize(),
               success: function(data){
                            if(!data){
                                 //$('body > .modal-backdrop').remove();
                                //$('body').toggleClass('modal-open');
                                //$('.container > #myModal').remove();
                                $('#cis').html('Change Password Success');
                                //location.reload();
                            
                                
                                
                            }else 
                            {
                                $('#cis').html(data);
                                
                            }
                       }
   });
   return false;
});
$("#form_playlist").submit(function() {
 
   var $form = $(this);
   $.ajax({
               type: "POST",
               url: domain + "/channel/addplaylist",
               data: $form.serialize(),
				beforeSend : function(){
				console.log("testing");
               $('.playlist_crt').html('<img src=" ' + domain + '/img/loading.gif">');
			   },
               success: function(data){
                            if(!data){
                                 //$('body > .modal-backdrop').remove();
                                //$('body').toggleClass('modal-open');
                                //$('.container > #myModal').remove();
                                $('.playlist_crt').html('Error!!!');
                                //location.reload();
								
                            
                                
                                
                            }else 
                            {
							console.log(data);
                                $('.playlist_crt').html('<div class="alert alert-success"> playlist'+data+' was created successfully');
                                
                            }
                       }
   });
   return false;
});
$('#create_playlist').click(function(){
$('.form_playlist').css('display','block');
$('#create_playlist').css('display','none');


});
/*
$("#form5").submit(function() {
 
   var $form = $(this);
   $.ajax({
               type: "POST",
               url: domainname + "/channel",
               data: $form.serialize(),
               success: function(data){
                            if(!data){
                                 //$('body > .modal-backdrop').remove();
                                //$('body').toggleClass('modal-open');
                                //$('.container > #myModal').remove();
                                $('#cis').html('Change Password Success');
                                //location.reload();
                            
                                
                                
                            }else 
                            {
                                $('#cis').html(data);
                                
                            }
                       }
   });
   return false;
});
*/
/*
$(".search-form-playlist").submit(function() { 
	var $form = $(this);
	$('button.search-more').val($(this).val());
	console.log($(this)val());
	$.ajax({
		type: "POST",
		url: domainname + "/search/addplaylist",
		data: $form.serialize(),
		beforeSend : function(){
			console.log("testing");
			$('.search-playlist-content').html('<img src=" ' + domainname + '/img/loading.gif">');
		},
		success: function(data){
			if(!data){
				$('.playlist_crt').html('Error!!!'); 
			}else 
			{
				$('.search-playlist-content').html(data);
			}
		}
	});
	return false;
});*/
$('.close_open').click(function()
    {
        $('body > .modal-backdrop').remove();
        $('body').toggleClass('modal-open');
        $('.container > #myModal').remove();        
    });
    
        $('.sigin_pop_new').on('click',function()
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
                   
                     + ' <li><div class="form-group"><label class="col-sm-3 control-label"></label><div class=" btn-dangnhap col-sm-9"><a href=" ' + domainname + '/admin/forgot">Forgot your password? </a><a data-toggle="modal" href="#myModal" class="sigup_pop_new close_open ">Sign in </a><button id="submitButton" class="btn btn-primary">Sign up</button></div>'
                    +'</li>'
                   + '<div id="cis"></div>'
                +'</ul>'
            +'</fieldset>'
        +'</form>'

       +' </div>'

      +'</div>'
    +'</div>'
    +'<script src=" ' + domainname + '/js/ajax.js"></script>'
+'</div>';

        
        
        $('body > .container').prepend(txt);
    }) ;  
    // singup form 
    
        $('.sigup_pop_new').on('click',function()
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
                   
                     + ' <li><div class="form-group"><label class="col-sm-3 control-label"></label><div class=" btn-dangnhap col-sm-9"><a href=" ' + domainname + '/admin/forgot">Forgot your password? </a><a data-toggle="modal" href="#myModal" class="sigin_pop_new close_open">Sign in </a><button id="submitButton" class="btn btn-primary">Sign up</button></div>'
                    +'</li>'

                   + '<div id="cis"></div>'
                +'</ul>'
            +'</fieldset>'
        +'</form>'

       +' </div>'

      +'</div>'
    +'</div>'
    +'<script src=" ' + domainname + '/js/ajax.js"></script>'
+'</div>';

        
        
        $('body > .container').prepend(txt);
    }) ; 