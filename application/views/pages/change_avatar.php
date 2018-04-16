<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/4/16
 * Time: 14:56
 */

include APPPATH . 'views/templates/header.php';
?>

<div class="nav-top navbar-fixed-top">
    <div class="content">
        <i class="fa fa-angle-left fa-2x" onclick="javascript:history.back(-1);"><span
                    class="page-title border-font"><?php echo $page_title; ?></span></i>
    </div>
</div>
<div class="change_content">
    <img src="<?php echo $avatar;?>" id="avatar-img">
    <form action="<?php echo base_url().'index.php/user/change_avatar';?>" method="post" enctype="multipart/form-data">
        <input type="file" id="avatar" name="avatar">
        <input type="submit" id="submit" class="btn" value="提交">
    </form>

</div>
<?php
include APPPATH . 'views/templates/footer.php';
?>
