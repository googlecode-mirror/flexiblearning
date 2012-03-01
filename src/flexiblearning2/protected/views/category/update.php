<?php
$language = $model->language;
$this->breadcrumbs = array(
    Yii::t('zii', $langauge->name) => $language->href,
    Yii::t('zii', 'Update Category'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Category'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Category'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Category')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>