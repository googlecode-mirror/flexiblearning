<div class="form">

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'banner_link'); ?>
            <div>
                <?php echo $form->textField($model,'banner_link',array('size'=>60,'maxlength'=>256)); ?>
                <?php echo $form->error($model,'banner_link'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'id_partner'); ?>
            <div>
                <?php echo $form->dropDownList($model, 'id_partner', CHtml::listData(Partner::model()->findAll(), 'id', 'name')) ?>
                <?php echo $form->error($model,'id_partner'); ?>
            </div>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'fileAd'); ?>
            <div>
                <?php
                    if ($model->ad_path) {
                        echo CHtml::image(Yii::app()->baseUrl . '/' . $model->ad_path, '', 
                                array(
                                    'style' => sprintf('max-width:%s;max-height:%s', 
                                            Yii::app()->params['widthThumbnailImage'],
                                            Yii::app()->params['heightThumbnailImage']) ,
                                )
                            );
                    }
                ?>
                <?php echo CHtml::activeFileField($model, 'fileAd')?>
                <?php echo $form->error($model,'fileAd'); ?>
            </div>
        </div>

	<div class="row">
            <?php echo $form->labelEx($model,'is_active'); ?>
            <div>
                <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
                <?php echo $form->error($model,'is_active'); ?>
            </div>
	</div>

	<div class="row buttons">
            <label>&nbsp;</label>
            <div>
                <?php echo CHtml::submitButton(Yii::t('flexiblearn', $model->isNewRecord ? 'Create' : 'Save'), array('class' => 'bt')); ?>
            </div>
	</div>
        
<?php $this->endWidget(); ?>

</div><!-- form -->