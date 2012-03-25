<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('flexiblearn', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('flexiblearn', 'Update Lecture'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Lecture'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'View Lecture'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Lecture'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Lecture') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>