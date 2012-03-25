<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Documents') => array('manage'),
    $model->subject_vi,
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Document'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'Manage Document'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Document')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>