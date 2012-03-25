<?php
$this->breadcrumbs = array(
    $model->ownerBy->username => $model->ownerBy->href,
    Yii::t('flexiblearn', 'Blogs') => $model->ownerBy->href . '#blog-tab',
    Yii::t('flexiblearn', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Manage Entries'), 'url' => array('manage')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Entry') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>