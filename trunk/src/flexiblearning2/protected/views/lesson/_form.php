<div class="form">

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lesson-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); 
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php 
        echo $form->errorSummary($model); 
        if (isset($modelLesson)) {
            echo $form->errorSummary($modelLesson); 
        }
    ?>

    <div class="row">
        <?php echo CHtml::label(Yii::t('zii', 'Language'), ''); ?>
        <?php
            echo $form->dropDownList(
                $model, 
                'id_language', 
                CHtml::listData(Language::model()->findAll(), 'id', 'name'),
                array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => $this->createUrl('category/listByLanguage'),
                        'update' => '#Lesson_id_category'
                    )
                )
            ); 
        ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'id_category'); ?>
        <div>
            <?php 
                echo $form->dropDownList($model, 'id_category', 
                    CHtml::listData(Category::model()->findAll("id_language = {$model->id_language}"), 'id', 'name'),
                    array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => $this->createUrl('lecture/listByCategory'),
                            'update' => '#Lesson_id_lecture'
                        )
                    )
                ); 
            ?>
            <?php echo $form->error($model, 'id_category'); ?>
        </div>
    </div>       
    
    <div class="row">
        <?php echo $form->label($model,'id_lecture'); ?>
        <div>
            <?php
                echo $form->dropDownList($model, 'id_lecture', 
                    CHtml::listData(Lecture::model()->findAll("id_category = {$model->id_category}"), 'id', 'title')); 
//                echo CHtml::link($model->lecture->title, $model->lecture->href);
            ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_vi'); ?>
        <div>
            <?php echo $form->textField($model,'title_vi',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'title_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_en'); ?>
        <div>
            <?php echo $form->textField($model,'title_en',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'title_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_ko'); ?>
        <div>
            <?php echo $form->textField($model,'title_ko',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'title_ko'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_vi'); ?>
  
        <div>
            <?php
            $this->widget('application.extensions.tinymce.ETinyMce', array(
                'attribute' => 'description_vi',
                'model' => $model,
                'editorTemplate' => 'simple',
                'height' => '100px',
                'width' => '450px')
            );
            ?>
            <?php echo $form->error($model, 'description_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_en'); ?>
        <div>
            <?php 
                $this->widget('application.extensions.tinymce.ETinyMce', array(
                    'attribute' => 'description_en',
                   'model' => $model,
                    'editorTemplate' => 'simple',
                    'height'=>'100px',
                    'width' =>'450px' )
                ); 
            ?>
            <?php echo $form->error($model,'description_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_ko'); ?>
        <div>
            <?php 
                $this->widget('application.extensions.tinymce.ETinyMce', array(
                    'attribute' => 'description_ko',
                    'model' => $model,
                    'editorTemplate' => 'simple',
                    'height'=>'100px',
                    'width' =>'450px' )
                ); 
            ?>
            <?php echo $form->error($model,'description_ko'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'price'); ?>
        <div>
            <?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'price'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fileThumbnail'); ?>
        <div>
            <?php
                if ($model->thumbnail) {
                    echo CHtml::image(Yii::app()->baseUrl . '/' . $model->thumbnail, '', 
                            array(
                                'style' => sprintf('max-width:%s;max-height:%s', 
                                        Yii::app()->params['widthThumbnailLesson'],
                                        Yii::app()->params['heightThumbnailLesson']) ,
                            )
                        );
                }
            ?>
            <?php echo CHtml::activeFileField($model, 'fileThumbnail') ?>
            <?php echo $form->error($model, 'fileThumbnail'); ?>
        </div>
    </div>
    
    <?php if (Yii::app()->user->checkAccess('adminLesson')) : ?>
        <div class="row">
            <?php echo $form->labelEx($model,'is_active'); ?>
            <div>
                <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
                <?php echo $form->error($model,'is_active'); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php echo CHtml::submitButton(isset($model->id) ? 'Save' : 'Create', array('class' => 'bt')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->