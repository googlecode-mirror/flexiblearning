<?php
$this->breadcrumbs = array(
    'Languages' => array('admin'),
);

$this->menu = array(
    array('label' => 'Create Language', 'url' => array('create')),
);
?>

<h1>Manage Languages</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'language-grid',
    'dataProvider' => new CActiveDataProvider(Language::model()),
    'columns' => array(
        'id',
        'name_vn',
        'name_en',
        'name_ko',
        array(
            'class' => 'CButtonColumn',
            'template'=>'{delete}{update}',
        ),
    ),
));
?>
