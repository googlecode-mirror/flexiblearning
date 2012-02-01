<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    $language->name => $language->href,
    $category->name => $category->href,
    $lecture->title => $lecture->href,
    $model->title,
);
?>

<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption">
            <div class="title">
                <span class="title-text"><?php echo $model->title ?></span> 
            </div>

            <p class="center">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->thumb; ?>" class="lesson-view" />
            </p>

            <?php $this->renderPartial('/_lesson_detail', array('model' => $model)); ?>
        </td>

        <td style="vertical-align:top; background-color:white;">            
            <?php $this->renderPartial('/_skype'); ?>
            <div id="qa_area">
                <?php $this->renderPartial('/_qa', array('lesson' => $model)); ?>
            </div>
            <?php $this->renderPartial('/_ad'); ?>
        </td>
    </tr>
</table>
<script type="text/javascript" language="javascript">
    $('#question-form').submit(function() {
        
        var action = $(this).attr('action');
        var data = $(this).serialize();        
        $.post(action, data, function(data) {
            if (data != '-1') {
                $('#qa_area').html(data);
            } else {
                alert('<?php echo Yii::t('zii', 'There is an error occured ! Please try again !') ?>');
            }
        });
        return false;
    });
    
    $('form.frm-answer').submit(function() {
        var action = $(this).attr('action');
        var data = $(this).serialize();
        $.post(action, data, function(data) {
            if (data != '-1') {
                $('#qa_area').html(data);
            } else {
                alert('<?php echo Yii::t('zii', 'There is an error occured ! Please try again !') ?>');
            }
        });
        return false;
    });
</script>