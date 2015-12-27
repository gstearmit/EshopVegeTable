var domain  = localStorage.getItem("doaminname"); 
$('.manager_video').click(function()
    {
		
        $.ajax({
               type: "POST",
               url: domain + "/main/uservideo",
               data: {idcode:e,page:1},
               success: function(result){
                           
                                $('.sub_content').html('result');
                                
                           
                       }
   });
   return false;
    });