<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Partners') => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    Yii::t('zii', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Partner'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Partner'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Partner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Partner')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>