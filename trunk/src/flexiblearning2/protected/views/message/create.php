<?php
$this->breadcrumbs = array(
    $this->viewer->username => $this->viewer->href,
    Yii::t('zii', 'Messages') => $this->createUrl('message/manage'),
    Yii::t('zii', 'New message')
);
?>

<h1><?php echo Yii::t('zii', 'Create New Message')?></h1>

<div class="block-area">
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>