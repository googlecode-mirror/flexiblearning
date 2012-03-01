<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Banners') => array('index'),
    Yii::t('zii', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'List Banner'), 'url' => array('index')),
    array('label' => Yii::t('zii', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Banner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>