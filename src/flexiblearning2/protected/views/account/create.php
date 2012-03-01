<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Accounts') => array('index'),
    Yii::t('zii', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'List Account'), 'url' => array('index')),
    array('label' => Yii::t('zii', 'Manage Account'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Account')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>