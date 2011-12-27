<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'register-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    )));
?>

<table width="940" border="0" cellpadding="0" cellspacing="0">        
    <tr>
        <td class="top" id="caption" colspan="2">
            <span id="title-text">Register</span>
        </td>
    </tr>    
    <tr>
        <td id="bg-td">
            <table width="800" border="0" class="top" id="regis-wrap">
                <?php if (Yii::app()->user->hasFlash('register')): ?>
                    <tr>
                        <td colspan="2" style="padding-bottom:40px;">
                            <div class="flash-success">
                                <?php echo Yii::app()->user->getFlash('register'); ?>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                <tr>
                    <td colspan="2">
                        <?php 
                            echo $form->errorSummary($model); 
                            if (isset ($account)) {
                                echo $form->errorSummary($account); 
                            }
                        ?>
                        <p class="note">Fields with <span class="required">*</span> are required.</p>            
                    </td>
                </tr>
                <tr>
                    <td><strong>Personal Information</strong> </td>
                    <td><strong>Account Information</strong> </td>
                </tr>
                <tr>
                    <td>
                        <table width="400" border="0" cellspacing="10">                          
                            <tr>
                                <td><?php echo $form->labelEx($model, 'fullname'); ?></td>
                                <td>
                                    <?php echo $form->textField($model, 'fullname', array('size' => 40, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'fullname'); ?>
                                </td>
                            </tr>                            
                            <tr>
                                <td><?php echo $form->labelEx($model, 'dateOfBirth'); ?></td>
                                <td>
                                    <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'name' => 'RegisterForm[dateOfBirth]',                                                                                       
                                            'options' => array(
                                                'showAnim' => 'fold',
                                            ),
                                            'htmlOptions' => array(
                                                'style' => 'height:20px;'
                                            ),                                           
                                            'value' => $model->dateOfBirth,
                                            'options' => array('yearRange' => '2000:2010',  'dateFormat' => 'mm/dd/yy')
                                        ));
                                    ?>
                                    <?php echo $form->error($model, 'dateOfBirth'); ?>
                                </td>
                            </tr>                            
                            <tr>
                                <td><?php echo $form->labelEx($model, 'address'); ?></td>
                                <td>
                                    <?php echo $form->textField($model, 'address', array('size' => 40, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'address'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $form->labelEx($model, 'tel'); ?></td>
                                <td>
                                    <?php echo $form->textField($model, 'tel', array('size' => 40, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'address'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $form->labelEx($model, 'email'); ?></td>
                                <td>
                                    <?php echo $form->textField($model, 'email', array('size' => 40, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $form->labelEx($model, 'id_nationality'); ?></td>
                                <td>
                                    <?php echo $form->dropDownList($model, 'id_nationality', CHtml::listData(Nationality::model()->findAll(), 'id', 'name')); ?>     
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $form->labelEx($model, 'id_profession'); ?></td>
                                <td>
                                    <?php echo $form->dropDownList($model, 'id_profession', CHtml::listData(Profession::model()->findAll(), 'id', 'name')); ?>     
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo CHtml::activeLabelEx($model, 'verifiedCode') ?></td>
                                <td>                                    
                                    <?php $this->widget('CCaptcha', array('buttonType' => 'button')) ?>                                        
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <?php echo CHtml::activeTextField($model, 'verifiedCode') ?>
                                    <?php echo CHtml::error($model, 'verifiedCode') ?>
                                </td>
                            </tr>
                        </table>				
                    </td>
                    <td>
                        <table width="400" border="0" cellspacing="10">
                            <tr>
                                <td><?php echo $form->labelEx($model, 'username'); ?></td>
                                <td>
                                    <?php echo $form->textField($model, 'username', array('size' => 30, 'maxlength' => 128)); ?>
                                    <?php echo $form->error($model, 'username'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $form->labelEx($model, 'password'); ?></td>
                                <td>
                                    <?php echo $form->passwordField($model, 'password', array('size' => 30, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'password'); ?>
                                </td>
                            </tr>                            
                            <tr>
                                <td><?php echo $form->labelEx($model, 'password_repeat'); ?></td>
                                <td>
                                    <?php echo $form->passwordField($model, 'password_repeat', array('size' => 30, 'maxlength' => 256)); ?>
                                    <?php echo $form->error($model, 'password_repeat'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>				
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Policy</td>
                </tr>
                <tr>                        
                    <td colspan="2">
                        <textarea name="" cols="" rows="" readonly="readonly" id="area">
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
 
totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni

 dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
s                        </textarea>				
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $form->checkBox($model, 'agree', array('uncheckValue' => '')); ?>
                        <?php echo $form->labelEx($model, 'agree', array('for' => 'RegisterForm_agree')); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="padding-bottom:40px;"> 
                        <?php echo CHtml::submitButton('Register', array('class' => 'bt')); ?>    
                    </td>
                </tr>
                <?php endif;?>
            </table>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>