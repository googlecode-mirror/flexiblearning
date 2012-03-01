<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Partners') => array('admin'),
    Yii::t('zii', 'Create'),
);

$this->menu = array(
    array('label' => 'Manage Partner', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Partner') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>