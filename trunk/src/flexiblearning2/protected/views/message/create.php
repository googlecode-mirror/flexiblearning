<?php
$this->breadcrumbs = array(
    $this->viewer->username => $this->viewer->href,
    Yii::t('flexiblearn', 'Messages') => $this->createUrl('message/manage'),
    Yii::t('flexiblearn', 'New message')
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create New Message')?></h1>

<div class="block-area">
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>