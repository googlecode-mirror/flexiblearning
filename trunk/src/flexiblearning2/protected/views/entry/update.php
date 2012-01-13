<?php
$this->breadcrumbs=array(
	$model->ownerBy->username => $model->ownerBy->href,
        Yii::t('zii', 'Blogs') => $model->ownerBy->href .  '#blog-tab',
	Yii::t('zii', 'Update'),
);

$this->menu=array(
	array('label' => Yii::t('zii', 'Manage Entries'), 'url'=>array('mange')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Entry')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>