$(function(){
	var monthNames = [ "January", "February", "March", "April", "May", "June",
	"July", "August", "September", "October", "November", "December" ];
	
	for (i = new Date().getFullYear(); i > 1900; i--){
		$('#years').append($('<option value="'+ i +' " />').val(i).html(i));
	}
    
	for (i = 1; i < 13; i++){
		$('#months').append($('<option value="'+ i +' "  />').val(i).html(i));
	}
	updateNumberOfDays(); 
    
	$('#years, #months').on("change", function(){
		updateNumberOfDays(); 
	});	
});

function updateNumberOfDays(){
    $('#days').html('');
    month=$('#months').val();
    year=$('#years').val();
    days=daysInMonth(month, year);
	
    for(i=1; i < days+1 ; i++){
		$('#days').append($('<option value="'+ i +' "  />').val(i).html(i));
	}
    //$('#message').html(monthNames[month-1]+" in the year "+year+" has <b>"+days+"</b> days");
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}




function setcountdown(theyear,themonth,theday){ 
	yr=theyear;mo=themonth;da=theday 
} 
//Năm,Ngày,Tháng
setcountdown(9999,12,12) 



var occasion="Ngày đẹp trong năm" 
var message_on_occasion="Chào " 

var countdownwidth='480px' 
var countdownheight='20px' 
var countdownbgcolor='lightblack' 
//var opentags='<font face="Verdana"><small>' 
//var closetags='</small></font>' 
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec") 
//var crosscount='' 

function start_countdown(){ 
    if (document.layers) 
	document.countdownnsmain.visibility="show" 
    else if (document.all||document.getElementById) 
	crosscount=document.getElementById&&!document.all?document.getElementById("countdownie") : countdownie 
    countdown() 
} 

if (document.all||document.getElementById) 
document.write('<span id="countdownie" style="width:'+countdownwidth+'; background-color:'+countdownbgcolor+'"></span>') 

window.onload=start_countdown 


function countdown(){ 
    var today=new Date() 
    var todayy=today.getYear() 
    if (todayy < 1000) 
    todayy+=1900 
    var todaym=today.getMonth() 
    var todayd=today.getDate() 
    var todayh=today.getHours() 
    var todaymin=today.getMinutes() 
    var todaysec=today.getSeconds() 
    var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec 
    futurestring=montharray[mo-1]+" "+da+", "+yr 
    dd=Date.parse(futurestring)-Date.parse(todaystring) 
    //dday=Math.floor(dd/(60*60*1000*24)*1) 
    dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1) 
    dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1) 
    dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1) 
    document.getElementById("thoigian-oclock").innerHTML=dhour+ " : "+dmin+ " : "+dsec
	//crosscount.innerHTML="Còn  "+dhour+" Giờ, "+dmin+" Phút "+dsec+" Giây nữa là đến  "+occasion+closetags 
    setTimeout("countdown()",1000) 
} 

function addcart(key) {
	//$('html, body').animate({scrollTop : 0},700);
    var qty = $('#getqty' + key).val();
	var number_pro =$('#number-pro'+key).val();	// số lượng sản phẩm trong kho
	if(parseInt(qty) > parseInt(number_pro)){
	alert('Số lượng sản phẩm không được vượt quá '+ number_pro);
	$('#getqty' + key).val('1');
	}else if(parseInt(qty) <= 0){	
	alert('Số lượng sản phẩm phải lớn hơn 0');	
	$('#getqty' + key).val('1');	
	}else{
    var values = 'id_pro=' + key + '&qty=' + qty +'&number_pro='+number_pro;
    $.ajax({
        url: domain+"/shoppingcart/lazada/addcart",
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
           // console.log(data);
			if(data =='error'){
				alert('Sản phẩm này đã có trong giỏ hàng. Số lượng sản phẩm trong giỏ hàng không được vượt quá '+ number_pro );
			}else{
			$('#body_cart').html(data);			
			$('#number-cart').html($('#get-count-cart').val());
			$('.text-giohang').html($('#get-count-cart').val());
			$('#product').modal('show');
            //var vt = data.indexOf("-");
            //var count_number = data.substr(-1, vt);
            //$('#count-cart').html(count_number + ' items');
			
			}// end if
		},
        error: function () {
            alert("failure");
		}
	});
	}
	
}
function updatecart(key) {	
	//var qty =$('input[name="qty[]"]');	
    var qty_old = $('#qty_old' + key).val();
    var qtynew = $('#qty' + key).val();	
	var number_pro =$('#number-pro'+key).val();	
	if(parseInt(qtynew) > parseInt(number_pro)){
	alert('Số lượng sản phẩm không được vượt quá '+ number_pro);
	$('#qty' + key).val(qty_old);
	}else if(parseInt(qtynew) <= 0){	
	alert('Số lượng sản phẩm phải lớn hơn 0');
	$('#qty' + key).val(qty_old);	
	}else{
	$('#center-cart').fadeOut();
	$('.img-load').show();
    var qty_data = parseInt(qtynew) - parseInt(qty_old);//lây số lượng mới trừ đi số lượng cũ 
    var values = 'id_pro=' + key + '&qty=' + qty_data; // số lượng này sẽ được cộng với só lượng đã có trong 
    $.ajax({
        url: domain+"/shoppingcart/lazada/updatecart",
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            //console.log(data);
			$('#center-cart').fadeIn();
			$('.img-load').hide();
			$('#body_cart').html(data);		
		},
        error: function () {
            alert("failure");
		}
	});
	}
	
}

function deletecart(key) {	
	$('#center-cart').hide();
	$('.img-load').show();
    var values = 'id_pro=' + key;
    $.ajax({
        url: domain+"/shoppingcart/lazada/delcart",
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            //console.log(data);
			$('#center-cart').show();
			$('.img-load').hide();
			$('#body_cart').html(data);			
			$('#number-cart').html($('#get-count-cart').val());
			$('.text-giohang').html($('#get-count-cart').val());
			//$('#product').modal('show');           
			
			
		},
        error: function () {
            alert("failure");
		}
	});
	
}
function get_city() {		
    var values = 'id_city=' + $('#city').val();
    $.ajax({
        url:  sessionStorage.domain+"/shoppingcart/lazada/getcity",
        type: "post",
        data: values,
        cache: false,
        success: function (data) {
            //console.log(data);
			$('#quanhuyen').html(data);
			
		},
        error: function () {
            alert("failure");
		}
	});
	
}
function get_valuecheckout(){
	var value_radio=$('input[name="checkout"]:checked').val();
	if(value_radio =='0'){
	$('.form-checkout').attr('action', sessionStorage.domain +'/shoppingcart/lazada/checkout');
	}else{
	$('.form-checkout').attr('action', sessionStorage.domain +'/shoppingcart/lazada/checkoutpaypal');	
	}
}

function register(){
	var email=$('#email').val();
	var password=$('#password').val();
	var phone=$('#phone').val();	
	var data='email='+email+'&password='+password+'&phone='+phone;
	//console.log(data);
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
function buynow(key){
	var data='id_pro='+key;
	
	//console.log(data);
	$.ajax({
        url:  domain +'/lazada/index/productbuynow',
        type: "post",
        data: data,
        cache: false,
        success: function (data) {
            //console.log(data);
			$('#body_buynow').html(data);
           $('#buynow').modal('show');
        },
        error: function () {
            alert("failure");
        }
	});
}
function registeremail(){
	var email = $('#email-rg').val();
	if(email ==''){
		alert('Chưa nhập địa chỉ email');		
	} else if(!ValidateEmail(email)){
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
function ValidateEmail(email) {
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
};

function vieworder(key){
	$('.detail-order'+key).slideToggle();
}
function orderproduct(){
	var order = $('#order').val();
	var url = $('#url-order').val();
	location.href=url+order;
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
				alert('Thêm sản phẩm vào danh sách yêu thích thành công');
				location.reload();
			}
            else if (data == 'Error') {				
               alert('Sản phẩm này đã có trong dánh sách yêu thích của bạn');
			}
			
		},
        error: function () {
            alert("failure");
		}
	});
	
}
function deleitemswish(key,flag) {	
    var url = domain+'/customer/wishlist/deletefavorite/'+ key+'/'+flag;
	var get_url ='<a href="'+url+'"><button type="button" class="btn btn-primary">Có</button></a>';
	$('#md-bt').html(get_url);
	if(flag == 1 || flag == 2){
	$('#md-get-ws').modal('show');
	}else{
	$('#md-wsl').modal('show');
	}
}

$(function(){	
	$('input[name="check"]').click(function(){
		var get_radio=$('input[name="check"]:checked').val();
		if(get_radio == '0'){
			$( ".input-check" ).prop( "disabled", true );
			$('#form-checks').attr('action', 'javascript:void(0);');		
			$('#continue-checkout').click(function(){
				$('.checkout-guest').slideToggle();
				$('.type-checkout').fadeOut();
			});
			}else{
			$( ".input-check" ).prop( "disabled", false );
			$('#form-checks').attr('action', sessionStorage.domain+'/shoppingcart/lazada/checkout');
		}
	});
	
$("#form-checks").validate();// End Valide Form register
$("#submitform").validate();
$('#form-login').validate();
$('#form-forgetpass').validate();
$('#form-changepass').validate();
$('#form-buynow').validate();
$("#form-regisers").validate({
	
	rules: {
            password: {
                required: true,
                minlength: 6
			},
            re_pass: {
                required: true,
                minlength: 6,
                equalTo: "#password"
			},
		},
        messages: {
            password: {
                required: "This field is required.",
                minlength: "Your password must be at least 6 characters long"
			},
            re_pass: {
                required: "This field is required.",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
			}
		}
});

$('.no-user').click(function(){
	$('#modal-login').modal('show');
});
$('#my-order').click(function(){
	$('#modal-login').modal('show');
});
$('.wishlist').click(function(){
	$('#modal-login').modal('show');
});
$('#regis').click(function(){
	$('#modal-register').modal('show');
});

$('#sizing-addon1').click(function(){
	$('#form-searchs').submit();
})
 var max_height = 0;
    $(".img-sp-fav").each(function () {
        if ($(this).height() > max_height)
		max_height = $(this).height();
	});
$(".img-sp-fav").height(max_height);

 var max_heights = 0;
    $(".height-name").each(function () {
        if ($(this).height() > max_heights)
		max_heights = $(this).height();
	});
$(".height-name").height(max_heights);

$('#submit-form').click(function(){
	var validate_name= /[^A-Za-z]/; // ^[A-Za-z0-9-]/
	var name = $('#Name').val();
	if(validate_name.test(name)){
		$('.get-error').html('Họ tên không được nhập các ký tự đặc biệt');
		return false;
	}else{
		$('.get-error').html('');
	}
})
});