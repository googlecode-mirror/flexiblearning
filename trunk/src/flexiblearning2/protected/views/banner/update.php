<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Banners') => array('manage'),
    $model->banner_link,
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Banner'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Banner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>