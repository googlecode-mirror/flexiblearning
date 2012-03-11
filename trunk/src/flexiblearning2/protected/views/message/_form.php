<?php
    Yii::app()->clientScript->registerScript('autocomplete', "
        autoComplete = jQuery('#Message_toUsers').autocomplete({
            serviceUrl:'{$this->createUrl('account/suggest')}',
            minChars:2, 
            delimiter: /(,|;)\s*/, // regex or character
            maxHeight:400,
            width:300,
            zIndex: 9999,
            deferRequestBy: 0, //miliseconds
        });
    ");
?>

<div class="form">
<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
    )); 
?>
    <div class="row">
        <?php echo $form->labelEx($model,'toUsers'); ?>
        <div>
            <?php echo CHtml::textField('toUsers', '', array('size' => '100', 'id' => 'Message_toUsers'))?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'subject'); ?>
        <div>
            <?php echo $form->textField($model,'subject'); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'message'); ?>
        <div>
            <?php echo $form->textArea($model,'message', array('rows' => 5, 'cols' => 80)); ?>
            <?php echo $form->error($model,'message'); ?>
        </div>
    </div>
    
    <div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php echo CHtml::submitButton(Yii::t('zii', 'Send'), array('class' => 'bt')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<script language="javascript" type="text/javascript">
    jQuery('#message-form').submit(function() {
        
    });
</script>