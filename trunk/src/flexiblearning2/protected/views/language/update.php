<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Languages') => array('index'),
    Yii::t('flexiblearn', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Language'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'Manage Language'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Language')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>