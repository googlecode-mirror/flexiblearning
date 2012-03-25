<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Partners') => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    Yii::t('flexiblearn', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Partner'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'View Partner'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Partner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Partner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>