<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/24
 * Time: 17:22

 */
session_start();
get_header();
var_dump(ajax_parent());
?>

<div class="food" id="foodStorage">
    <div class="content">
        <section class="crumbs-nav">
            <img src="<?php bloginfo('template_url')?>/images/home.png"> ><span>Food Storage</span>
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
                                        $type='storrage';
                                        $parent=get_child($type);
                                        foreach ($parent as $key=>$p){
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
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="right-block col-md-9">
                        <div class="recommand-pro">
                            <div class="left">
                                <img src="<?php bloginfo('template_url')?>/images/food_1.jpg">
                            </div>
                            <div class="right">
                                <h3>Food Storage</h3>
                                <label>Kitchen Supplies store was founded by several enthusiasts in 2002. Those were the times when people still preferred to buy products at brick-and-mortar stores instead of buying online. Nevertheless we’ve decided to create an online shop and we are so glad to welcome you here,
                                    at our online Kitchen Supplies store. Yes, we agree that selling food ...</label>
                            </div>
                        </div>
                        <div class="title">
                            <div class="left">
                                <h3>FOOD STORAGE</h3>
                            </div>
                            <div class="right">
                                Hay 20 productos
                            </div>
                        </div>
                        <div class="subcategorias">
                            <div class="sub-title">Subcategorias</div>
                            <ul>
                                <?php
                                for($i=0;$i<5;$i++){
                                    ?>
                                    <li><a><div class="img"><img src="<?php bloginfo('template_url')?>/images/food2.jpg"></div> OVEN MITTTS</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
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
                                Mostar
                                <select class="max-show" id="max-show">
                                    <option value="">--</option>

                                    <?php
                                    for($i=0;$i<3;$i++){
                                        ?>
                                        <option value=""><?php echo eval(9+$i)?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="right">
                                Vista
                            </div>
                        </div>
                        <div class="pages">
                            <div class="left">
                                Mostrando 1 - 9 de 20 items
                            </div>
                            <div class="center">
                                <a>< Previo</a>
                                <a>Siguiente ></a>
                                <ul>
                                    <li><button>1</button></li>
                                    <li><button>2</button></li>
                                    <li><button>3</button></li>
                                </ul>

                            </div>
                            <div class="right">
                                <button>Mosrar todos</button>
                                <button>Comparar(0) > </button>
                            </div>

                        </div>
                        <section class="pro-img-old">
                            <div class="row">
                                <ul class="container-ul">
                                    <?php
                                    $result=get_post_array('storrage');
//                                    var_dump($result);
                                    foreach ($result as $i){
                                        ?>
                                        <li class="col-md-4">
                                            <div class="content-container" id="content-container">
                                                <div class="left-block">
                                                    <div class="product-img-container">
                                                        <a href="#">
                                                            <img src="<?php  the_field('indexImg', $i->ID);?>">
                                                        </a>
                                                        <div class="new-sale">
                                                            NOUVEAU
                                                        </div>
                                                        <div class="hot-sale">
                                                            PROMO！
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="right-block">
                                                    <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                    <div class="content-price">
                                                        <span class="pro-price"><?php the_field('price',$i->ID) ?></span>
                                                        <span class="old-price">$30.00</span>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="content-hide" id="content-hide">
                                                <div class="left-block">
                                                    <div class="product-img-container">
                                                        <a href="#">
                                                            <img src="<?php  the_field('indexImg', $i->ID);?>">
                                                        </a>
                                                        <div class="sub-img">
                                                            <ul>
                                                                <li><a href="#">
                                                                        <img src="<?php  the_field('small1', $i->ID);?>">
                                                                    </a>
                                                                </li>
                                                                <li class="sec-img"><a href="#">
                                                                        <img src="<?php  the_field('small2', $i->ID);?>">
                                                                    </a>
                                                                </li>
                                                                <li><a href="#">
                                                                        <img src="<?php  the_field('small3', $i->ID);?>">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="more-big">
                                                        <img src="<?php bloginfo('template_url')?>/images/search.png">
                                                    </div>
                                                    <div class="new-sale">
                                                        NOUVEAU
                                                    </div>
                                                    <div class="hot-sale">
                                                        PROMO！
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                                    <div class="content-price">
                                                        <span class="pro-price">$24.00</span>
                                                        <span class="old-price">$30.00</span>
                                                    </div>

                                                </div>
                                                <div class="wrap-block">
                                                    <div class="outter-content">
                                                        <p>Kitchen Supplies store was founded by switer</p>
                                                        <div class="button-container">
                                                            <a href="#"><span class="cart">ADD TO CART</span></a>
                                                            <a href="#"><span class="more">MORE</span></a>

                                                        </div>
                                                        <div class="comments-note">
                                                            <?
                                                            for($n=0;$n<get_field('star',$i->ID);$n++){
                                                                ?>
                                                                <div class="star-on"></div>
                                                                <?php
                                                            }
                                                            for($m=0;$m<(5-get_field('star',$i->ID));$m++){
                                                                ?>
                                                                <div class="star-off"></div>
                                                                <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>

                                        <?php
                                    }
                                    ?>
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

