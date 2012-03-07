<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Documents') => array('admin'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Document'), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('zii', 'Manage Documents')?></h1>

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
            'name' => 'flag_approve',
            'filter' => array('0' => 'No', '1' => 'Yes'),
            'value' => '($data->flag_approve)?"Yes":"No"',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
        ),
    ),
));
?>