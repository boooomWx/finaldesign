<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 14:26
 */

include APPPATH . 'views/templates/header.php';

?>
<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span class="page-title border-font"><?php echo $page_title;?></span></i>
    </div>
</div>
<div class="content">
    <div class="item-detail">
        <h3 class="item-title border-font"><?php echo $item_detail->title; ?></h3>
        <div class="sold-part">
            <div class="second-title">随便退 | 免预约 | 过期自动退</div>
            <p class="sold-num lighter-font">已售<?php echo $item_detail->sold_num; ?></p>
        </div>
        <div class="img-part">
            <img src="<?php echo $item_detail->image ?>" class="item-detail-img"/>
            <img src="<?php echo $item_detail->shop->image ?>" class="item-detail-img"/>
        </div>
        <div class="item-info">
            <p class="item-info-title border-font"><?php echo $item_detail->title; ?></p>
            <div class="item-info-desc">
                <ul>
                    <li>【荐】<?php echo $item_detail->title; ?>（招牌）</li>
                </ul>
                <p class="item-info-old-price">￥<?php echo $item_detail->old_price ?></p>
            </div>
            <p class="item-info-title">备注</p>
            <ul>
                <li><?php echo $item_detail->desc; ?></li>
            </ul>
        </div>
        <h4 class="tip-title border-font">温馨提示</h4>
        <div class="tip-info">
            <p class="tip-info-title">有效期</p>
            <ul>
                <li></li>
            </ul>
            <p class="tip-info-title">使用时间</p>
            <ul>
                <li></li>
            </ul>
            <p class="tip-info-title">使用规则</p>
            <ul>
                <li></li>
            </ul>
        </div>
    </div>

    <a href="<?php echo base_url().'index.php/shop/index?shop_id='.$item_detail->shop->id?>"><div class="shop-info-content">
        <h3>餐厅介绍</h3>
        <div class="shop-info">
            <img src="<?php echo $item_detail->shop->image; ?>" class="shop-image">
            <div class="shop-desc">
                <div class="shop-name-part">
                    <h5 class="border-font"><?php echo $item_detail->shop->shop_name ?></h5>
                    <i class="fa fa-phone fa-lg phone"></i>
                </div>
                <p class="shop-score"><?php echo $item_detail->shop->score; ?>分</p>
                <p class="address"><i class="fa fa-map-marker"></i><?php echo $item_detail->distance; ?>
                    | <?php echo $item_detail->shop->address; ?></p>
            </div>
        </div>
        </div></a>

    <div class="comments">
        <h3>用户评论</h3>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-element">
                    <img src="<?php echo $comment->avatar; ?>" class="user-avatar">
                    <div class="comment-info">
                        <div class="user-nick-part">
                            <p class="user-nick border-font"><?php echo $comment->name; ?></p>
                            <p class="comment-date"><?php echo $comment->gmt_create; ?></p>
                        </div>
                        <p class="comment-score"><?php echo $comment->score; ?>分</p>
                        <p class="comment-content"><?php echo $comment->content; ?></p>
                        <div class="comment-image-part">
                            <?php if (!empty($comment->images)): ?>
                                <?php foreach ($comment->images as $image): ?>
                                    <img src="<?php echo $image;?>" class="comment-image">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
        <?php else: ?>
            <a href="<?php echo base_url().'index.php/comment/index?iid='.$item_detail->id?>"><div class="comment-error">
                <p class="comment-error-content"><i class="fa fa-pencil-square-o fa-2x"></i>写评论</p>
            </div></a>
        <?php endif; ?>
    </div>
</div>

<div class="bottom-nav navbar-fixed-bottom">
    <div class="item-detail-price-part">
        <div class="discount-part"><p class="item-detail-now-price">￥<?php echo $item_detail->price; ?></p>
            <span class="discount lighter-font"><?php echo number_format($item_detail->price / $item_detail->old_price, 2) * 10; ?>
                折</span></div>
        <p class="item-detail-old-price lighter-font">最高门市价￥<?php echo $item_detail->old_price; ?></p>
    </div>
    <div class="buy-button">
        <a style="color: white" href="<?php echo base_url().'index.php/trade/buy?iid='.$item_detail->id; ?>">立即抢购</a>
    </div>
</div>

<?php
include APPPATH . 'views/templates/footer.php';
?>
