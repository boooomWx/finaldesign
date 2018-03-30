<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/27
 * Time: 22:21
 */

include APPPATH . 'views/templates/header.php';

?>
    <div class="content">
        <div class="nav-top navbar-fixed-top">
            <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"></i>
            <p class="border-font page-title"><?php echo $page_title; ?></p>
        </div>
    </div>
    <div class="search-box">
        <div class="content">
            <i class="search-icon fa fa-search fa-1x"></i>
            <input type="text" placeholder="输入商户名、地名、找优惠" class="search">
        </div>
    </div>

    <div class="nav-content">
        <div class="btn-group" role="group">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle nav-button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    附近
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Dropdown link</a></li>
                    <li><a href="#">Dropdown link</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle nav-button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    美食
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Dropdown link</a></li>
                    <li><a href="#">Dropdown link</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle nav-button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    智能排序
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">智能排序</a></li>
                    <li><a href="#">离我最近</a></li>
                    <li><a href="#">人气最高</a></li>
                    <li><a href="#">评价最好</a></li>
                    <li><a href="#">口味最佳</a></li>
                    <li><a href="#">环境最佳</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <div class="good-items">
            <?php if (empty($items)): ?>
                <!-- 对不起暂时没有数据 -->
            <?php else: ?>
                <?php foreach ($items as $item): ?>
                    <a href="<?php echo base_url() . 'index.php/item_detail/index?iid=' . $item->id ?>">
                        <div class="good-item">
                            <img class="item-img" src="<?php echo $item->image; ?>">
                            <div class="good-item-detail">
                                <div class="shop-part">
                                    <p class="shop-name"><?php echo $item->shop->shop_name; ?></p>
                                    <p class="distance lighter-font"><?php echo $item->distance; ?></p>
                                </div>
                                <p class="shop-address"><?php echo $item->shop->address; ?></p>
                                <div class="item-price-part">
                                    <div class="price-part">
                                        <div class="now-price-part"><span>￥</span><span
                                                    class="now-price"><?php echo $item->price; ?></span></div>
                                        <span>￥</span><span
                                                class="old-price lighter-font"><?php echo $item->old_price; ?></span>
                                    </div>
                                    <div class="sold-num lighter-font">已售<?php echo $item->sold_num; ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr/>
                <?php endforeach; ?>
            <?php endif; ?>
            <div id="goodlist">
            </div>
        </div>
    </div>

    <p class="no-more">没有更多了，到别处看看</p>

<?php
include APPPATH . 'views/templates/footer.php';
?>