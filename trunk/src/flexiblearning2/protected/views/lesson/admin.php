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
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'title_vi',
        'title_en',
        'title_ko',
        array(
            'name' => 'id_category',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(Category::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'category.id_language',
            'value' => '$data->category->language->name',
            'filter' => CHtml::listData(Language::model()->findAll(), 'id', 'name'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
