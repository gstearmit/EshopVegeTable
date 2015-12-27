var domain  = localStorage.getItem("doaminname"); 
var glob=2;
$(".loadmore").click(function(e) {
     $('.feature').fadeOut("slow"); 
   e = location.pathname;
   $.ajax({
               type: "POST",
               url: domain + "/main/loadmore",
               data: {idcode:e,page:glob},
               success: function(data){
                            $('.feature').html(data);
                            $('.feature').fadeIn("slow");
                            glob++;
                       }
   });
   return false;
});
var kpage=2;
function searchmore(){
	
		var skey=$('button.search-more').val();
		$('.search-playlist-content').fadeOut("slow");
		$.ajax({
		type: "POST",
		url: domain + "/search/addplaylist",
		data: {page:kpage,searchplaylist:skey},
		
		success: function(data){

				$('.search-playlist-content').html(data);
				$('.search-playlist-content').fadeIn("slow");
				
			kpage++;
		}
	});	
}