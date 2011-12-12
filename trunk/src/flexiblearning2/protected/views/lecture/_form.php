<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lecture-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ), 
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'idCategory'); ?>
            <?php echo $form->dropDownList($model,'idCategory', CHtml::listData(Category::model()->findAllByAttributes(array('state' => 1)), 'id', 'name') ); ?>
            <?php echo $form->error($model,'idCategory'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'fileThumbnail'); ?>
            <?php echo CHtml::activeFileField($model, 'fileThumbnail')?>
            <?php echo $form->error($model,'fileThumbnail'); ?>
        </div>

	<div class="row buttons">
             <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', 
                     array('class' => 'bt')); ?>    
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->