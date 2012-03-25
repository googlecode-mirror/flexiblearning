<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('flexiblearn', $language->name) => $language->href,
    $category->name => $category->getHref(),
    Yii::t('flexiblearn', 'Lecture : ') . $lecture->title => $lecture->getHref(),
    Yii::t('flexiblearn', 'Create lesson'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Manage Lessons'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Lesson') ?></h1>

<?php
$arrayModels = array('model' => $model);
if (isset($modelLesson)) {
    $arrayModels['modelLesson'] = $modelLesson;
}
echo $this->renderPartial('_form', $arrayModels);
?>