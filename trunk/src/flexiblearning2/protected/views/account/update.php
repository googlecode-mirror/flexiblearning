<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Accounts') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('flexiblearn', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Account'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'View Account'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Accounts'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Account')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>