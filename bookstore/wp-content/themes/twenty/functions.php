<?php
function get_post_by_tags($tag){
    $args=array();
}
function get_post_array($type,$num,$c=null)
{
    $args = array(
        'post_type' => 'post',
        'category_name' => $type,
        'numberposts' => $num,
        'orderby' => 'modified',
        'category'=>$c
    );
    $result = get_posts($args);
    return $result;

}
function get_child($type){
    $term_id=get_category_by_slug($type)->term_id;
    $child=get_category_children($term_id);
    $childs=explode("/",$child);

    $arr[][]="";
    foreach($childs as $value){
        if($value!=""&& $value!=null){
            $mes=get_category($value);
            $parentName=get_cat_name($mes->parent);
//        $parent=get_category_parents($value);获得所有的父类
            if($mes->parent!=1){
                $arr[$parentName][]=$mes->cat_name;
            }
        }
    }
    $arr=array_splice($arr,1);
    return $arr;
}
register_nav_menus( array(
    'primary'   => __( '主菜单栏', 'easecloud' ),
    'secondary' => __( '侧边菜单栏', 'easecloud' ),
    'footer' => __( '底部菜单栏', 'easecloud' ),
) );
function ajax_parent($childs){
    $arr=array();
    $parent=$_SESSION['parent'];
//    var_dump($parent);
    foreach($parent as $k=>$v){
        foreach($v as $key=>$value){
            foreach($childs as $c){
                if($k=='Availability'||$k=='category'||$k=='Manufacturer'){
                    if($c==$value){
                        $cat_ID=get_cat_ID($value);
                        $cat=get_category($cat_ID)->slug;
                        $arr[$k][]=$cat;
                    }
                }
            }
        }
    }
    return $arr;
}


$arr[]='';
$cate_members[]=array();
function topost(){

    session_start();
    $cate=$_GET['checkvalue'];
    $parent=ajax_parent($cate);
    $num=count($cate);
    $max_show=$_GET['show'];
    $_SESSION['checkvalue']=$cate;
    if($num==1){
        $getinfo2=single_cate($cate,-1);
        $content=li_content($getinfo2,-1);
    }else{
        $getinfo=get_content($parent);
        $content=li_content($getinfo,-1);
    }
    $json_obj=json_encode($content);
    print_r($json_obj);
    exit;
}
function single_cate($type,$num){
    $cat_ID=get_cat_ID($type[0]);
    $cat=get_category($cat_ID)->slug;
    return get_post_array($cat,$num);
}
function get_content($parent,$max_show){
    $i=0;

    $count=count($parent);
    if($count!=1){
        foreach($parent as $k=>$v){
            $i=$i+1;
            foreach($v as $key=>$value){
                if($i==1){
                    $post_list=get_post_array($value);
                    $cate_members[]=$post_list;
                }else{
                    foreach($cate_members as $list){
                        foreach($list as $item){
                            if(has_category($value,$item)){
                                $arr[]=$item;
                            }
                        }
//                        if(has_category($value,$list)){
//                            $arr[]=$list;
//                        }
                    }
                }
            }
        }
    }
    else{
        foreach($parent as $k=>$v){
            foreach($v as $key=>$value){
                $post_list=get_post_array($value);
                $arr[]=$post_list;
            }
        }
    }
//    return $cate_members;
    return $arr;
}
$arr_select_list[]=array();
function li_content($result,$max_show){
    foreach($result as $r){
        if(is_array($r)){
            foreach($r as $key=>$i){
                $indexImg=get_field('indexImg', $i->ID);
                $price=get_field('price',$i->ID);
                $small1=get_field('small1', $i->ID);
                $small2=get_field('small2', $i->ID);
                $small3=get_field('small3', $i->ID);
                $star=get_field('star',$i->ID);
                $new=get_field('new',$i-ID);
                $hot=get_field('hot',$i-ID);
                $_url=get_template_directory_uri();
                $detail_url=get_home_url()."/detail?id=".$i->ID;
                $str1="";
                $str2="";
                $str3="";
                $str4="";
                for($n=0;$n<$star;$n++){
                    $str1.="<div class='star-on'></div>";
                }
                for($m=0;$m<(5-$star);$m++){
                    $str2.=" <div class='star-off'></div>";
                }
                if($new){
                    $str3.=" <div class='new-sale'>NOUVEAU</div>";
                }
                if($hot){
                    $str4=" <div class='hot-sale'>PROMO！</div>";
                }
                $arr_select_list[]="
      <li class='col-md-4'>
                                                <div class='content-container' id='content-container'>
                                                    <div class='left-block'>
                                                        <div class='product-img-container'>
                                                            <a href='{$detail_url}'>
                                                                <img src='{$indexImg}'>
                                                            </a>
                                                           {$str3}
                                                           {$str4}
                                                        </div>

                                                    </div>
                                                    <div class='right-block'>
                                                            <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                            <div class='content-price'>
                                                                    <span class='pro-price'>$price</span>
                                                                    <span class='old-price'>30.00</span>
                                                                </div>

                                                        </div>

                                                </div>


                                                <div class='content-hide' id='content-hide'>
                                                        <div class='left-block'>
                                                                <div class='product-img-container'>
                                                                        <a href='{$detail_url}'>
                                                                                <img src='{$indexImg}'>
                                                                            </a>
                                                                        <div class='sub-img'>
                                                                                <ul>
                                                                                        <li><a href='{$detail_url}'>
                                                                                                        <img src='{$small1}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li class='sec-img'><a href='{$detail_url}'>
                                                                                                        <img src='{$small2}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li><a href='{$detail_url}'>
                                                                                                        <img src='{$small3}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                    </ul>
                                                                            </div>
                                                                    </div>
                                                                <div class='more-big' onclick=enlarge_img(this)>
                                                                        <img src='{$_url}/images/search.png'>
                                                                    </div>
                                                                {$str3}
                                                               {$str4}
                                                            </div>
                                                        <div class='right-block'>
                                                                <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                                <div class='content-price'>
                                                                        <span class='pro-price'>{$price}</span>
                                                                        <span class='old-price'>$30.00</span>
                                                                    </div>

                                                            </div>
                                                        <div class='wrap-block'>
                                                                <div class='outter-content'>
                                                                        <p>Kitchen Supplies store was founded by switer</p>
                                                                        <div class='button-container'>
                                                                                <a href='#'><span class='cart'>ADD TO CART</span></a>
                                                                                <a href='#'><span class='more'>MORE</span></a>

                                                                            </div>
                                                                            <div class='comments-note'>
                                                                            {$str1}
                                                                            {$str2}
</div>

                                                                    </div>

                                                            </div>
                                                    </div>
                                            </li>

    ";
            }
        }else{
            $indexImg=get_field('indexImg', $r->ID);
            $price=get_field('price',$r->ID);
            $small1=get_field('small1', $r->ID);
            $small2=get_field('small2', $r->ID);
            $small3=get_field('small3', $r->ID);
            $small4=get_field('small4', $r->ID);
            $small5=get_field('small5', $r->ID);
            $small6=get_field('small6', $r->ID);
            $star=get_field('star',$r->ID);
            $new=get_field("new",$r->ID);
            $hot=get_field("hot",$r->ID);
            $_url=get_template_directory_uri();
            $detail_url=get_home_url()."/detail?id=".$r->ID;
            $str1="";
            $str2="";
            $str3="";
            $str4="";
            for($n=0;$n<$star;$n++){
                $str1.="<div class='star-on'></div>";
            }
            for($m=0;$m<(5-$star);$m++){
                $str2.=" <div class='star-off'></div>";
            }
            if($new){

                $str3.=" <div class='new-sale'>NOUVEAU</div>";
            }
            if($hot){
                $str4=" <div class='hot-sale'>PROMO！</div>";
            }
            $arr_select_list[]="
      <li class='col-md-4'>
                                                <div class='content-container' id='content-container'>
                                                    <div class='left-block'>
                                                        <div class='product-img-container'>
                                                            <a href='{$detail_url}'>
                                                                <img src='{$indexImg}'>
                                                            </a>
                                                           {$str3}
                                                           {$str4}

                                                        </div>

                                                    </div>
                                                    <div class='right-block'>
                                                            <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                            <div class='content-price'>
                                                                    <span class='pro-price'>$price</span>
                                                                    <span class='old-price'>30.00</span>
                                                                </div>

                                                        </div>

                                                </div>


                                                <div class='content-hide' id='content-hide'>
                                                        <div class='left-block'>
                                                                <div class='product-img-container'>
                                                                        <a href='{$detail_url}'>
                                                                                <img src='{$indexImg}'>
                                                                            </a>
                                                                        <div class='sub-img'>
                                                                                <ul>
                                                                                        <li><a href='{$detail_url}'>
                                                                                                        <img src='{$small1}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li class='sec-img'><a href='{$detail_url}'>
                                                                                                        <img src='{$small2}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li><a href='{$detail_url}'>
                                                                                                        <img src='{$small3}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                    </ul>
                                                                            </div>
                                                                    </div>
                                                                <div class='more-big' onclick=enlarge_img(this)>
                                                                        <img src='{$_url}/images/search.png'>
                                                                    </div>
                                                           {$str3}
                                                           {$str4}

                                                            </div>
                                                        <div class='right-block'>
                                                                <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                                <div class='content-price'>
                                                                        <span class='pro-price'>{$price}</span>
                                                                        <span class='old-price'>$30.00</span>
                                                                    </div>

                                                            </div>
                                                        <div class='wrap-block'>
                                                                <div class='outter-content'>
                                                                        <p>Kitchen Supplies store was founded by switer</p>
                                                                        <div class='button-container'>
                                                                                <a href='#'><span class='cart'>ADD TO CART</span></a>
                                                                                <a href='#'><span class='more'>MORE</span></a>

                                                                            </div>
                                                                            <div class='comments-note'>
                                                                            {$str1}
                                                                            {$str2}
                                                                    </div>

                                                                    </div>

                                                            </div>
                                                    </div>

                                            </li>

    ";
        }

    }
    return $arr_select_list;
}
function get_count($type){
    $term=get_category_by_slug($type);
    $result=get_the_category($term->term_id);
    $back=$result->category_count;
    var_dump($back);
    return $back;
}
function get_cate_name($type){
    $name=get_category_by_slug($type)->name;
    return($name);
}
function get_pic(){
    session_start();
    $index=$_GET['index'];
    $i=$index+1;
    $post_id=$_SESSION['post_id'];
    $img=get_field("big".$i,$post_id);
    $str_img="<img  src='{$img}'>";
    print_r($str_img);
    exit;
}

add_action('wp_ajax_topost','topost');
add_action('wp_ajax_nopriv_topost', 'topost');
add_action('wp_ajax_get_pic','get_pic');
add_action('wp_ajax_nopriv_get_pic', 'get_pic');
?>
