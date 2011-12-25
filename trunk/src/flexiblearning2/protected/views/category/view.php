<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Update Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Category', 'url' => array('admin')),
    array('label' => 'Create Lesson', 'url' => array(
        'lesson/create', 
        'idCategory' => $model->id, 
        'idLanguage' => $model->language->id)),    
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'name_vn',
            'name_en',
            'name_ko',
            'description_vn',
            'description_en',
            'description_ko',
            'id_language',
            'flag_del',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
        ),
    ));
?>

