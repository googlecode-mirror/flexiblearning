<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs=array(
    Yii::t('flexiblearn', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('flexiblearn', 'Lecture : ') . $lecture->title => $lecture->href,
    $model->title => $model->href,
    Yii::t('flexiblearn', 'Update Lesson'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'View Lesson'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Lesson'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Lesson')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>