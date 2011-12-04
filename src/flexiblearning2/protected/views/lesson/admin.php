<?php
$this->breadcrumbs = array(
    'Lessons' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Lesson', 'url' => array('index')),
    array('label' => 'Create Lesson', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lesson-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lessons</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lesson-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'lecture.name',
            'header' => 'Lecture',
        ),
        array(
            'name' => 'createdDate',
            'value' => 'date(Yii::app()->params["dateFormat"], $data->createdDate)',
        ),
        array(
            'name' => 'createdDate',
            'value' => 'date(Yii::app()->params["dateFormat"], $data->createdDate)',
        ),
        array(
            'name' => 'createdByUser.username',
            'header' => 'Created by',
        ),
        array(
            'name' => 'updatedByUser.username',
            'header' => 'Updated by',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
