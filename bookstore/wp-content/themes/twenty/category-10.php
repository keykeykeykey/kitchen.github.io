
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/24
 * Time: 17:22

 */
session_start();
get_header();
//var_dump($wp->query_vars['category_name']);

?>
<div class="food" id="foodStorage">
    <div class="content">
        <section class="crumbs-nav">
            <img src="<?php bloginfo('template_url')?>/images/home.png"> ><span><?php  single_cat_title(); ?></span>
        </section>
        <section class="main-content">
            <div class="container">
                <div class="row">
                    <div class="left-block col-md-3">
                        <section class="catelog">
                            <div class="sub-content">
                                <div class="title">CATALOG</div>
                                <div class="select-panel">
                                    <div class="s_title">filtros habilltados:</div>
                                    <div class="class-list"></div>
                                </div>
                                <div class="categories">
                                    <ul>
                                        <?php
                                        $type=$wp->query_vars['category_name'];
//                                        $type=single_cat_title();
                                        $parent=get_child($type);
                                        foreach ($parent as $key=>$p){
                                            if($key=='Availability'||$key=='Manufacturer')
                                            {
                                                ?>
                                                <div class="cate-title"><?php  echo $key;?></div>
                                                <?php
                                                foreach($p as $value){
                                                    ?>

                                                    <li><div class="select-type">
                                                            <input type="hidden" class="parent_box" name="parent_box" value="<?php  echo $key;?>">
                                                            <input type="hidden" class="hiddenbox" name="hiddenbox" value="<?php $admin_url=admin_url('admin-ajax.php');echo $admin_url;?>">
                                                            <input type="checkbox" value="<?php echo $value ?>" name="<?php echo $value ?>" id="<?php echo $value ?>">
                                                            <label for="<?php echo $value ?>"><a><?php echo $value ?>(20)</a></label>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <div class="price-bar">
                                    <h5>Precio</h5>
                                    <div class="price-range">Range:$4.00-$90.00</div>
                                    <input type="range">
                                </div>
                            </div>

                            <div class="wishlist">
                                <div class="list">WISHLIST</div>
                                <div class="desc">No produce</div>
                                <a>My wishlists<span> > </span></a>
                            </div>
                            <div class="information">
                                <div class="list">INFORNATION</div>
                                <div class="infor-list"></div>
                            </div>
                            <div class="new-product">
                                <div class="list">NEW PRODUCT</div>
                                <div class="new-list">
                                    <ul>
                                        <?php
                                        $result=get_post_array('new',8);
                                        foreach ($result as $i){
                                            ?>
                                            <li>
                                                <div class="content-container" >
                                                    <div class="left-block">
                                                        <div class="product-img-container">
                                                            <a href="#">
                                                                <img src="<?php  the_field('small1', $i->ID);?>">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="right-block">
                                                        <div class="info"><a>EXPANDABLE_BAMBOOGADG</a></div>
                                                        <div class="detail">Kitchen Supplies store was founded
                                                            by several enthusiasts in 2002.Those are menifng</div>
                                                        <div class="content-price">
                                                            <span class="pro-price"><?php the_field('price',$i->ID) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>

                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="right-block col-md-9">
                        <div class="recommand-pro">
                            <?php
                            $result=get_post_array('recommend');
                            foreach($result as $r){
                                $type=$wp->query_vars['category_name'];
                                $boo=  has_category($type,$r);
                                if($boo){

                                    ?>
                                    <div class="left">
                                        <img src="<?php the_field('recommang_pic', $r->ID); ?>">
                                    </div>
                                    <div class="right">
                                        <h3><?php echo single_cat_title() ?></h3>
                                        <label><?php the_field('recommend_text', $r->ID); ?></label>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="title">
                            <div class="left">
                                <h3><?php echo  single_cat_title(); ?></h3>
                            </div>
                            <div class="right">
                                Hay <?php var_dump(get_count('storrage')); ?> productos
                            </div>
                        </div>

                        <div class="selector">
                            <div class="left">
                                Ordenar
                                <select class="selector-letter" id="selector-letter">
                                    <option value="">--</option>
                                    <?php
                                    for($i=0;$i<7;$i++){
                                        ?>
                                        <option value="">precio:max boratos primeto</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                Montrer
                                <select class="max-show" id="max-show">
                                    <option value="9">9</option>
                                    <option value="3">3</option>
                                    <option value="45">45</option>
                                </select>

                            </div>
                            <div class="right">
                                Vista
                            </div>
                        </div>
                        <div class="pages">
                            <div class="left">
                                Resultats 1-9 sur 20
                            </div>
                            <div class="center">
                                <ul>
                                </ul>
                            </div>
                            <div class="right">
                                <button>Afificher tout</button>
                                <button>Comparar(0) > </button>
                            </div>

                        </div>
                        <section class="food-img-list">
                            <div class="row">
                                <ul class="container-ul">

                                </ul>

                            </div>
                            <hr>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
get_footer();
?>




<?php
get_footer();
?>
