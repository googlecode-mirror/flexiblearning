<?php
$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Lecture', 'url'=>array('admin')),
);
?>

<h1>Create Lecture</h1>

<div class="block">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>