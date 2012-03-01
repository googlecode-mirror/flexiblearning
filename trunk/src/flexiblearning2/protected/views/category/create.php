<?php
$language = $model->language;
$this->breadcrumbs = array(
    Yii::t('zii', $langauge->name) => $language->href,
    Yii::t('zii', 'Create Category'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Category')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>