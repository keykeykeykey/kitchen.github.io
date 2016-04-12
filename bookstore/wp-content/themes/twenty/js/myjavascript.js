/**
 * Created by Administrator on 2016/3/21.
 */
$(function(){
    $('#max-show').change(function(){
        select_change($(this));
    })
    $hiddenVal=$('.hiddenbox').val();
    $('input:checkbox').change(function(){
        $parent=$('.parent_box').val();
        $max_show=$('#max-show option:selected').val();
        check_box($(this),$hiddenVal,$max_show);
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
        $(".search-box").css({
            "-moz-transform":"scale(1,1)",
            "-webkit-transform":"scale(1,1)",
            "-o-transform":"scale(1,1)",
            "-webkit-transition":"all 0.3s ease-in-out",
            "-moz-transition":"all 0.3s ease-in-out"

        })
        $(".close").show();
    })
    $(".close").click(function(){
        $(".search-box").css({
            "-moz-transform":"scale(0,0)",
            "-webkit-transform":"scale(0,0)",
            "-o-transform":"scale(0,0)",
            "-webkit-transition":"all 0.3s ease-in-out",
            "-moz-transition":"all 0.3s ease-in-out"

        })
        setTimeout( add_sublist($(".search-box"),$(".search"),$(this),$(this)),5000)
    })
    $(".add-list").find('span').click(function(){
        show_cate_list($(this));
    })
    $(".center-block").mousemove(function(e){
       check_pic($(this),e);
    })
    $(".center-block").mouseout(function(){
        check_move_out($(this));
    })
    $(".nav-slidebar li").click(function(){
        get_big_img($(this),$hiddenVal);
    })
    $(".left-block-nav li").click(function(){
        change_information($(this));
    })
    $(".more-big").click(function(){
        enlarge_img($(this));
    })
    $(".close-chat").click(function(){
        close_chat($(this),-180);
    })
    $(".title").click(function(){
        close_chat($(this),10);
    })
    change_information($(".left-block-nav li").eq(0));
    menu_click();
    ajax_fix();

})
function close_chat(e,w){
    $(".chat").css({
        'right':w,
        "transition":"right 1.5s",
        "-moz-transition":"right 1.5s",
        "-webkit-transition":"right 1.5s",
    })
}
function change_information(e){
    var index= e.index();
    if(index==0){
        $(".info").show();
        $(".data").hide();
        e.parent().find("li").removeClass("active");
        e.addClass("active");
    }else{
        $(".info").hide();
        $(".data").show();
        e.parent().find("li").removeClass("active");
        e.addClass("active");
    }

}
 var new_num=0;
function next_product(){

    if(new_num<14){
        $(".pre").show()
        var lists=$(".products").find("li");

        lists.each(function(index,element){
            if(new_num==index){
                $(this).hide(600);
            }
        })
        new_num++;
    }
    else{
        $(".next-pro").hide();
    }


}
function pre_product(){
   if(new_num>0){

       $(".next-pro").show();
       new_num--;
       var lists=$(".products").find("li");
       lists.each(function(index,element){
           if(new_num==index){
               $(this).show(600);
           }
       })

   }
    else{
       $(".pre").hide()
   }
}
var scrolls=1;
function next_silimar_product(){

    if(scrolls<14){
        $(".similar_p").show();
        var w=216*scrolls;
        var lists=$(".similars").find("li");
        lists.each(function(index,element){
            if(index==eval(scrolls-1)){
                //$(this).css("margin-left",-w);
                $(this).css({
                    "margin-left":-w,
                    "transition":"margin-left 1.5s",
                    "-moz-transition":"margin-left 1.5s",
                    "-webkit-transition":"margin-left 1.5s",
                })
            }
        })
        scrolls++;
    }
    else{
        $(".similar_n").hide();
    }
}
function pre_silimar_product(){
    if(scrolls>0){
        $(".similar_n").show();
        scrolls--;
        var w=216*scrolls;
        var lists=$(".similars").find("li");
        lists.each(function(index,element){
            if(index==eval(scrolls-1)){
                $(this).css({
                    "margin-left":0,
                    "transition":"margin-left 1s",
                    "-moz-transition":"margin-left 1s",
                    "-webkit-transition":"margin-left 1s",
                })

            }
        })
    }
    else{
        $(".similar_p").hide();
    }

}
function get_big_img(e,hid){
    $ajreturn= $.ajax({
        url:hid,
        type:"GET",
        datatType:"html",
        data:{
            index: e.index(),
            action:'get_pic',
        },
        success:function(datas){
                    console.log(datas);
            $(".center-block").find("img").remove();
            $(".center-block").append(datas);

                },
        error:function(){
            console.log('error');
        }
    })
}
function check_move_out(e){
    e.find('img').css({"height":725,
        "width":725,
        "top":0,
        "left":0})
}
function check_pic(e,pointer){
    var x=pointer.pageX;
    var y=pointer.pageY;
    var o_x=x-250;
    var o_y=y-350;
    if(o_x>275){
        o_x=275;
    }
    if(o_y>275){
        o_y=275;
    }
    e.find('img').css({"height":1000,
                        "width":1000,
                        "top":-o_y,
                        "left":-o_x})

}
function menu_click(){
    $type=$('#cate_name').val();



    $child=$(".menu-kitchen-container").find("a");
    $child.each(function(){
        if($type==$(this).html()){
            $(this).addClass("active");
        }
        else{
            console.log($(this).html());
        }
    })
}
function show_cate_list(e){
    if(e.parent().find(".food-subcate").css('display')=="none"){
        e.parent().find(".food-subcate").css('display','block');
        e.html("-");
    }else{
        e.parent().find(".food-subcate").css('display','none');
        e.html("+");
    }
}
function page_button(e){
    console.log("cilck");
    e.css({
        "background":"#ED7743",
        "color":"white"
    })
}
function select_change(e){
    $hiddenVal=$('.hiddenbox').val();
    ajax_fix($hiddenVal, e.val());
}
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
function enlarge_img(t){
    console.log("mmmmm");
    var e=$(t);
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
        "z-index":100,

    })
    $("#show-img").css({
        "display":"block",
        "position":"fixed",
        "width":$w+"px",
        "height":$h+"px",
        "background":"#5E5652",
        "top":0,
        "left":0,
        "opacity":"0.9",
        "z-index":100,

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
function check_box(e,hid,max_show){

    if(e.is(':checked')){
        check_arr.push(e.val());
        $(".select-panel").show();
        $str="<div class='add' id='"+e.val()+"'>"+e.val()+"</div>"
        $(".class-list").append($str);
        $(".add").click(function(){
            //$(this).remove();
            $("#"+ e.val()).remove();
            e.attr("checked",false);
            check_box(e,hid,max_show);
            if($(".class-list").html()==""||$(".class-list").html()==null){

                $(".s_title").hide();

            }
        })
        $(".s_title").show();
        ajax_fix(hid,max_show);
    }else{
        $val= e.val();
        for(var times=0;times<check_arr.length;times++){
            if(check_arr[times]== e.val()){
                check_arr.splice(times,1);
                ajax_fix(hid,max_show);
            }else{
                console.log("times"+ check_arr[times]);
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
function ajax_fix(hid,max_show,page){

     var type=$('#type').val();
    if(check_arr.length==0){
        check_arr.push(type);
    }
    else if(check_arr.length==2){
        for(var a=0;a<check_arr.length;a++){
           if(check_arr[a]==type){
              check_arr.splice(a,1);
           }
        }
    }
    if(hid==""||hid==null){
        hid='http://localhost/bookstore/wp-admin/admin-ajax.php';
    }
    if(max_show==""||max_show==null){
        max_show=$('#max-show option:selected').val();
    }
    if(page==""||page==null){
       page=1;
    }
    console.log(check_arr);
    console.log(hid);
    $ajreturn= $.ajax({
        url:hid,
        type:"GET",
        datatType:"json",
        data:{
            checkvalue:check_arr,
            action:'topost',
            show:-1
        },
        success:function(data){
            console.log(data);
            //die()
;            //var res=eval('('+data+')');
            var res=JSON.parse(data);
            //var res=data;
            $(".food-img-list").find("li").remove();

           console.log("max-show"+max_show);
            var max;
            var but_num=1;
            if(max_show>res.length){

                max=res.length;

            }else{
                max=max_show;
                but_num=Math.ceil(res.length/max_show);
            }
            $(".food-img-list").find("li").remove();
            var post_count=eval(page-1)*max;
            var post_counts=page*max;
            $(".center").find("a").remove();

            $(".center").append("<a class='pre' onclick=ajax_fix('','',"+eval(page-1)+")>< Previo</a>");

            for(var i=post_count;i<post_counts;i++){
                $(".food-img-list").find('.container-ul').append(res[i]);
            }
            $(".center").find('li').remove();
            for(var j=0;j<but_num;j++){
                if(eval(j+1)==page){

                    $str="<li><button class='but_onclick' onclick=ajax_fix('','',"+eval(j+1)+")>"+eval(j+1)+"</button></li>";
                    $(".center").find('ul').append($str);
                }else{
                    $str="<li><button  onclick=ajax_fix('','',"+eval(j+1)+")>"+eval(j+1)+"</button></li>";
                    $(".center").find('ul').append($str);
                }
            }
            $numbers=$(".center li").length;
            $(".center").append("<a class='next' onclick=ajax_fix('','',"+eval(page+1)+")> Siguiente ></a>");
            $(".next").css("left",eval($numbers*30+130))

        },
        error:function(){
            console.log('error');
        }
    })

}


/******
 *
 *
 *
 *
 *
 * ****/
