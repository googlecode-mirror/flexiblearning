<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Lessons') => array('index'),
    Yii::t('zii', 'Manage'),
);

$this->menu = array(
    array('label' => 'List Lesson', 'url' => array('index')),
);
?>

<h1>Manage Lessons</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lesson-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'title_vi',
        'title_en',
        'title_ko',
        array(
            'name' => 'id_lecture',
            'value' => '$data->lecture->title',
            'filter' => CHtml::listData(Lecture::model()->findAll(), 'id', 'title'),
        ),        
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
