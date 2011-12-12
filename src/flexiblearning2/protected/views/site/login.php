<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>
    <table width="940" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2" id="link"><a href="#">Home &gt; Đăng nhập</a> 
            </td>
        </tr>
        <tr>
            <td id="bg-td">
                <table width="800" border="0" class="top" id="regis-wrap">
                    <tr>
                        <td width="398">&nbsp;</td>
                        <td width="392">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="400" border="0" cellspacing="10">
                                <tr>
                                    <td><?php echo $form->labelEx($model, 'username'); ?></td>
                                    <td>
                                        <?php echo $form->textField($model, 'username'); ?>
                                        <?php echo $form->error($model, 'username'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $form->labelEx($model, 'password'); ?></td>
                                    <td>
                                        <?php echo $form->passwordField($model, 'password'); ?>
                                        <?php echo $form->error($model, 'password'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="cell-inline">
                                        <?php echo $form->checkBox($model, 'rememberMe'); ?>
                                        <?php echo $form->label($model, 'rememberMe'); ?>
                                        <?php echo $form->error($model, 'rememberMe'); ?>
                                    </td>                                        
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <a href="../HTML/QuenMatKhau.html">
                                            <span id="style-for">Forget the password</span>
                                        </a> 
                                    </td>                                        
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <?php echo CHtml::submitButton('Login', array('class' => 'bt')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>				</td>
                        <td style="400px; vertical-align:top ;">

                            <strong>Bạn chưa có tài khoản? </strong><br />
                            <br />Đơn giản, bảo mật<br /><br />
                            Gửi nhận email cực nhanh, thể hiện tình cảm qua từng email<br />
                            Không giới hạn dung lượng lưu trữ<br /><br />
                            Đính kèm file <strong>đến 30MB</strong>, hình nền cá tính, ecard đáng yêu<br />
                            Quản lý hộp thư khác <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/iconew.gif" width="48" height="24" /><br /><br />
                            Nhận thư từ các địa chỉ khác như Gmail, Yahoo mail,... 
                            <a href="../HTML/DangKy.html"><input type="button" name="" value="Đăng ký" class="bt" /></a>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>