<div class="form">

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'document-form',
//        'enableAjaxValidation' => true,
//        'enableClientValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
?>

    <p class="note">
        <?php echo Yii::t('flexiblearn', 'Fields with')?>        
        <span class="required">*</span> <?php echo Yii::t('flexiblearn', 'are required')?>.
    </p>    

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model, 'id_lesson') ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'subject_vi'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_vi') ?>
            <?php echo $form->error($model, 'subject_vi'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'subject_en'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_en') ?>
            <?php echo $form->error($model, 'subject_en'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'subject_ko'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_ko') ?>
            <?php echo $form->error($model, 'subject_ko'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>
        <div>
            <?php echo CHtml::activeFileField($model, 'file') ?>
            <?php echo $form->error($model, 'file'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'description_vi'); ?>
        <div>
            <?php echo $form->textArea($model, 'description_vi') ?>
            <?php echo $form->error($model, 'description_vi'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'description_en'); ?>
        <div>
            <?php echo $form->textArea($model, 'description_en') ?>
            <?php echo $form->error($model, 'description_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_ko'); ?>
        <div>
            <?php echo $form->textArea($model, 'description_ko') ?>
            <?php echo $form->error($model, 'description_ko'); ?>
        </div>
    </div>

    <div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php 
                echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'bt')); 
            ?>
        </div>
    </div>
    
<?php $this->endWidget(); ?>
    
</div><!-- form -->