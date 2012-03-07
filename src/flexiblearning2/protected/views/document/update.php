<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Documents') => array('manage'),
    $model->subject_vi,
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Document'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'Manage Document'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Document')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>