<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('zii', 'Update lecture'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Lecture'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Lecture'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Lecture'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Lecture') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>