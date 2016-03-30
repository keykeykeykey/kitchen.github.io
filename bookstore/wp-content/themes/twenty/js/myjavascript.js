/**
 * Created by Administrator on 2016/3/21.
 */
$(function(){
    $('input:checkbox').change(function(){
        $hiddenVal=$('.hiddenbox').val();
        $parent=$('.parent_box').val();
        check_box($(this),$hiddenVal,$parent);
    })
    $(".more-big").click(function(){
        enlarge_img($(this));
    })

    $(".left-block").find($(".hot-sale")).eq(2).remove();
    $(".left-block").find($(".hot-sale")).eq(2).remove();

    $(".nav_pic1").click(function(){
        pic_list($(this));
    })
    $(".nav_pic2").click(function(){
        pic_list($(this));

    })
    $(".nav_pic3").click(function(){
        pic_list($(this));
    })
    pic_list($(".nav_pic1"));
    $(".language").click(function(){
        add_sublist($(this),$(".seletor"),$(".seletor-money"));
    })
    $(".money").click(function(){
        add_sublist($(this),$(".seletor-money"),$(".seletor"));
    })
    $(".search").click(function(){
        add_sublist($(this),$(".search-box"),$(".seletor-money"),$(".seletor"));
    })
    $(".close").click(function(){
        add_sublist($(".search-box"),$(".search"),$(this),$(this));
    })
})
function add_sublist(a,e,c,d){
    if(d){
        if(c.css('display')=="none" && d.css('display')=="none"){
            e.show();
            a.css("opacity",0);
            e.css("opacity",1);

        }
        else{
            c.parent().find("a").css("color","black");
            d.parent().find("a").css("color","black");
            c.hide();
            d.hide();
            e.show();
            a.css("opacity",0);
            e.css("opacity",1);

        }
    }else{
        $display= e.css('display');
        if($display=="none"){
            a.find("a").css("color","#ED7743");
            if(c.css('display')=="none"){
                e.show();
            }else{
                c.parent().find("a").css("color","black");
                c.hide()
                e.show()
            }
        }else{
            e.hide();
            a.find("a").css("color","black");
        }
    }
}
function pic_list(e){
    e.find("a").css("color","#ED7743");
    e.siblings().find("a").css("color","black");
    switch (e.attr("class")){
        case "nav_pic1":
            $(".pro-img-list").show();
            $(".pro-img-new").hide();
            $(".pro-img-old").hide();
            break;
        case "nav_pic2":
            $(".pro-img-list").hide();
            $(".pro-img-new").show();
            $(".pro-img-old").hide();
            break;
        case "nav_pic3":
            $(".pro-img-list").hide();
            $(".pro-img-new").hide();
            $(".pro-img-old").show();
            break;
    }


}
function  nav_seclete(e){
    e.style.display="none";
}
function enlarge_img(e){
    $parent=e.parent();
    $child=$parent.find("img");
    $child1=$child.eq(0);
    $child2=$child1.clone();

    $w=$(window).width();
    $h=$(window).height();

    $str="<div id='show-img'><div id='close'>" +
        "×</div> </div>";

    $("body").append($str);

    $("#close").css({
        "display":"block",
        "position":"absolute",
        "width":30+"px",
        "height":30+"px",
        "background":"black",
        "top":100,
        "left":1000,
        "opacity":"1",
        "cursor":"pointer",
        "color":"white",
        "border-radius":"50px",
        "border":"2px solid white",
        "font-size":"21px",
        "text-align":"center",

    })
    $("#show-img").css({
        "display":"block",
        "position":"fixed",
        "width":$w+"px",
        "height":$h+"px",
        "background":"#5E5652",
        "top":0,
        "left":0,
        "opacity":"0.9"

    })
    $child2.css({
        "position":"fixed",
        "width":400+"px",
        "height":500+"px",
        "top":50+'px',
        "left":400+'px',
        "opacity":"1",

    })
    $("#show-img").append($child2);
    $("#close").click(function(){
        $("#show-img").remove()
    })
}
var check_arr=[];
function check_box(e,hid,p){
    if(e.is(':checked')){
        check_arr.push(e.val());
        ajax_fix(hid);
        $(".select-panel").show();
        $str="<div class='add' id='"+e.val()+"'>"+e.val()+"</div>"
        $(".class-list").append($str);
        $(".add").click(function(){
            $(this).remove();
        })
    }else{
        $val= e.val();
        for(var times=0;times<check_arr.length;times++){
            if(check_arr[times]== e.val()){
                check_arr.splice(times,1);

            }else{
                console.log("times"+ check_arr[times]);
                ajax_fix(hid);
            }
        }
        $("#"+$val).remove();
        if($(".add").siblings()){
            console.log('qqq');
        }else{
            console.log('none');
        }
    }
}
function ajax_fix(hid){
    $ajreturn= $.ajax({
        url:hid,
        type:"GET",
        datatType:"json",
        data:{
            action:'topost',
            checkValue: check_arr
        },
        success:function(data){
            console.log(data);
            //var res=eval('('+data+')');
            var res=JSON.parse(data);
            $(".pro-img-old").find("li").remove();
            for(var i=0;i<res.length;i++){
                $(".pro-img-old").find('.container-ul').append(res[i]);
            }
        },
        error:function(){
            console.log('error');
        }
    })

}
