<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Accounts') => array('index'),
    Yii::t('flexiblearn', 'Manage'),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Manage Accounts')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'account-grid',
    'enablePagination' => true,
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column')
        ),
        'username',
        array('name' => 'fullname', 'filter' => false),
        array('name' => 'tel', 'filter' => false),
        array(
            'name' => 'dateOfBirth',
            'filter' => false,
            'value' => 'Yii::app()->dateFormatter->format("' 
                . Yii::app()->params['dateFormat'] 
                . '",$data->dateOfBirth)'
        ),
        array(
            'name' => 'id_nationality',
            'filter' => CHtml::listData(Nationality::model()->findAll(), 'id', 'name'),
            'value' => '($data->nationality)?$data->nationality->name:""'
        ),
        array(
            'name' => 'id_profession',
            'filter' => CHtml::listData(Profession::model()->findAll(), 'id', 'name'),
            'value' => '($data->profession)?$data->profession->name:""'
        ),
        array(
            'header' => Yii::t('flexiblearn', 'Role'), 
            'value' => 'Yii::t("zii", $data->role)'
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
