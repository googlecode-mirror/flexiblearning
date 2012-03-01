<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Partners') => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Partner'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'Update Partner'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Delete Partner'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('zii', 'Manage Partner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'View Partner')?></h1>

<div class="block-area">
    <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                'name',
                'address',
                'email',
                'tel',
                array (
                    'label' => Yii::t('zii', 'Logo'),
                    'type' => 'image',
                    'value' => Yii::app()->request->baseUrl . '/' . $model->logo_path
                ),
                array (
                    'label' => Yii::t('zii', 'Link'),
                    'type'=>'raw',
                    'value'=>CHtml::link($model->contact_link,$model->contact_link),
                )
            ),
        ));
    ?>
</div>

<ul class="banners block-area">
    <?php foreach($model->banners as $banner) : ?>
    <li class="a-banner">
        <a href="<?php echo  $banner->banner_link?>">
            <img src="<?php echo Yii::app()->request->baseUrl . '/' . $banner->ad_path?>" />
        </a>
    </li>
    <?php endforeach; ?>
</ul>
