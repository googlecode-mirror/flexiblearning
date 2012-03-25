<?php
    $this->breadcrumbs = array(
        $model->username => $model->href,
    );
?>

<div >
    <div id="template2-menu">			
        <ul id="menu-doc" class="menu-doc">
            <li class="active">
                <a href="#thongtincanhan"><?php echo Yii::t('flexiblearn', 'Personal information')?></a>
            </li>
            <li>
                <a href="#video"><?php echo Yii::t('flexiblearn', 'Videos')?></a>
            </li>
            <li>
                <a href="#blog"><?php echo Yii::t('flexiblearn', 'Blogs')?></a>
            </li>
        </ul>				
    </div>

    <div id="template2-content">
        <div id="thongtincanhan" class="inner">
            <?php
                if (isset($mode) && $mode == 'edit') {
                    $this->renderPartial('/_profile_edit', array('model' => $model));
                } else {
                    $this->renderPartial('/_profile_view', array('model' => $model));
                }
            ?>
        </div><!--end-#thongtincanhan-->
    </div>
</div>

<script type="text/javascript">
    $('#menu-doc').tabify();
    <?php if (isset($section)) : ?>
        
    <?php endif;?>
</script>