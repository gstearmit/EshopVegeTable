jQuery(document).ready(function($){

setInterval(function(){

//next

var next=$("#myCarousel > .carousel-inner > div.active").next().html();
if(!prev){
    prev=$("#myCarousel > .carousel-inner > div:first-child").html();
};
var next_check=$("#myCarousel > a.right").html();
if(next==next_check){}
else{
$("#myCarousel > a.right").html(next);
}
//prev
var prev=$("#myCarousel > .carousel-inner > div.active").prev().html();
if(!prev){
    prev=$("#myCarousel > .carousel-inner > div:last-child").html();
};
var pre_check=$("#myCarousel > a.left").html();
if(next==next_check){}
else{
$("#myCarousel > a.left").html(prev);
}


},1000);



});