<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php 
            echo $form->errorSummary($model); 
            if (isset($modelVideo)) {
                echo $form->errorSummary($modelVideo); 
            }
        ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_vi'); ?>
		<?php echo $form->textArea($model,'description_vi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description_vi'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'description_en'); ?>
            <?php echo $form->textArea($model, 'description_en', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'description_en'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'description_ko'); ?>
            <?php echo $form->textArea($model, 'description_ko', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'description_ko'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'file'); ?>
            <?php echo CHtml::activeFileField($model, 'file') ?>
            <?php echo $form->error($model, 'file'); ?>
        </div>

	<div class="row buttons">
            <?php echo CHtml::submitButton(isset($model->id) ? 'Save' : 'Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->