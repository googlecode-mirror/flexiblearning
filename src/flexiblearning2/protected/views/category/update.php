<?php
$language = $model->language;
$this->breadcrumbs = array(
    Yii::t('flexiblearn', $language->name) => $language->href,
    Yii::t('flexiblearn', 'Update Category'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Category'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'View Category'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Category')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>