<div class="form">
<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'language-form',
	'enableAjaxValidation'=>false,
    )); 
?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name_vi'); ?>
        <div>
            <?php echo $form->textField($model, 'name_vi', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'name_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name_en'); ?>
        <div>
            <?php echo $form->textField($model, 'name_en', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'name_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name_ko'); ?>
        <div>
            <?php echo $form->textField($model, 'name_ko', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'name_ko'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'code'); ?>
        <div>
            <?php echo $form->textField($model, 'code', array('size' => 50, 'maxlength' => 2)); ?>
            <?php echo $form->error($model, 'code'); ?>
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