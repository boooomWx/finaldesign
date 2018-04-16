<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/3/10
 * Time: 19:26
 */

include APPPATH . 'views/templates/header.php';

?>
<div class="container">
    <div class="userinfo-nav">
        <p id="city-location"><a href="<?php echo base_url() . '/index.php/map/index' ?>" style="color: white">杭州<span
                        class="caret"></span></a></p>
        <i class="search-icon fa fa-search fa-1x"></i>
        <input type="text" id="search-input" placeholder="输入商户名、地点，找美食" class="search-box">
        <a id="user-icon" href="<?php echo base_url() . 'index.php/user/index'; ?>"><i
                    class="fa fa-user-circle fa-2x"></i></a>
    </div>
</div>


<div class="category_nav">
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=sichuan' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/category_icon_1.png' ?>"/>
            <p class="category_desc">川菜</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=tea_milk' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/nav_3.png' ?>"/>
            <p class="category_desc">奶茶</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=hot_pot' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/nav_2.png' ?>"/>
            <p class="category_desc">火锅</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=jiangzhe' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/rice.png' ?>"/>
            <p class="category_desc">江浙菜</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=noodle' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/hot_pot.png' ?>"/>
            <p class="category_desc">面食</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=dessert' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/dessert.png' ?>"/>
            <p class="category_desc">甜点</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=western_food' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/western_food.png' ?>"/>
            <p class="category_desc">西式快餐</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=fruit' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/fruit.png' ?>"/>
            <p class="category_desc">水果</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item?category=seafood' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/fish.png' ?>"/>
            <p class="category_desc">海鲜</p>
        </a>
    </div>
    <div class="category-item">
        <a href="<?php echo base_url() . 'index.php/item/category_item' ?>">
            <img class="category_img" src="<?php echo base_url() . '/resource/img/category_icon_1.png' ?>"/>
            <p class="category_desc">其他</p>
        </a>
    </div>
</div>

<div class="nearby">
    <div class="content">
        <div class="module-nav">
            <p class="module-title lighter-font">附近拼团</p>
            <p class="module-more lighter-font">更多></p>
        </div>
        <?php if (empty($nearby_items)): ?>
            <!-- 对不起暂时没有数据 -->
        <?php else: ?>
            <?php foreach ($nearby_items as $item): ?>
                <a href="<?php echo base_url() . 'index.php/item_detail/index?iid=' . $item->id ?>">
                    <div class="nearby-item">
                        <img src="<?php echo $item->image ?>" class="nearby-img">
                        <div class="nearby-item-detail">
                            <p class="nearby-item-title"><?php echo $item->title ?></p>
                            <p class="nearby-item-desc"><?php echo $item->shop->address ?></p>
                            <div class="nearby-price-part">
                                <div class="price"><span>5人团￥</span><span
                                            class="price-currency"><?php echo $item->price ?></span></div>
                                <span class="lighter-font">￥</span><span
                                        class="old-price lighter-font"><?php echo $item->old_price ?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <hr/>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="goodlist">
    <div class="content">
        <div class="module-nav">
            <p class="lighter-font">猜你喜欢</p>
        </div>
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
