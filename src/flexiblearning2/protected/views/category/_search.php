<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

   <div class="row">
        <?php echo $form->label($model, 'idLanguage'); ?>        
        <?php echo $form->dropDownList($model,'idLanguage', 
                CHtml::listData(Language::model()->findAll(), 'id', 'name'), 
                array('empty' => '(Select a language)') ); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'state'); ?>
        <?php echo $form->dropDownList($model, 'state', Yii::app()->params['state'], 
                array('empty' => '(Select a state)')); ?>
    </div> 

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->