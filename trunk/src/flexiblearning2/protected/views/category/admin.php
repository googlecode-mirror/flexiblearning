<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>

<p class="block">
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="block">
    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->
</div>

<div class="block">    
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'category-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'name',
            array(
                'name' => 'description',
                'filter' => false,
            ),
            array(
                'header' => 'Language',
                'name' => 'idLanguage',
                'value' => '$data->language->name',
                'filter' => CHtml::listData(Language::model()->findAll(), 'id', 'name'),
            ),
            array(
                'name' => 'state',
                'filter' => Yii::app()->params["state"],
                'value' => 'Yii::app()->params["state"][$data->state]',
            ),
            array(
                'name' => 'createdDate',
                'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->createdDate)',
                'filter' => false,
            ),
            array(
                'name' => 'createdBy',
                'value' => '$data->updatedByUser->username'
            ),
            array(
                'name' => 'updatedDate',
                'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->updatedDate)',
                'filter' => false,
            ),
            array(
                'name' => 'updatedBy',
                'value' => '$data->updatedByUser->username'
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div>