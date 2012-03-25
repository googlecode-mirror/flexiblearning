<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Documents') => array('admin'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Document'), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Manage Documents') ?></h1>

<?php
$data = Lesson::model()->findAll();

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'document-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'subject_vi',
        'subject_en',
        'subject_ko',
        'description_vi',
        'description_en',
        'description_ko',
        array(
            'name' => 'id_lesson',
            'header' => 'Lesson',
            'value' => '$data->lesson->title_vi',
            'filter' => CHtml::listData($data, 'id', 'title_vi'),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
        ),
    ),
));
?>