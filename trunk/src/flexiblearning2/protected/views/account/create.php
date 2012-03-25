<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Accounts') => array('index'),
    Yii::t('flexiblearn', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'List Account'), 'url' => array('index')),
    array('label' => Yii::t('flexiblearn', 'Manage Account'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Account')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>