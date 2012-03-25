<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Partners') => array('admin'),
    Yii::t('flexiblearn', 'Create'),
);

$this->menu = array(
    array('label' => 'Manage Partner', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Partner') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>