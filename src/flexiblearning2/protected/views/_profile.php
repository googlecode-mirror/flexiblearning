<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'account-form',
    'enableAjaxValidation' => false,
    'action' => $this->createUrl('account/update', array('id' => $model->getPrimaryKey()))
));
?>
<?php echo $form->errorSummary($model); ?>
<table width="750" border="0">
    <tr>
        <td width="300">
            <div class="block-area">
            <?php 
                echo Yii::t('zii', 'Role : ');
                $roles = Yii::app()->authManager->getRoles($model->getPrimaryKey());
                $keys = array_keys($roles);
                
                if (Yii::app()->user->checkAccess('adminUser')) {
                    echo CHtml::dropDownList('role', $keys[0], Yii::app()->params['roles']);
                } else {
                    echo Yii::app()->params['roles'][$keys[0]];
                }
            ?>
            </div>
            <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->getAvatarPath()?>" width="250" height="250" class="bor" />								
        </td>
        <td width="450" id="bg-td">
            <?php if ($model->getPrimaryKey() == Yii::app()->user->getId()) : ?>
                <table width="450" cellspacing="10">
                    <tr>
                        <td width="150"><?php echo Yii::t('zii', $form->label($model, 'username')) ?></td>
                        <td><strong><?php echo $model->username?></strong> </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'fullname')) ?></td>
                        <td>
                            <div><?php echo $form->textField($model, 'fullname')?></div>
                            <div><?php echo $form->error($model,'fullname'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'dateOfBirth')) ?></td>
                        <td>
                            <div>
                                <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                                        'model' => $model,
//                                        'attribute' => 'dateOfBirth',
                                        'name' => 'Account[dateOfBirth]',
                                        'options' => array(
                                            'showAnim' => 'fold',
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:20px;'
                                        ),
                                        'value' => Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"], $model->dateOfBirth),
                                        'options' => array('yearRange' => '2000:2010', 'dateFormat' => 'dd/mm/yy')
                                    ));
                                ?>
                            </div>
                            <div><?php echo $form->error($model,'dateOfBirth'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'address')) ?></td>
                        <td>
                            <div><?php echo $form->textField($model, 'address')?></div>
                            <div><?php echo $form->error($model,'address'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'id_nationality')) ?></td>
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
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'tel')) ?></td>
                        <td>
                            <div><?php echo $form->textField($model, 'tel') ?></div>
                            <div><?php echo $form->error($model,'tel'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'email')) ?></td>
                        <td>
                            <div><?php echo $form->textField($model, 'email') ?></div>
                            <div><?php echo $form->error($model,'email'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'id_profession')) ?></td>
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
                        <td><?php echo Yii::t('zii', $form->labelEx($model, 'favorite')) ?></td>
                        <td>
                            <div><?php echo $form->textField($model, 'favorite') ?></div>
                            <div><?php echo $form->error($model,'favorite'); ?></div>
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
                                    echo CHtml::submitButton(Yii::t('zii', 'Change'), array('class' => 'bt'));
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            <?php else : ?>
                <table width="450" cellspacing="10">
                    <tr>
                        <td width="150"><?php echo Yii::t('zii', $form->label($model, 'username')) ?></td>
                        <td><strong><?php echo $model->username?></strong> </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'fullname')) ?></td>
                        <td>
                            <?php echo $model->fullname?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'dateOfBirth')) ?></td>
                        <td>
                            <?php echo Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"], $model->dateOfBirth)?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'address')) ?></td>
                        <td><?php echo $model->address?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'id_nationality')) ?></td>
                        <td><?php echo ($model->nationality)?$model->nationality->name:'' ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'tel')) ?></td>
                        <td><?php echo $model->tel?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'email')) ?></td>
                        <td><?php echo $model->tel?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'id_profession')) ?></td>
                        <td><?php echo ($model->profession)?$model->profession->name:'' ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('zii', $form->label($model, 'favorite')) ?></td>
                        <td><?php echo $model->favorite?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>