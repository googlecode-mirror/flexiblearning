<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'partner-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'name'); ?>
            <div>
                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'address'); ?>
            <div>
                <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'address'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'email'); ?>
            <div>
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'tel'); ?>
            <div>
                <?php echo $form->textField($model, 'tel', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'tel'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'fileLogo'); ?>
            <div>
                <?php
                    if ($model->logo_path) {
                        echo CHtml::image(Yii::app()->baseUrl . '/' . $model->logo_path, '', 
                                array(
                                    'style' => sprintf('max-width:%s;max-height:%s', 
                                            Yii::app()->params['widthThumbnailImage'],
                                            Yii::app()->params['heightThumbnailImage']) ,
                                )
                            );
                    }
                ?>
                <?php echo CHtml::activeFileField($model, 'fileLogo')?>
                <?php echo $form->error($model,'fileLogo'); ?>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'contact_link'); ?>
            <div>
                <?php echo $form->textField($model, 'contact_link', array('size' => 60, 'maxlength' => 256)); ?>
                <?php echo $form->error($model, 'contact_link'); ?>
            </div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('zii', 'Create') : Yii::t('zii', 'Save')); ?>
        </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->