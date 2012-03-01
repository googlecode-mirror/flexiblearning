<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Languages') => array('index'),
    Yii::t('zii', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Manage Language'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Language')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>