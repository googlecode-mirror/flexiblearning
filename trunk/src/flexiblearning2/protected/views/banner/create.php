<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Banners') => array('index'),
    Yii::t('flexiblearn', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Banner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>