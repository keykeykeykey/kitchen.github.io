<?php
global $wpdb;
$sql="SELECT * FROM _buy";
$result=$wpdb->get_results($sql);
//var_dump($result);
?>
<div class="page-manager">
    <div class="container">
        <section class="select">
            <select class="time">
                <option>时间正序</option>
                <option>时间倒序</option>
            </select>
        </section>
        <section class="content">
            <div class="table">
                <table>
                    <tr>
                        <th>订单号</th>
                        <th>买家名称</th>
                        <th>产品号</th>
                        <th>下订时间</th>
                        <th>付款状态</th>
                    </tr>
                    <?php
                    foreach($result as $r){
                        ?>
                        <tr>
                            <td><a><?php echo $r->id ?></a></td>
                            <td><a><?php echo $r->menber_name ?></a></td>
                            <td><a><?php echo $r->productid ?></a></td>
                            <td><?php echo $r->date ?></td>
                            <td><?php $pay=$r->pay;if($pay==0){echo "未付款";}
                                    else{echo"已付款";}
                                    ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </section>
    </div>
</div>