<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->getHref(),
    Yii::t('zii', 'Lecture : ') . $lecture->title => $lecture->getHref(),
    Yii::t('zii', 'Create lesson'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Manage Lessons'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Lesson') ?></h1>

<?php
$arrayModels = array('model' => $model);
if (isset($modelLesson)) {
    $arrayModels['modelLesson'] = $modelLesson;
}
echo $this->renderPartial('_form', $arrayModels);
?>