jQuery(document).ready(function($){
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
               url: "http://clipmediagroup.eu.localhost:1810/channel/compare",
			   data: { channel_code: channel_cod},
			    beforeSend : function(){
               $('#load_channel').html('<img src="http://clipmediagroup.eu.localhost:1810/img/loading.gif">');
			   },
               success: function(result){
			   
								if(result){
									$('#load_channel').html('<div class="alert alert-success" role="alert">Chấp nhận</div>');
									//$('button.compare-submit').prop("disabled", false);
									}
									else{
										$('#load_channel').html('<div class="alert alert-warning" role="alert">Chọn tên khác</div>');
									}
                                
                           
                       }
	});
	check2=channel_cod;
	}

	//console.log(channel_cod);

	
}



/*

setInterval(function(){
//next
var channel_name=$("#channel_name").val();

if(channel_name!=check){

	$("#channel_code").val(vntoen(channel_name));
	check=channel_name;
}

},3000);
	setInterval(function(){
	
	var channel_cod=$("#channel_code").val();
	if(channel_cod!=check2){

     $.ajax({
               type: "POST",
               url: "http://clipmediagroup.eu.localhost:1810/channel/compare",
			   data: { channel_code: channel_cod},
			    beforeSend : function(){
               $('#load_channel').html('<img src="http://clipmediagroup.eu.localhost:1810/img/loading.gif">');
			   },
               success: function(result){
                           
                                $('#load_channel').html(result);
                                
                           
                       }
	});
	check2=channel_cod;
	}

	//console.log(channel_cod);

	},3000);
*/
});