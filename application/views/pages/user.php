<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/29
 * Time: 10:17
 */
include APPPATH . 'views/templates/header.php';

?>


    <div class="nav-top navbar-fixed-top">
        <div class="content">
            <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"></i>
        </div>
    </div>
    <div class="user-content">
        <img src="<?php echo $user['avatar']; ?>" class="user-avatar">
        <p class="user-nick"><?php echo $user['name']; ?></p>
    </div>
    <hr/>
    <div class="order-content">
        <div class="order-nav">
            <div class="order-nav-item current" id="all-order">
                <p>全部订单</p>
                <div class="all-nav-line nav-line current-line"></div>
            </div>
            <div class="order-nav-item" id="wait-pay-order">
                <p>带付款</p>
                <div class="wait-pay-nav-line nav-line"></div>
            </div>
            <div class="order-nav-item" id="available-order">
                <p>可使用</p>
                <div class="available-nav-line nav-line"></div>
            </div>
            <div class="order-nav-item" id="refund-order">
                <p>退款售后</p>
                <div class="refund-nav-line nav-line"></div>
            </div>
        </div>

        <div class="content">
            <div class="order-detail" id="order-detail">

            </div>
        </div>
    </div>
<?php
include APPPATH . 'views/templates/footer.php';
?>