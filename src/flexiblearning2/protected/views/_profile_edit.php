<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'account-form',
    'enableAjaxValidation' => false,
    'action' => $this->createUrl('account/update', array('id' => $model->getPrimaryKey())),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<?php echo $form->errorSummary($model); ?>
<table width="750" border="0">
    <tr>
        <td width="300" class="cell-avatar">
            <div class="block-area">
            <?php 
                echo Yii::t('flexiblearn', 'Role : ');
                if (Yii::app()->user->checkAccess('adminUser') && Yii::app()->user->getId() != $model->getPrimaryKey()) {
                    echo CHtml::dropDownList('role', $model->role, Yii::app()->params['roles']);
                    echo '&nbsp;';
                    echo CHtml::submitButton(Yii::t('flexiblearn', 'Update Role'), 
                            array('name' => 'updateRole', 'value' => 'Update'));
                } else {
                    echo $model->role;
                }
            ?>
            </div>
            <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->getAvatarPath()?>" width="250" height="250" class="bor" />
            <div class="block-area">
                <?php echo $form->labelEx($model, 'fileAvatar'); ?>
                <div>                    
                    <?php echo CHtml::activeFileField($model, 'fileAvatar') ?>
                    <?php echo $form->error($model, 'fileAvatar'); ?>
                </div>
            </div>
        </td>
        <td width="450" id="bg-td">
            <table width="450" cellspacing="10">
                <?php if (Yii::app()->user->hasFlash('message')): ?>
                    <tr>
                        <td colspan="2" style="color: #0066ff">
                            <?php echo Yii::app()->user->getFlash('message'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td width="150">
                        <?php echo $form->label($model, 'username') ?>
                    </td>
                    <td><strong><?php echo $model->username?></strong> </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'fullname') ?></td>
                    <td>
                        <div><?php echo $form->textField($model, 'fullname')?></div>
                        <div><?php echo $form->error($model,'fullname'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'dateOfBirth') ?></td>
                    <td>
                        <div>
                            <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'attribute' => 'dateOfBirth',
                                    'options' => array(
                                        'showAnim' => 'fold',
                                    ),
                                    'htmlOptions' => array(
                                        'style' => 'height:20px;'
                                    ),
                                    'options' => array('yearRange' => '2000:2010', 'dateFormat' => 'dd/mm/yy')
                                ));
                            ?>
                        </div>
                        <div><?php echo $form->error($model,'dateOfBirth'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'address') ?></td>
                    <td>
                        <div><?php echo $form->textField($model, 'address')?></div>
                        <div><?php echo $form->error($model,'address'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'id_nationality') ?></td>
                    <td>
                        <div>
                            <?php echo $form->dropDownList(
                                    $model, 
                                    'id_nationality', 
                                    CHtml::listData(Nationality::model()->findAll(), 'id', 'name')
                            ) ?>
                        </div>
                        <div><?php echo $form->error($model,'id_nationality'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'tel') ?></td>
                    <td>
                        <div><?php echo $form->textField($model, 'tel') ?></div>
                        <div><?php echo $form->error($model,'tel'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'email') ?></td>
                    <td>
                        <div><?php echo $form->textField($model, 'email') ?></div>
                        <div><?php echo $form->error($model,'email'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'id_profession') ?></td>
                    <td>
                        <div>
                            <?php echo $form->dropDownList(
                                    $model, 
                                    'id_profession', 
                                    CHtml::listData(Profession::model()->findAll(), 'id', 'name')
                            ) ?>
                        </div>
                        <div><?php echo $form->error($model,'id_profession'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'favorite') ?></td>
                    <td>
                        <div><?php echo $form->textField($model, 'favorite') ?></div>
                        <div><?php echo $form->error($model,'favorite'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledFullName') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledFullName') ?></div>
                        <div><?php echo $form->error($model,'enabledFullName'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledDateOfBirth') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledDateOfBirth') ?></div>
                        <div><?php echo $form->error($model,'enabledDateOfBirth'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledAddress') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledAddress') ?></div>
                        <div><?php echo $form->error($model,'enabledAddress'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledTel') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledTel') ?></div>
                        <div><?php echo $form->error($model,'enabledTel'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledEmail') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledEmail') ?></div>
                        <div><?php echo $form->error($model,'enabledEmail'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledProfession') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledProfession') ?></div>
                        <div><?php echo $form->error($model,'enabledProfession'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'enabledFavorite') ?></td>
                    <td>
                        <div><?php echo $form->checkbox($model, 'enabledFavorite') ?></div>
                        <div><?php echo $form->error($model,'enabledFavorite'); ?></div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                            if ($model->getPrimaryKey() == Yii::app()->user->getId()) {
                                echo CHtml::submitButton(Yii::t('flexiblearn', 'Change'), array('class' => 'bt'));
                            }
                        ?>
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>