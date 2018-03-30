<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/28
 * Time: 21:47
 */

include APPPATH . 'views/templates/header.php';

?>

<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"></i>
    </div>
</div>

<div class="content">
    <div class="shop-info-content">
        <img src="<?php echo $shop_info->image; ?>" class="shop-image">
        <div class="shop-desc">
            <p class="shop-name"><?php echo $shop_info->shop_name; ?></p>
            <p class="shop-score lighter-font">综合评分：<?php echo $shop_info->score; ?></p>
            <p class="shop-detail-score lighter-font">口味:<?php echo number_format(rand(60, 95) / 10, 1); ?>
                环境:<?php echo number_format(rand(60, 95) / 10, 1); ?>
                服务:<?php echo number_format(rand(60, 95) / 10, 1); ?></p>
            <p class="shop-category lighter-font"><?php echo $shop_info->category; ?></p>
        </div>
    </div>
    <hr/>

    <div class="second-shop-info-part">
        <i class="fa fa-map-marker fa-2x map-icon"></i>
        <div class="distance-part">
            <p class="shop-detail-address"><?php echo $shop_info->address; ?></p>
            <p class="shop-distance lighter-font">距您步行<?php echo $shop_info->distance; ?>
                ，需要<?php echo rand(15, 30); ?>
                分钟</p>
        </div>
        <div class="phone-part">
            <i class="fa fa-phone fa-2x"></i>
        </div>
    </div>
</div>
<div class="separate-part"></div>
<div class="content">
    <div class="simple-goodlist">
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <div class="simple-good-item">
                    <img src="<?php echo $item->image; ?>" class="simple-item-image">
                    <div class="item-desc">
                        <p class="item-title"><?php echo $item->title; ?>一份</p>
                        <div class="price-part">
                            <p class="simple-now-price">￥<?php echo $item->price; ?></p>
                            <p class="simple-old-price">￥<?php echo $item->old_price; ?></p>
                        </div>
                    </div>
                    <p class="simple-sold-num lighter-font">已售<?php echo $item->sold_num; ?></p>
                </div>
                <hr/>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="separate-part"></div>
<div class="content">

    <div class="comments">

        <h4>网友点评(<?php echo count($comments); ?>)</h4>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-element">
                    <img src="<?php echo $comment->avatar; ?>" class="user-avatar">
                    <div class="comment-info">
                        <div class="user-nick-part">
                            <p class="user-nick"><?php echo $comment->name; ?></p>
                            <p class="comment-date"><?php echo $comment->gmt_create; ?></p>
                        </div>
                        <p class="comment-score"><?php echo $comment->score; ?>分</p>
                        <p class="comment-content"><?php echo $comment->content; ?></p>
                        <div class="comment-image-part">
                            <?php if (!empty($comment->images)): ?>
                                <?php foreach ($comment->images as $image): ?>
                                    <img src="<?php echo $image; ?>" class="comment-image">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="comment-error">
                <p class="comment-error-content"><i class="fa fa-pencil-square-o fa-2x"></i>写评论</p>
            </div>
        <?php endif; ?>
    </div>
</div>
