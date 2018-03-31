<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/31
 * Time: 10:58
 */
include APPPATH . 'views/templates/header.php';

?>

<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span class="page-title border-font"><?php echo $page_title;?></i>
    </div>
</div>

<div class="content">
    <h3 class="order-status border-font"><?php echo $order_detail->status;?></h3>
    <?php if ($order_detail->status == '待支付'): ?>
        <p class="order-remind">您有订单尚未付款成功！请尽快支付</p>
    <?php endif; ?>

    <div class="order-detail-part">
        <img src="<?php echo $order_detail->image;?>" class="order-detail-img">
        <div class="order-detail-desc">
            <p class="order-detail-title border-font"><?php echo $order_detail->title;?></p>
            <p class="order-detail-name lighter-font"><?php echo $order_detail->shop_name;?></p>
            <p class="order-price border-font">售价：￥<?php echo $order_detail->price;?></p>
        </div>
        <p><i class="fa fa-angle-right fa-2x order-detail-icon"></i></p>
    </div>
    <p class="order-total-price border-font">总价：￥<?php echo $order_detail->price*$order_detail->num;?></p>
    <p class="order-num border-font">数量：<?php echo $order_detail->num;?></p>
<hr/>
    <p class="order-create lighter-font">下单时间：<?php echo $order_detail->gmt_create;?></p>
    <p class="tel lighter-font">手机号码：<?php echo $order_detail->tel;?></p>

    <?php if($order_detail->status =='待支付'): ?>
        <a class="form-control btn-danger order-button" style="background-color: orange" href="<?php echo base_url().'index.php/trade/submit?oid='.$order_detail->id.'&title='.$order_detail->title.'&price='.$order_detail->price*$order_detail->num;?>">￥<?php echo $order_detail->price*$order_detail->num;?>  重新支付</a>
    <?php else: ?>
        <a class="form-control btn-danger order-button" style="background-color: orange" href="<?php echo base_url().'index.php/item_detail/index?iid='.$order_detail->iid;?>">重新购买</a>
    <?php endif; ?>
</div>
