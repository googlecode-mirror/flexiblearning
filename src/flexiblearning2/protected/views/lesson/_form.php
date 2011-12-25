<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lesson-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php 
        echo $form->errorSummary($model); 
        if (isset($modelLesson)) {
            echo $form->errorSummary($modelLesson); 
        }
    ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_Category'); ?>
        <?php
            echo CHtml::link($model->category->name, $model->category->getHref());
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_vn'); ?>
        <?php echo $form->textField($model,'title_vn',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'title_vn'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_en'); ?>
        <?php echo $form->textField($model,'title_en',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'title_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_ko'); ?>
        <?php echo $form->textField($model,'title_ko',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'title_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_vn'); ?>
        <?php echo $form->textArea($model,'description_vn',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description_vn'); ?>
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
        <?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fileThumbnail'); ?>
        <?php echo CHtml::activeFileField($model, 'fileThumbnail') ?>
        <?php echo $form->error($model, 'fileThumbnail'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(isset($model->id) ? 'Save' : 'Create'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->