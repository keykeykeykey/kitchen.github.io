<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/13
 * Time: 16:53
 */
get_header()
?>
<div class="shopping-address">
    <div class="container">
        <div class="shop-nav" >
            <ol start="01" type="1">
                <li class="has-done" >01.Summary</li>
                <li class="has-done will-done" >02.Card</li>
                <li class="active will-done">03.Address</li>
                <li class="sub-active">04.Comfrim</li>
                <li>05.Payment</li>
            </ol>
        </div>

        <?php
        global $wpdb;
        $name=$_COOKIE['nickname'];
//        var_dump($_COOKIE);
        $sql="SELECT * FROM _adress WHERE menber_name='$name'";
        $result=$wpdb->get_results($sql);
        if(count($result)==0){
            ?>
            <div class="warn">yon do not any receipt address information,add first";</div>
            <?php
        }else{
            ?>
            <div class="address-form">
                <table>
                    <tr>
                        <th>choose address</th>
                        <th>consignee</th>
                        <th>area</th>
                        <th>city</th>
                        <th>street</th>
                        <th>phone</th>
                        <th>operation</th>
                    </tr>

            <?php
            foreach($result as $r){
        ?>

                   <tr>
                       <td><input type="radio" name="g1" value="<?php echo $r->id; ?>" onchange=choose_address(this)></td>
                       <td><input type="hidden" value="<?php echo $r->id; ?>"><?php echo $r->receiver;?></td>
                       <td><?php echo $r->area;?></td>
                       <td><?php echo $r->city;?></td>
                       <td><?php echo $r->detail;?></td>
                       <td><?php echo $r->phone;?></td>
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


        <div class="address">
            <form>
                <div><span>Receiver:</span><input type="text" id="receive-name"></div>
                <div><span>Phone:</span><input type="number" id="receive-phone"></div>
                <div><span>Area:</span><select name="province" id="province" onchange=city_select()></select></div>
                <div><span>City:</span> <select name="city" id="city"></select></div>
                <div><span>Detailed: </span><input type="text" id="address-detail"></div>

            </form>
        </div>
        <a onclick=add_address()>Add</a>
        <div class="proceed"><a onclick=address_option()>Confirm your message</a><span> > </span></div>
<!--        <div class="proceed"><a href="--><?php //echo get_home_url() ?><!--/address">Fill your address</a><span> > </span></div>-->

    </div>

</div>




<?php
get_footer()?>
