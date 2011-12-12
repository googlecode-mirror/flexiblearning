<?php
$this->breadcrumbs = array(
    'Lectures' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Lecture', 'url' => array('index')),
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
    'id' => 'lecture-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array (
            'name' => 'description',
            'filter' => false,
        ),
        'price',
        array(
            'name' => 'idCategory',
            'header' => 'Category',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(Category::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'createdDate',
            'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->createdDate)',
            'filter' => false
        ),
        array(
            'name' => 'createdByUser.username',
            'header' => 'Created by',
        ),
        array(
            'name' => 'updatedDate',
            'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->updatedDate)',
            'filter' => false
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
