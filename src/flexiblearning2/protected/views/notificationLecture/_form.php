<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'notification-lecture-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title_vi'); ?>
        <?php echo $form->textField($model, 'title_vi', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'title_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'title_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title_ko'); ?>
        <?php echo $form->textField($model, 'title_ko', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'title_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content_vi'); ?>
        <div>
            <?php
            $this->widget('ext.tinymce.ETinyMce', array(
                'model' => $model,
                'attribute' => 'content_vi',
                'editorTemplate' => 'simple',
                'height' => '80px',
                'width' => '360px',
                    )
            );
            ?>
            <?php echo $form->error($model, 'content_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content_en'); ?>
        <div>
            <?php
            $this->widget('ext.tinymce.ETinyMce', array(
                'model' => $model,
                'attribute' => 'content_en',
                'editorTemplate' => 'simple',
                'height' => '80px',
                'width' => '360px',
                    )
            );
            ?>
            <?php echo $form->error($model, 'content_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content_ko'); ?>
        <div>
            <?php
            $this->widget('ext.tinymce.ETinyMce', array(
                'model' => $model,
                'attribute' => 'content_ko',
                'editorTemplate' => 'simple',
                'height' => '80px',
                'width' => '360px',
                    )
            );
            ?>
            <?php echo $form->error($model, 'content_ko'); ?>
        </div>
    </div>

    <?php echo $form->hiddenField($model, 'id_lecture'); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->