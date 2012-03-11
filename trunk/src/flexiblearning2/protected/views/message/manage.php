<?php
$this->breadcrumbs = array(
    $this->viewer->username => $this->viewer->href,
    Yii::t('zii', 'Messages'),
);
?>

<h1><?php echo Yii::t('zii', 'Messages') ?></h1>

<div class="block-area">
    <table class="table-message">
        <?php if (Yii::app()->user->hasFlash('message')): ?>
            <tr>
                <td colspan="5" style="color: #0066ff">
                    <?php echo Yii::app()->user->getFlash('message'); ?>
                </td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
        <?php endif; ?>
        <tr>
            <td colspan="4">
                <form action="<?php echo $this->createUrl('message/create')?>" class="block-area">
                    <input type="submit" name="" value="<?php echo Yii::t('zii', 'New Message')?>" class="bt" />
                </form>
            </td>
        </tr>
        
        <tr class="hopthu-bg-title">
            <td width="70" align="center" style=" height:30px">
                <input type="checkbox" name="checkbox" value="checkbox" id="checkbox-select-all"/>
            </td>
            <td width="100"><?php echo Yii::t('zii', 'From')?></td>
            <td width="500"><?php echo Yii::t('zii', 'Subject')?></td>
            <td width="100"><?php echo Yii::t('zii', 'Created Date')?></td>
            <td></td>
        </tr>

        <?php if ($pages->getItemCount() > 0) : ?>
            <?php if (Yii::app()->user->hasFlash('message')): ?>
                <tr>
                    <td colspan="5" style="color: #0066ff">
                        <?php echo Yii::app()->user->getFlash('message'); ?>
                    </td>
                </tr>
            <?php endif;?>

            <form action="<?php echo $this->createUrl('message/delete')?>" method="post">
                <?php foreach ($messages as $message) : ?>
                    <tr class="pad <?php echo (!$message->is_read)?'message-unread':''?>">
                        <td align="center">
                            <input type="checkbox" name="id[]" value="<?php echo $message->getPrimaryKey()?>" />
                        </td>
                        <td>
                            <?php echo CHtml::link($message->fromUser->username, $message->fromUser->href)?>
                        </td>
                        <td>
                            <a href="javascript:void(0)" 
                               onclick="window.open('<?php echo $message->href?>', 'message', 'width=400, height=300')">
                                <?php $purify = $this->beginWidget('CHtmlPurifier'); ?>
                                    <?php echo $purify->purify($message->displaySubject);?>
                                <?php $this->endWidget();?>
                            </a>
                        </td>
                        <td>
                            <?php echo Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"], $message->created_date)?>
                        </td>
                        <td align="center">
                            <a href="<?php echo $this->createUrl('message/delete', array('id' => $message->getPrimaryKey()))?>">
                                <?php echo Yii::t('zii', 'Delete')?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="pad-top-bot">
                        <input type="submit" name="delete" value="<?php echo Yii::t('zii', 'Delete')?>"  class="bt-no-img" />
                    </td>
                    <td colspan="2"></td>
                </tr>
            </form>
        <?php endif;?>
    </table>
</div>

<div class="block-area"><?php $this->widget('CLinkPager', array('pages' => $pages)) ?></div>
    
<script language="javascript" type="text/javascript">
    $('#checkbox-select-all').bind('click', function() {
        var checked = $(this).attr('checked');
        if (checked) {
            $('input[name=id]').prop("checked", true);
        } else {
            $('input[name=id]').prop("checked", false);   
        }
    });
</script>