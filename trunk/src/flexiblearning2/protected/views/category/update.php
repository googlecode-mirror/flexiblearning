<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Categories') => array('index'),
    $model->name => array('view', 'id' => $model->id),
    Yii::t('zii', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Category'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Category'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1>Update Category</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>