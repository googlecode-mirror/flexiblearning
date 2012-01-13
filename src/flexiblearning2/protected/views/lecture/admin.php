<?php
$this->breadcrumbs = array(
    'Lectures' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Lecture', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lecture-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Lectures</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lecture-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title_en',
        'title_vi',
        'title_ko',
        array(
            'name' => 'id_category',
            'header' => 'Category',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(Category::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'is_active',
            'filter' => array('0' => 'No', '1' => 'Yes'),
            'value' => '($data->is_active)?"Yes":"No"',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
