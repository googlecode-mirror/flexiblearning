<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'category-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name_vi'); ?>
        <?php echo $form->textField($model,'name_vi',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'name_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_en'); ?>
        <?php echo $form->textField($model,'name_en',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'name_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_ko'); ?>
        <?php echo $form->textField($model,'name_ko',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'name_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_vi'); ?>
        <?php echo $form->textArea($model,'description_vi',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_en'); ?>
        <?php echo $form->textArea($model,'description_en',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_ko'); ?>
        <?php echo $form->textArea($model,'description_ko',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_language'); ?>
        <?php echo $form->dropDownList($model, 'id_language', CHtml::listData(Language::model()->findAll(), 'id', 'name')) ?>
        <?php echo $form->error($model,'id_language'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->