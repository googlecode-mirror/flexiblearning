<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Accounts') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('zii', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'List Account'), 'url' => array('index')),
    array('label' => Yii::t('zii', 'Create Account'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Account'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Account'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Account')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>