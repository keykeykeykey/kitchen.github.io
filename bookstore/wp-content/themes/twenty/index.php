
<?php get_header();
?>
<div class="index" id="index">
    <section class="new-product">
        <div class="img-list">
            <ul>
                <li>
                    <ul class="sub-list">
                        <a> <li class="list1">
                                <h2>KNIFE<br>SET</h2>
                                <h5>16-Piece<br>Cutlery Set</h5>
                                <h3>$59.25</h3>
                                <a>Details ></a>

                            </li></a>
                        <a><li class="list2">
                                <h2>CUTTING<br>BOARDS</h2>
                                <h5>Best Wooden<br>board</h5>
                                <h3>$59.25</h3>
                                <a>Details ></a>
                            </li></a>
                    </ul>
                </li>
                <a><li class="list5">
                        <div>
                            <h2>CREATE CULINARY MASTERPIECES</h2>
                            <h5>with our devices</h5>
                            <button>SHOP NOW!</button>
                        </div>

                    </li></a>
                <li>
                    <ul class="sub-list">
                        <a><li class="list3">
                                <h2>NATURAL<br>BAKEWARE</h2>
                                <h5>Bread loaf<br>pan</h5>
                                <h3>$59.25</h3>
                                <a>Details ></a>
                            </li></a>
                        <a><li class="list4">
                                <h2>FTYING<br>GRILL</h2>
                                <h5>From Tefal</h5>
                                <h3>$59.25</h3>
                                <a>Details ></a>
                            </li></a>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <section class="product-type">
        <div class="container">
            <ul >
                <li class="nav_pic1"><a>POPULAR</a></li>
                <li class="nav_pic2"><a>NEW ARRIVALS</a></li>
                <li class="nav_pic3"><a>BEST SELLERS</a></li>
            </ul>

        </div>

    </section>
    <section class="pro-img-list">
        <div class="container">
            <div class="row">
                <ul>
                    <?php
                    $result=get_post_array('popular',12);
                    foreach ($result as $i){
                        ?>
                        <li class="col-md-3">
                            <div class="content-container" id="content-container">
                                <div class="left-block">
                                    <div class="product-img-container">
                                        <a href="#">
                                            <img src="<?php  the_field('indexImg', $i->ID);?>">
                                        </a>
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
                <hr>
            </div>
        </div>

    </section>
    <section class="pro-img-new">
        <div class="container">
            <div class="row">
                <ul>
                    <?php
                    $result=get_post_array('new',12);
                    foreach ($result as $i){
                        ?>
                        <li class="col-md-3">
                            <div class="content-container" id="content-container">
                                <div class="left-block">
                                    <div class="product-img-container">
                                        <a href="#">
                                            <img src="<?php  the_field('indexImg', $i->ID);?>">
                                        </a>
                                        <div class="new-sale">
                                            NOUVEAU
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
                <hr>
            </div>
        </div>

    </section>
    <section class="pro-img-old">
        <div class="container">
            <div class="row">
                <ul>
                    <?php
                    for($i=0;$i<8;$i++){
                        ?>

                        <li class="col-md-3">
                            <div class="content-container" id="content-container">
                                <div class="left-block">
                                    <div class="product-img-container">
                                        <a href="#">
                                            <img src="<?php bloginfo('template_url')?>/images/old_a_1.jpg">
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
                                        <span class="pro-price">$24.00</span>
                                        <span class="old-price">$30.00</span>
                                    </div>

                                </div>

                            </div>


                            <div class="content-hide" id="content-hide">
                                <div class="left-block">
                                    <div class="product-img-container">
                                        <a href="#">
                                            <img src="<?php bloginfo('template_url')?>/images/old_a_1.jpg">
                                        </a>
                                        <div class="sub-img">
                                            <ul>
                                                <li><a href="#">
                                                        <img src="<?php bloginfo('template_url')?>/images/old_a_2.jpg">
                                                    </a>
                                                </li>
                                                <li class="sec-img"><a href="#">
                                                        <img src="<?php bloginfo('template_url')?>/images/old_a_3.jpg">
                                                    </a>
                                                </li>
                                                <li><a href="#">
                                                        <img src="<?php bloginfo('template_url')?>/images/old_a_4.jpg">
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
                                            <div class="star-on"></div>
                                            <div class="star-on"></div>
                                            <div class="star-on"></div>
                                            <div class="star-off"></div>
                                            <div class="star-off"></div>
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
        </div>
        <hr>
    </section>

    <section class="rooms">
        <div class="container">
            <div class="row">
                <div class="room-title">
                    DERNIÈRES NOUVELLES
                </div>
            </div>
            <div class="row">
                <div class="kitchen-roow">
                    <ul>
                        <li class="col-md-4">
                            <div class="img-limit"><a><img src="<?php bloginfo('template_url')?>/images/4-home-default.jpg"></a></div>
                            <a>KITCHEN REMODELING IDEAS</a>
                            <p>Comprehensive guide to help you buy everything you need in your computer system and save money.</p>
                            <hr>
                            <div class="time">21.03.2016</div>

                        </li>
                        <li class="col-md-4">
                            <div class="img-limit"><a><img src="<?php bloginfo('template_url')?>/images/3-home-default.jpg"></a></div>
                            <a>MODERN KITCHENS</a>
                            <p>Let us help you to find what you need on your budget from our wide range of computer hardware.</p>
                            <hr>
                            <div class="time">21.03.2016</div>

                        </li>
                        <li class="col-md-4">
                            <div class="img-limit"><a><img src="<?php bloginfo('template_url')?>/images/2-home-default.jpg"></a></div>
                            <a>SMALL KITCHEN IDEAS</a>
                            <p>Our computer world offers you a great shopping experience at low prices and excellent service.</p>
                            <hr>
                            <div class="time">21.03.2016</div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>
