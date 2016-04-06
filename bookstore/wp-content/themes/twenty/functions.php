<?php

function get_post_array($type,$num)
{
    $args = array(
        'post_type' => 'post',
        'category_name' => $type,
        'numberposts' => $num,
        'orderby' => 'modified'
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
    $arr[][]='';
    foreach($childs as $i){
        $p_id=get_category_by_slug($i)->parent;
//        $c_id=get_category_by_slug($i)->cat_ID;
        $p=get_category_parents($p_id);
        $arr[$p_id][]=$i;
    }
//has_category()
    return $arr;
}


$arr[]='';
function topost(){
    

    session_start();
    $cate=$_GET['checkvalue'];
    $max_show=$_GET['show'];
    $_SESSION['checkvalue']=$cate;
    $arr=arr_li_content($cate,$max_show);
    $json_obj=json_encode($arr);
    print_r($json_obj);
    exit;
}
function arr_li_content($cate,$max_show){
    foreach($cate as $c){
        $result=get_post_array($c,$max_show);
        foreach($result as $key=>$i){
            $indexImg=get_field('indexImg', $i->ID);
            $price=get_field('price',$i->ID);
            $small1=get_field('small1', $i->ID);
            $small2=get_field('small2', $i->ID);
            $small3=get_field('small3', $i->ID);
            $star=get_field('star',$i->ID);
            $_url=get_template_directory_uri();
            $str1="";
            $str2="";
            for($n=0;$n<$star;$n++){
                $str1.="<div class='star-on'></div>";
            }
            for($m=0;$m<(5-$star);$m++){
                $str2.=" <div class='star-off'></div>";
            }
            $arr[]="
      <li class='col-md-4'>
                                                <div class='content-container' id='content-container'>
                                                    <div class='left-block'>
                                                        <div class='product-img-container'>
                                                            <a href='#'>
                                                                <img src='{$indexImg}'>
                                                            </a>
                                                            <div class='new-sale'>
                                                                    NOUVEAU
                                                                </div>
                                                            <div class='hot-sale'>
                                                                    PROMO！
                                                                </div>
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
                                                                        <a href='#'>
                                                                                <img src='{$indexImg}'>
                                                                            </a>
                                                                        <div class='sub-img'>
                                                                                <ul>
                                                                                        <li><a href='#'>
                                                                                                        <img src='{$small1}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li class='sec-img'><a href='#'>
                                                                                                        <img src='{$small2}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                        <li><a href='#'>
                                                                                                        <img src='{$small3}'>
                                                                                                    </a>
                                                                                            </li>
                                                                                    </ul>
                                                                            </div>
                                                                    </div>
                                                                <div class='more-big'>
                                                                        <img src='{$_url}/images/search.png'>
                                                                    </div>
                                                                <div class='new-sale'>
                                                                        NOUVEAU
                                                                    </div>
                                                                <div class='hot-sale'>
                                                                        PROMO！
                                                                    </div>
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
    return $arr;
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
add_action('wp_ajax_topost','topost');
add_action('wp_ajax_nopriv_topost', 'topost');
?>
