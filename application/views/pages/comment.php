<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/4/7
 * Time: 13:05
 */

include APPPATH . 'views/templates/header.php';

?>
<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span class="page-title border-font"><?php echo $page_title;?></span></i>
    </div>
</div>
<div class="content">

<div class="comment-part">
    <form action="<?php echo base_url().'index.php/comment/comment?iid='.$iid;?>" method="post" enctype="multipart/form-data">
        <div class="label-element"><span class="label-name">分数：</span><input type="range" name="score" min="0" max="100" id="score" value="80"/></div>
        <div class="label-element"><span class="label-name">内容：</span><textarea class="form-control" placeholder="请输入内容" id="content" name="content"></textarea></div>
        <div class="label-element"><span class="label-name">选择配图：</span><input type="file" name="images" id="images" multiple/></div>
        <input type="text" name="iid" style="display:none;" value="<?php echo $iid;?>">
        <button id="submit" class="btn">提交</button>
    </form>
</div>

<?php
include APPPATH . 'views/templates/footer.php';
?>