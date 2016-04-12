<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/12
 * Time: 9:06
 */

$search=$_GET['s'];
get_header();

?>
<?php
$query=new WP_Query('tag='.$search);
//var_dump($query);
$result=$query->posts;



?>

<div class="search-page" id="search-page">
    <div class="container">
       <section class="list">
          <div class="row">
              <?php
              if($result==null||$result==""){
                  echo"没有找到".$search."相关的商品！";
              }
              ?>
              <ul>
                  <?php
                  foreach($result as $i){
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

                      ?>

                      <li class='col-md-3'>
                          <div class='content-container' id='content-container'>
                              <div class='left-block'>
                                  <div class='product-img-container'>
                                      <a href='<?php echo $detail_url; ?>'>
                                          <img src='<?php  echo $indexImg ; ?>'>
                                      </a>
                                      <?php
                                      echo $str3;
                                      echo $str4;
                                      ?>

                                  </div>

                              </div>
                              <div class='right-block'>
                                  <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                  <div class='content-price'>
                                      <span class='pro-price'><?php echo $price; ?></span>
                                      <span class='old-price'>30.00</span>
                                  </div>

                              </div>

                          </div>


                          <div class='content-hide' id='content-hide'>
                              <div class='left-block'>
                                  <div class='product-img-container'>
                                      <a href='<?php echo $detail_url; ?>'>
                                          <img src='<?php  echo $indexImg ; ?>'>
                                      </a>
                                      <div class='sub-img'>
                                          <ul>
                                              <li><a href='<?php echo $detail_url; ?>'>
                                                      <img src='<?php  echo $small1 ; ?>'>
                                                  </a>
                                              </li>
                                              <li class='sec-img'><a href='<?php echo $detail_url; ?>'>
                                                      <img src='<?php  echo $small2 ; ?>'>
                                                  </a>
                                              </li>
                                              <li><a href='<?php echo $detail_url; ?>'>
                                                      <img src='<?php  echo $small3 ; ?>'>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class='more-big' onclick=enlarge_img(this)>
                                      <img src='<?php echo $_url; ?>/images/search.png'>
                                  </div>
                                  <?php
                                  echo $str3;
                                  echo $str4;
                                  ?>
                              </div>
                              <div class='right-block'>
                                  <h5>EXPANDABLE_BAMBOOGADG_DAFDFFD</h5>
                                  <div class='content-price'>
                                      <span class='pro-price'><?php echo $price; ?></span>
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
                                          <?php
                                          echo $str1;
                                          echo $str2;
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
       </section>
    </div>
</div>


<?php
get_footer();
?>