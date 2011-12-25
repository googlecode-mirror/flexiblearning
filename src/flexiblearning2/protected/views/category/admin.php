<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);
?>

<h1>Manage Categories</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'name_vi', 'filter' => false),
        array('name' => 'name_en', 'filter' => false),
        array('name' => 'name_ko', 'filter' => false),
        array('name' => 'description_vi', 'filter' => false),
        array('name' => 'description_en', 'filter' => false),
        array(
            'name' => 'id_language',
            'header' => 'Language',
            'value' => '$data->language->name',
            'filter' => CHtml::listData(Language::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'flag_del',
            'header' => 'Deleted',
            'filter' => array('0' => 'not deleted', '1' => 'deleted'),
            'value' => '($data->flag_del == 0)?"not deleted":"deleted"',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
