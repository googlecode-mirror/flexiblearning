<?php

$this->breadcrumbs=array(
    Yii::t('zii', 'Manage lectures') => array('lecture/admin'),
);

$this->menu = array(
    array('label' => 'Create Lecture', 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('zii', 'Managage Lectures')?></h1>
<br />
<?php echo CHtml::label('Language', ''); ?>
&nbsp;
<?php
    $arrData = array($this->createUrl('lecture/admin') => '');
    $languages = Language::model()->findAll();
    foreach($languages as $language) {
        $url = $this->createUrl('lecture/admin', array('language_id' => $language->getPrimaryKey()));
        $arrData[$url] = $language->name;        
    }
    echo CHtml::dropDownList('language_id', Yii::app()->request->getRequestUri(), $arrData);
    $idLanguage = Yii::app()->request->getQuery('language_id');
    
?>
<?php
if ($idLanguage) {
    $data = Category::model()->findAllByAttributes(array('id_language' => $idLanguage));
} else {
    $data = Category::model()->findAll();
}

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lecture-grid',
    'dataProvider' => $model->search($idLanguage),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column')
        ),
        'title_en',
        'title_vi',
        'title_ko',
        array(
            'name' => 'id_category',
            'header' => 'Category',
            'value' => '$data->category->name',
            'filter' => CHtml::listData($data, 'id', 'name'),
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
<script language="javascript" type="text/javascript">
    $('#language_id').change(function() {
        window.location.href = $(this).val();
    });
</script>