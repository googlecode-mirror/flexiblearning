<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'document-form',
    'enableAjaxValidation'=>false,
   
    'htmlOptions' => array('enctype' => 'multipart/form-data'),

)); 
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'subject_vi'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_vi') ?>
            <?php echo $form->error($model,'subject_vi'); ?>
        </div>
        
    </div>
     <div class="row">
        <?php echo $form->labelEx($model,'subject_en'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_en') ?>
            <?php echo $form->error($model,'subject_en'); ?>
        </div>
        
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'subject_ko'); ?>
        <div>
            <?php echo $form->textField($model, 'subject_ko') ?>
            <?php echo $form->error($model,'subject_ko'); ?>
        </div>
        
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'filename'); ?>
        <div>
            <?php echo $form->textField($model, 'filename') ?>
            <?php echo $form->error($model,'filename'); ?>
        </div>
        
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'description_vi'); ?>
        <div>
            <?php echo $form->textField($model, 'description_vi') ?>
            <?php echo $form->error($model,'description_vi'); ?>
        </div>
        
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'description_en'); ?>
        <div>
            <?php echo $form->textField($model, 'description_en') ?>
            <?php echo $form->error($model,'description_en'); ?>
        </div>
        
    </div>
   
    <div class="row">
        <?php echo $form->labelEx($model,'description_ko'); ?>
        <div>
            <?php echo $form->textField($model, 'description_ko') ?>
            <?php echo $form->error($model,'description_ko'); ?>
        </div>
        
    </div>

    <div class="row">
            <?php echo $form->labelEx($model,'document_path'); ?>
            <div>
                <?php
                    if ($model->document_path) {
                        echo CHtml::image(Yii::app()->baseUrl . '/' . $model->document_path, '', 
                                array(
                                    'style' => sprintf('max-width:%s;max-height:%s', 
                                            Yii::app()->params['widthThumbnailImage'],
                                            Yii::app()->params['heightThumbnailImage']) ,
                                )
                            );
                    }
                ?>
                <?php echo CHtml::activeFileField($model, 'fileDocument')?>
                <?php echo $form->error($model,'fileDocument'); ?>
            </div>
        </div>
   
	<div class="row">
            <?php echo $form->labelEx($model,'id_lesson'); ?>
            <div>
                <?php echo $form->dropDownList($model, 'id_lesson', CHtml::listData(Lesson::model()->findAll(), 'id', 'title_vi')) ?>
                <?php echo $form->error($model,'id_lesson'); ?>
            </div>
	</div>
	 <div class="row">
          <?php echo $form->labelEx($model,'flag_approve'); ?>
          <div>
             <?php echo $form->checkBox($model, 'flag_approve', array('uncheckValue' => 0)) ?>
             <?php echo $form->error($model,'flag_approve'); ?>
          </div>
	</div>
	
 	<div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'bt')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->