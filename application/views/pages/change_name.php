<?php
/**
 * Created by PhpStorm.
 * User: boom
 * Date: 2018/4/14
 * Time: 13:28
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
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
    <input type="button" id="submit" class="btn" value="提交">
</div>
<?php
include APPPATH . 'views/templates/footer.php';
?>
