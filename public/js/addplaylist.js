
$('.addvideo').click(function(){
	$('.type-add-video').css('display','block');

});
$('li.type-add').click(function(){
	$('li.type-add').removeClass('active');
	$(this).addClass('active');
	if($(this).hasClass('add-search')){$('.search-content').css('display','block');$('.url-content').css('display','none');$('.user-content').css('display','none');}
if($(this).hasClass('add-url')){ $('.search-content').css('display','none');$('.url-content').css('display','block');$('.user-content').css('display','none');}
if($(this).hasClass('add-user')){$('.search-content').css('display','none');$('.url-content').css('display','none');$('.user-content').css('display','block');}

});
$('button.delete-video').click(function(){
			k=$(this).val();
			console.log(k);
			$('form#video-delete>div>input.video-id').val(k);
			console.log($('form#video-delete>div>input.video-id').val());									

			
		});
$('form#video-delete>div>button.check-delete').click(function(){
	var serie=$('form#video-delete>div>input.video-id').val();
	var code=$('form#video-delete>div>input.playlist-code').val();
	
	console.log(code);
	$.ajax({
			type: "POST",
			url: "http://clipmediagroup.eu.localhost:1810/channel/deletevideo",
			
			data: {playlist:code,video:serie},
			beforeSend : function(){
				console.log("testing");
				$('.choose-content').html('<img src="http://clipmediagroup.eu.localhost:1810/img/loading.gif">');
			},
			success: function(data){
				if(!data){                                
					$('.result-delete').html('<div class="alert alert-danger">Đã có lỗi xảy ra</div> ');

				}else 
				{
					console.log(data);
					$('.result-delete').html('<div class="alert alert-success">'+data+'</div> ');
					location.reload();
				}
			}
		});
		return false;

});
$(".search-form-playlist").submit(function() {
	var kk=$('.playlist-input').val();
	var zz='<button class="search-more btn-primary" value="'+kk+'" onclick="searchmore();">loadmore</button>'; 
	var $form = $(this);
	$.ajax({
		type: "POST",
		url: "http://clipmediagroup.eu.localhost:1810/search/addplaylist",
		data: $form.serialize(),
		beforeSend : function(){
			console.log("testing");
			$('.search-playlist-content').html('<img src="http://clipmediagroup.eu.localhost:1810/img/loading.gif">');
		},
		success: function(data){
			if(!data){
				$('.playlist_crt').html('Error!!!'); 
			}else 
			{
				$('.search-playlist-content').html(data);
				if(!$('.search-more').length){
				$('.search-content').append(zz);}
			}
		}
	});
	return false;
});	
$(".url-form-playlist").submit(function() {
	//var kk=$('.playlist-input').val();
	//var zz='<button class="search-more btn-primary" value="'+kk+'" onclick="searchmore();">loadmore</button>'; 
	var $form = $(this);
	$.ajax({
		type: "POST",
		url: "http://clipmediagroup.eu.localhost:1810/main/addurl",
		data: $form.serialize(),
		beforeSend : function(){
			//console.log("testing");
			$('.url-playlist-content').html('<img src="http://clipmediagroup.eu.localhost:1810/img/loading.gif">');
		},
		success: function(data){
			if(!data){
				$('.playlist_crt').html('Error!!!'); 
			}else 
			{
				$('.url-playlist-content').html(data);
				
			}
		}
	});
	return false;
});		


