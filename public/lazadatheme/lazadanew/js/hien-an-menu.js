$(document).ready(function(){
    
    $(".khuyenmai").hover(function(){
        $(".box-khuyenmai").show();
        $(".box-tivi-video").hide();
    });
    $(".tivi_video").hover(function(){
        $(".box-tivi-video").show();
        $(".box-khuyenmi").hide();
    });
});
