<?php
session_start();
get_header();
global $wpdb;
$aa=$wpdb->get_results("SELECT count(*) FROM $wpdb->cat_id");
//var_dump($aa);
?>
<?php
$post_id=$_GET['id'];
$_SESSION['post_id']=$post_id;

$title=get_post($post_id)->post_title;
?>
<input type="hidden" class="hiddenbox" name="hiddenbox" value="<?php $admin_url=admin_url('admin-ajax.php');echo $admin_url;?>">

<div class="detail" id="detatil">
    <section class="crumbs-nav">
       <div class="container">
           <a href="<?php  echo home_url();?> "> </a> > <span>面包屑导航</span>
       </div>

    </section>
    <section class="product-img">
        <div class="container">
            <div class="left">
                <ul class="nav-slidebar">
                <?php
                for($i=0;$i<6;$i++){
                    $index=$i+1;
                    ?>
                    
                        <li><a><img src="<?php echo get_field("small".$index,$post_id); ?>"></a></li>
<!--                        <li><a><img src="--><?php //bloginfo('template_url')?><!--/images/index_s_3.jpg"></a></li>-->

                <?php
                }
                ?>
                </ul>
            </div>
            <div class="center-block">
                <?php
                if(get_field("new",$post_id)){
                    ?>
                    <div class='new-sale'>PROMO!</div>
                <?php
                }
                ?>
                <?php
                if(get_field("hot",$post_id)){
                    ?>
                    <div class='hot-sale'>PROMO！</div>
                    <?php
                }
                ?>
                <img src="<?php echo get_field("big1",$post_id); ?>">
            </div>
            <div class="right">
                <p>Reference:  <span>       00119</span></p>
                <h3>Avocado-Tool</h3>
                <p>Condition:  <span>New product</span>
                <span class="item"><span class="num"> 99  </span> Items</span></p>
                <h2>$10.00</h2>
                <label>Color</label>

                <div class="buttons">
                   <div class="white"><a></a></div>
                   <div class="black"><a></a></div>
                </div>

                <div class="radios">
                    <label>Package quality</label>
                    <ul>
                        <li>
                            <input type="radio" value="1">1 Piece
                        </li>
                        <li>
                            <input type="radio" value="5">5 Piece
                        </li>
                        <li>
                            <input type="radio" value="10">10 Piece
                        </li>
                    </ul>
                </div>
                <div class="add-to-cart">
                    Quality <label>1</label>
                    <a>-</a>
                    <a>+</a>
                    <a>Add to cart</a>
                </div>
                <a class="add-wish">Add to wishlist</a>
                <img src="<?php bloginfo('template_url')?>/images/payment-logo.png">
                <div class="logo">
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                </div>
                <div class="rings">
                    Rating 000000     | Reading reviews
                </div>
                <p>Send to a friend</p>
            </div>
        </div>

    </section>
    <section class="detail-mes">
        <div class="container">
            <div class="left-block-nav">
                <ul>
                    <li><a>MORE INFO</a></li>
                    <li><a>DATA SHEET</a></li>
                </ul>
            </div>
            <div class="right-block">
                <div class="info">
                    <?php echo get_field("recommend_text",$post_id); ?>
                </div>
                <div class="data">
                    <table>

                        <tr>
                            <td>Product dimensions</td>
                            <td> <?php echo get_field("size",$post_id); ?></td>
                        </tr>
                        <tr>
                            <td>Material</td>
                            <td> <?php echo get_field("material",$post_id); ?></td>
                        </tr>
                        <tr>
                            <td>Packaging option</td>
                            <td> <?php echo get_field("package",$post_id); ?></td>
                        </tr>
                        <tr>
                            <td>Use & Care Guide</td>
                            <td> <?php echo get_field("care",$post_id); ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="accessories">
        <div class="container">
            <div class="title">
                NEW PRODUCT
            </div>
            <div class="products">
                <a class="pre" onclick=pre_product()> < </a>
                <a class="next-pro" onclick=next_product()> > </a>
                <ul>
                    <?php
                    $cates=get_the_category($post_id);
                    $i=0;
                    foreach($cates as $a){
                        $results=get_post_array($a->slug,-1);
                        foreach($results as  $r){
                            $detail_url=get_home_url()."/detail?id=".$r->ID;
                            if($i<40){

                                ?>
                                <li>
                                    <a href='<?php echo $detail_url; ?>'>
                                    <img src="<?php echo get_field('indexImg', $r->ID);?>">
                                    <span class="nickname">
                                        <?php
                                        echo get_field('name', $r->ID);
                                        ?>
                                    </span>
                                    </a>
                                </li>
                                <?php
                                $i++;
                                ++$i;
                            }
                        }
                    }
                    ?>
                </ul>

            </div>
        </div>
    </section>
    <section class="similar">
        <div class="container">
            <div class="title">
                ORDER PRODUCTS
            </div>
            <div class="similars">
                <a class="similar_p" onclick=pre_silimar_product()> < </a>
                <a class="similar_n" onclick=next_silimar_product()> > </a>
                <ul>
                    <?php
                    $cates=get_the_category($post_id);
                    $j=0;
                    foreach($cates as $a){
                        $results=get_posts('numberposts=20&orderby=rand');
//                        $results=get_post_array($a->slug,-1);
                        foreach($results as  $r){
                            $detail_url=get_home_url()."/detail?id=".$r->ID;
//                            var_dump($detail_url);
                            $j=$j+1;
                            if($j%2==0){

                                ?>
                                <li>
                                    <a href='<?php echo $detail_url; ?>'>
                                    <img src="<?php echo get_field('indexImg', $r->ID);?>">
                                    <span class="nickname">
                                        <?php
                                        echo get_field('name', $r->ID);
                                        ?>
                                    </span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>

            </div>
        </div>
    </section>
</div>
<div class="chat">
    <div class="title">
        contact with us
    </div>
    <div class="close-chat">
        <a>×</a>
    </div>
    <div class="container">
        <div class="qq">
            QQ交谈：  <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=774171481&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:774171481:52" alt="chat" title="chat"/></a>
        </div>
        <div class="phone">
            <div class="num"><span>phone:</span>741-123456</div>
            <div class="tel"><span>tel:</span>12345678978</div>
        </div>
        <div class="weixin">
            <img src="<?php bloginfo('template_url')?>/images/qrcode_for_gh_435417358e8b_258.jpg">
            <span>微信关注我们最新动态</span>
        </div>
    </div>
</div>

<?php
get_footer();
?>
