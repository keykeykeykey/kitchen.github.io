<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/13
 * Time: 16:53
 */
get_header()
?>
<div class="shopping-page">
    <div class="container">
        <div class="shop-nav" >
            <ol start="01" type="1">
                <li class="active" >01.Summary</li>
                <li class="sub-active">02.Card</li>
                <li>03.Address</li>
                <li>04.Comfrim</li>
                <li>05.Payment</li>
            </ol>
        </div>
        <div class="shopping-car">
           <table>
               <th>Product</th>
               <th>Decription</th>
               <th>Avail</th>
               <th>Unit price</th>
               <th>Qty</th>
               <th>Total</th>
               <th></th>




<?php
var_dump($_SESSION);
global $wpdb;
$name=$_SESSION['nickname'];
if($name==null||$name=""){
    $name=$_COOKIE['nickname'];
    var_dump($_COOKIE);
}
$sql="SELECT * FROM _shop WHERE menber_name='$name'";
$result=$wpdb->get_results($sql);
foreach($result as $r){
    $id=$r->id;
    $pid=$r->productid;
    $quality=$r->quality;
    $img=get_field("small1",$pid);
    $desc=get_field("name",$pid);
    $price=get_field("price",$pid);
    $num=explode("$",$price);
    ?>

    <tr>
        <td><a href="<?php echo get_home_url()?>/detail?id=<?php echo $pid;?>"><img src="<?php echo $img; ?>"></a></td>
        <td>
            <div ><input class="hidden-id" type="hidden" value="<?php echo $pid ?>"></div>
            <?php echo $desc ?></td>
        <td>
            <span>
                <?php
                if(has_tag('instock',$pid)){
                    echo "In stock";
                }else{
                    echo "Not available";
                }
                ?>
            </span>
        </td>
        <td class="price"><?php echo $price  ?></td>
        <td><div class="quality"> <?php echo $quality  ?></div>
            <div class="buttons">
                <a class="reduce" onclick=cul_quality(this,"-1")> - </a><a class="add" onclick=cul_quality(this,"+1")> + </a>
            </div>
        </td>
        <td class="one-total"><?php $re=(int)$num[1]*(int)$quality;echo $re;?></td>

        <td><a onclick=ajax_delete(this,<?php echo $id; ?>)><img src="<?php bloginfo('template_url')?>/images/detele.png"></a></td>
    </tr>
<?php
}
?>
           </table>
            <div class="sum">
                <span>TOTAL:</span>
                <span class="total">0</span>
            </div>

        </div>
<!--        <div class="proceed"><a onclick=ajax_updata()>Proceed to select a card</a><span> > </span></div>-->
<!--        <div class="proceed"><a onclick=ajax_updata() >Proceed to select a card</a><span> > </span></div>-->
        <div class="proceed"><a onclick=ajax_updata() href="<?php echo get_home_url() ?>/card">Proceed to select a card</a><span> > </span></div>
    </div>

</div>


<?php
get_footer()?>
