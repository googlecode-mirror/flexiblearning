<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Banners') => array('manage'),
    $model->banner_link,
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Banner'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Banner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>