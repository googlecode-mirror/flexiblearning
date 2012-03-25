<?php
    if (isset($model->id_language)) {
        $language = $model->language;
        $this->breadcrumbs = array(
            Yii::t('flexiblearn', $langauge->name) => $language->href,
            Yii::t('flexiblearn', 'Create Category'),
        );
    } else {
        $this->breadcrumbs = array(
            Yii::t('flexiblearn', 'Create Category'),
        );
    }

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Manage Categories'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Category')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>