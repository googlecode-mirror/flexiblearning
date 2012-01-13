<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Categories') => array('index'),
    Yii::t('zii', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Category'), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('zii', 'Manage Categories')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column')
        ),
        array('name' => 'name_vi', 'filter' => false),
        array('name' => 'name_en', 'filter' => false),
        array('name' => 'name_ko', 'filter' => false),
        array(
            'name' => 'id_language',
            'value' => '$data->language->name',
            'filter' => CHtml::listData(Language::model()->findAll(), 'id', 'name'),
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
