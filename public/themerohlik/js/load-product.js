$(function () {
    var url_Ajax = $('#url-pro').val();
    var url = domain +'/loadproduct/loadproduct';
	var idcat=$('#id-cat').val();
	var order = $('.filter input[name=pro]:checked').val();
    $.fn.scrollPagination = function (options) {
        var settings = {
            nop: 8,
            offset: 0,
            error: 'Posts!',
            delay: 1000,
            scroll: true
		}
		
        // Extend the options so they work with the plugin
        if (options) {
            $.extend(settings, options);
		}
        // For each so that we keep chainability.
        return this.each(function () {
            // Some variables 
            $this = $(this);
            $settings = settings;
            var offset = $settings.offset;
            var busy = false; // Checks if the scroll action is happening             
            if ($settings.scroll == true)
			$initmessage = '';//Scroll for more or click here
            else
			$initmessage = '';//Click for more			
            // Append custom messages and extra UI
            $this.append('<div class="content-product"></div><div class="loading-bar">' + $initmessage + '</div>');
			//alert(settings.nop);
            function getData() {
                // Post data to ajax.php
                $.post(url, {
                    //action        : 'scrollpagination',
					idcat:idcat,
                    number: settings.nop,
                    offset: offset,
					order: order,
					}, function (data) {
                    //console.log(data);
                    // Change loading bar content (it may have been altered)
                    $this.find('.loading-bar').html($initmessage);
                    // If there is no data returned, there are no more posts to be shown. Show error
                    if (data == "") {
                        //$this.find('.loading-bar').html('<h2>THE END</h1>');	//$settings.error
                        $('.no-data').fadeIn();
					}
                    else {
						
                        // Offset increases
                        offset = offset + $settings.nop;
                        //alert(offset);
                        // Append the data to the content div
                        $this.find('.content-product').append(data);
                        var max_height = 0;
						$(".col-box").each(function () {
							if ($(this).height() > max_height)
							max_height = $(this).height();
						});
						$(".col-box").height(max_height);	
						
						var max_height1 = 0;
						$(".detailclick").each(function () {
							if ($(this).height() > max_height1)
							max_height1 = $(this).height();
						});
						$(".detailclick").height(max_height1);	
						
						busy = false;
					}
					
				});
				
			}
			
			getData(); // Run function initially			
			// If scrolling is enabled
			if ($settings.scroll == true) {
				// .. and the user is scrolling
				$(window).scroll(function () {
					// Check the user is at the bottom of the element
					if ($(window).scrollTop() + $(window).height() > $this.height() && !busy) {
						// Now we are working, so busy is true
						busy = true;
						// Tell the user we're loading posts
						$this.find('.loading-bar').html('<center><div class="spinner spinner--steps icon-spinner" aria-hidden="true"></div></center>');
						
						setTimeout(function () {
							getData();
							
						}, $settings.delay);
						
					}
				});
			}
			
		});
	};
	
});
$(document).delegate("#minus-cart", "click", function () {
	var qty= parseInt($('#qty-cart').val())-1;
	if(qty <1){
		$('#qty-cart').val('1');
		}else{
		$('#qty-cart').val(qty);
	}
});
$(document).delegate("#plus-cart", "click", function () {
	var qty= parseInt($('#qty-cart').val())+1;
    $('#qty-cart').val(qty);
});
$(document).delegate(".wishlist", "click", function () {	
	location.href=domain+'/apotraviny/index/login';		
});
function pluscart(key){
    var qty= parseInt($('#qty'+key).val())+1;
    $('#qty'+key).val(qty);
}
function minuscart(key){
    var qty= parseInt($('#qty'+key).val())-1;
    if(qty <1){
		$('#qty'+key).val('1');
		}else{
		$('#qty'+key).val(qty);
	}
}

function productdetail(key) {
    var values = 'id=' + key;
    var URL= domain +'/getproduct/productdetail';
	//alert(key);
    $.ajax({
        url: URL,
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            //console.log(data);
            $('.product-detail').html(data);
			var max_height1 = 0;
			$(".detailclick").each(function () {
				if ($(this).height() > max_height1)
				max_height1 = $(this).height();
			});
			$(".detailclick").height(max_height1);	
            $('#sp').modal('show');
		},
        error: function () {
            alert("failure");
		}
	});
	
}

function product_Orange(){
    var id_cat=$('#id-cat').val();
    var oder=$('.filter input[name=pro]:checked').val();
    var URL= domain +'/getproductorange/productorange';
	var values='id-cat='+id_cat+'oder'+oder;
    $.ajax({
        url: URL,
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            console.log(data);
            $('.product-detail').html(data);
            $('#sp').modal('show');
		},
        error: function () {
            alert("failure");
		}
	});
}
function orderproduct(){	
	var order = $('.filter input[name=pro]:checked').val();
	var url = $('#url-order').val();	
	location.href=url+order;
}
function updatecart(key) {	
    //var url=document.URL; //Láy đường dẫn hiện tại
    $('#load-img' + key).fadeIn();	
    var qty_old = $('#qty_old' + key).val();
    var qtynew = $('#qty' + key).val();	
	var number_pro =$('#number-pro'+key).val();
	if(parseInt(qtynew) <= 0 || parseInt(qtynew) > number_pro){
		$('#load-img' + key).fadeOut();
		alert(' Počet výrobků nesmí být menší než 0 nebo větší než '+number_pro);
		$('#qty' + key).val(qty_old);
		}else{
		var qty_data = parseInt(qtynew) - parseInt(qty_old);//lây số lượng mới trừ đi số lượng cũ 
		var values = 'id-product=' + key + '&qty=' + qty_data; // số lượng này sẽ được cộng với só lượng đã có trong SecSion Cart để được số lượng update
		$.ajax({
			url:  domain +'/shoppingcart/updatecart',
			type: "post",
			data: values,
			cache: false,
			success: function (data) {
				console.log(data);
				//location.href = url;       
				$('#load-img' + key).fadeOut();
				window.location= domain +'/shoppingcart/viewcart';
			},
			error: function () {
				alert("failure");
			}
		});
	}
	
}
function deleteaction(key){
	var geturl=$('#url').val();
	var URL =domain+'/shoppingcart/delcart/'+key;
	$('#btn-del').html('<a href='+URL+'> <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>');
	$('#del').modal('show');
}
function get_valuecheckout(){
	var value_radio=$('input[name="checkout"]:checked').val();
	if(value_radio =='0'){
		$('.form-checkout').attr('action', domain +'/shoppingcart/checkout');
		}else{
		$('.form-checkout').attr('action', domain +'/shoppingcart/checkoutpaypal');	
	}
}
function register(){
	var email=$('#email').val();
	var password=$('#password').val();
	var phone=$('#phone').val();
	if(email =='' || password =='' || phone ==''){
		$('#error').html(' <div class="alert alert-danger" role="alert">Musíte zadat všechny údaje</div>');
		}else{
		var data='email='+email+'&password='+password+'&phone='+phone;
		console.log(data);
		$.ajax({
			url:  domain +'/customer/register',
			type: "post",
			data: data,
			cache: false,
			success: function (data) {
				console.log(data);
				if (data != ''){
					$('#error').html(' <div class="alert alert-danger" role="alert">'+data+'</div>');
					}else{
					alert('đăng ký thành công');
				}
				
			},
			error: function () {
				alert("failure");
			}
		});
	}
}
function login(){
	var email=$('#mail-login').val();
	var password=$('#pass-login').val();
	if(email =='' || password ==''){
		$('#error-login').html(' <div class="alert alert-danger" role="alert">Musíte zadat všechny údaje</div>');
		}else{
		var data='email='+email+'&password='+password;
		$.ajax({
			url:  domain +'/customer/login',
			type: "post",
			data: data,
			cache: false,
			success: function (data) {
				console.log(data);
				if (data != ''){
					$('#error-login').html(' <div class="alert alert-danger" role="alert">'+data+'</div>');
					}else{
					window.location=domain+'/apotraviny/index';
				}
				
			},
			error: function () {
				alert("failure");
			}
		});
	}
}
function forgetpass(){
	var email=$('#email-forget').val();
	if(email ==''){
		$('#error-forget').html(' <div class="alert alert-danger" role="alert">Musíte zadat všechny údaje</div>');
		}else{
		var datas='email='+email;
		$.ajax({
			url:  domain +'/customer/forgetpass',
			type: "post",
			data: datas,
			cache: false,
			success: function (data) {
				console.log(data);
				if (data != ''){
					$('#error-forget').html(' <div class="alert alert-danger" role="alert">'+data+'</div>');
				}
				if(data ==''){
					$('.get-mail').html('<h4>Nové heslo bylo zasláno námi na Váš email. Zkontrolujte prosím svůj e-mail</4>');
				}
				
				
			},
			error: function () {
				alert("failure");
			}
		});
	}
}
function add_address(){
	var address=$('#address').val();
	if(address ==''){
		$('#error-addres').html(' <div class="alert alert-danger" role="alert">Musíte zadat všechny údaje</div>');
		}else{
		var datas='address='+address;
		$.ajax({
			url:  domain +'/customer/address',
			type: "post",
			data: datas,
			cache: false,
			success: function (data) {
				console.log(data);			
				$('#error-addres').html(' <div class="alert alert-danger" role="alert">'+data+'</div>');
				
			},
			error: function () {
				alert("failure");
			}
		});
	}
}
function registeremail(){
	var email = $('#email-rg').val();
	if(email ==''){
		alert('Chưa nhập địa chỉ Email');
		}else if(!ValidateEmail(email)){
		alert('Email không đúng định dạng');
		}else{
		var data='email='+email;
		$.ajax({
			url:  domain +'/customer/registeremail',
			type: "post",
			data: data,
			cache: false,
			success: function (data) {
				//console.log(data);
				if(data =='sucess'){
					alert('Đăng ký thành công');
					$('#email-rg').val('');
					}else{
					alert('Email này đã được đăng ký');
					$('#email-rg').val('');
				}
			},
			error: function () {
				alert("failure");
			}
		});
	}
}
function addwishlist(key) {
    var values = 'id_pro=' + key;
    $.ajax({
        url: domain+"/customer/wishlist/addwishlist",
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            console.log(data);
            if (data === 'sucess') {
				//location.href=domain+'/customer/wishlist/wishlistindex';
				alert('Přidat produkty do seznamu oblíbených úspěchu');
				location.reload();
			}
            else if (data == 'Error') {				
				alert('Produkt je již ve vašem seznamu oblíbených');
			}
			
		},
        error: function () {
            alert("failure");
		}
	});
	
}
function deleitemswish(key,flag) {
    var url = domain+'/customer/wishlist/deletewishlist/'+ key+'/'+flag;
	var get_url ='<a href="'+url+'"><button type="button" class="btn btn-primary">Krk</button></a>';
	$('#md-bt').html(get_url);
	if(flag == 0){
   $('#md-wsl').modal('show');
	}else{	
	 $('#md-wsl-del').modal('show');
	}
	
}
function ValidateEmail(email) {
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
};
$(function(){
	
	$("#form-checkout").validate({
        rules: {
            name: {
                required: true,                
			},
			phone:{
				required: true,
			},
            email: {
                required: true,
                email:true,
			},
			address: {
                required: true,               
			},
			checkout: {
                required: true,               
			},
			time: {
                required: true,               
			},
		},
        messages: {
            name: {
                required: "Toto pole je povinné.",                
			},
			phone: {
                required: "Toto pole je povinné.",
                
			},
            email: {
                required: "Toto pole je povinné.",
                email: "Prosím zadejte platnou emailovou adresu",                
			},
			address: {
                required: "Toto pole je povinné.",
                
			},
			checkout: {
                required: "Toto pole je povinné.",
                
			},
			time: {
                required: "Toto pole je povinné.",
                
			},
		}
		
	});// End Valide Form register
	$('#form-wishl').validate();
	$('#wsl-regis').click(function(){
		$('#dn').modal('show');
	});
	$('#wsl-forgot').click(function(){
		$('#forgetpass').modal('show');
	});	
	var max_height1 = 0;
	$(".detailclick").each(function () {
		if ($(this).height() > max_height1)
		max_height1 = $(this).height();
	});
	$(".detailclick").height(max_height1);
});