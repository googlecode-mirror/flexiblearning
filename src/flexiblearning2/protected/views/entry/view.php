<?php
$this->breadcrumbs = array(
    $model->ownerBy->username => $model->ownerBy->href,
    Yii::t('flexiblearn', 'Blogs') => $model->ownerBy->href . '#blog-tab',
    CHtml::encode($model->title),
);
?>

<table border="0" cellpadding="0" cellspacing="0" class="full">
    <tr>
        <td class="top">
            <div class="title">
                <div class="left">
                    <span class="title-text"><?php echo CHtml::encode($model->title) ?></span> 
                </div>
                <div class="right">
                    <?php
                    if (Yii::app()->user->checkAccess('adminEntry') 
                        || Yii::app()->user->checkAccess('adminOwnEntry', array('entry' => $model))) {
                        echo CHtml::link(
                                Yii::t('flexiblearn', 'Update Entry'), $this->createUrl('entry/update', array('id' => $model->getPrimaryKey())), array('class' => 'edit-link icon-control-link'));
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>

            <p class="center">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->thumbnailPath; ?>" class="lesson-view" />
            </p>
            <div class="block-area">
                <?php echo $model->content ?>
            </div>
        </td>
    </tr>
</table>