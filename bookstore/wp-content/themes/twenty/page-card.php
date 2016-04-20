<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/13
 * Time: 16:53
 */
get_header()
?>
<div class="shopping-card">
    <div class="container">
        <div class="shop-nav" >
            <ol start="01" type="1">
                <li class="has-done" >01.Summary</li>
                <li class="active will-done">02.Card</li>
                <li class="sub-active">03.Address</li>
                <li>04.Comfrim</li>
                <li>05.Payment</li>
            </ol>
        </div>



        <?php
        global $wpdb;
        $name=$_COOKIE['nickname'];
//        var_dump($_COOKIE);
        $sql="SELECT * FROM _card WHERE menber_name='$name'";
        $result=$wpdb->get_results($sql);
        if(count($result)==0){
            ?>
            <div class="warn">yon do not any receipt address information,add first";</div>
            <?php
        }else{
            ?>
            <div class="card-form">
                <table>
                    <tr>
                        <th>choose card</th>
                        <th>card type</th>
                        <th>number</th>
                        <th>option</th>
                    </tr>

                    <?php
                    foreach($result as $r){
                        ?>

                        <tr>
                            <td><input type="radio" name="g1" value="<?php echo $r->id; ?>" onchange=choose_address(this)></td>
                            <td><?php echo $r->card_type;?></td>
                            <td><?php $num=$r->card_num;
                                $length=strlen($num);
                                $str=substr($num,-4);
                                echo str_repeat("*",$length-4);
                                echo $str;
                                ?>

                            </td>
                            <td><a>detele</a></td>
                        </tr>


                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php

        }
        ?>
        <div class="cards">
            <ul>
                <li><input name="card" type="radio" value="中国建设银行"><img src="<?php echo bloginfo('template_url')  ?>/images/jianhang.png"></li>
                <li><input name="card" type="radio" value="招商银行"><img src="<?php echo bloginfo('template_url')  ?>/images/zhaoshang.png"></li>
                <li><input name="card" type="radio" value="中国邮政储蓄银行"><img src="<?php echo bloginfo('template_url')  ?>/images/youzheng.png"></li>
                <li><input name="card" type="radio" value="中国工商银行"><img src="<?php echo bloginfo('template_url')  ?>/images/gongshang.png"></li>
                <li><input name="card" type="radio" value="交通银行"><img src="<?php echo bloginfo('template_url')  ?>/images/jiaotong.png"></li>
                <li><input name="card" type="radio" value="中信银行" <img src="<?php echo bloginfo('template_url')  ?>/images/zhongxin.png"></li>
            </ul>
        </div>
        <div class="card-num">Your card num <input type="number"></div>
        <div class="check">
            <a onclick=add_card()>add</a>
        </div>
        <div class="proceed"><a onclick=card_option() href="<?php echo get_home_url() ?>/address" >Fill your address</a><span> > </span></div>

    </div>

</div>




<?php
get_footer()?>
