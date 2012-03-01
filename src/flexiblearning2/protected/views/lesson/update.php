<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs=array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('zii', 'Lecture : ') . $lecture->title => $lecture->href,
    $model->title => $model->href,
    Yii::t('zii', 'Update lesson'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'View Lesson'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Lesson'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Lesson')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>