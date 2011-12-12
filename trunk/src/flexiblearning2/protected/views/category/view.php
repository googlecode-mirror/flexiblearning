<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Update Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<div class="block">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'name',
            array(
                'name' => 'description',
                'value' => $model->description,
                'visible' => $model->description == null ? false : true,
            ),
            array(
                'name' => 'idLanguage',
                'value' => $model->language->name,
            ),
            array(
                'name' => 'state',
                'value' => Yii::app()->params['state'][$model->state],
            ),
            array(
                'name' => 'createdDate',
                'value' => Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'],$model->createdDate),
            ),
            array(
                'name' => 'createdBy',
                'value' => $model->createdByUser->username,
            ),
            array(
                'name' => 'updatedDate',
                'value' => Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'],$model->updatedDate),
            ),
            array(
                'name' => 'updatedBy',
                'value' => $model->updatedByUser->username,
            ),
        ),
    ));
    ?>
</div>

<?php foreach ($model->lectures as $lecture) : ?>
    <div><?php echo $lecture->name ?></div>
<?php endforeach; ?>

