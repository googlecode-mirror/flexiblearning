<div class="block-area" style="height:270px">
    <?php
    $notifications = $model->notifications;
    if (!empty($notifications) && is_array($notifications)) {
        //$panels = CHtml::listData($notifications, 'titleAndDate', 'content');
        $panels = array();
        foreach($notifications as $i => $notification) {
            $index = $i + 1;
            $panels["$index. $notification->titleAndDate"] = $notification->content;
        }
        $this->widget('zii.widgets.jui.CJuiAccordion', array(
            'panels' => $panels,
            'options' => array(
                'animated' => 'bounceslide',
                'fillSpace' => true
            ),
        ));
    }
    ?>
</div>
<div class="block-area">
    <?php if ($model instanceof Lecture) : ?>
        <?php if (Yii::app()->user->checkAccess('adminLecture') ||
                Yii::app()->user->checkAccess('adminOwnLecture', array('lecture' => $model))) : ?>
            <?php
                echo CHtml::link(Yii::t('flexiblearn', 'Create new notification'), '', array('onclick' => "{jQuery('#dlgNotification').dialog('open');}"));
                $url = $this->createUrl('notificationLecture/create', array('id_lecture' => $model->getPrimaryKey()));
            ?>
        <?php endif; ?>
    <?php elseif ($model instanceof Lesson) : ?>
        <?php if (Yii::app()->user->checkAccess('adminLesson') ||
                Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $model))) : ?>
            <?php
                echo CHtml::link(Yii::t('flexiblearn', 'Create new notification'), '', array('onclick' => "{jQuery('#dlgNotification').dialog('open');}"));
                $url = $this->createUrl('notification/create', array('id_lesson' => $model->getPrimaryKey()));
            ?>      
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php  if (isset($url)) : ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlgNotification',
    'options' => array(
        'title' => Yii::t('flexiblearn', 'Create notification'),
        'autoOpen' => false,
        'modal' => true,
        'width' => 510,
        'height' => 600
    ),
));
?>
    <div class="divForForm">
        <iframe src="<?php echo $url?>" width="470px" height="730px">
        </iframe>
    </div>
<?php $this->endWidget(); ?>
<?php endif; ?>