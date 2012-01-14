<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    $language->name => $language->href,
    $category->name => $category->href,
    $model->title,
);
?>

<table border="0" cellpadding="0" cellspacing="0" class="full">
    <tr>
        <td class="top">
            <div class="title">
                <div class="left">
                    <span class="title-text"><?php echo CHtml::encode($model->title) ?></span> 
                </div>
                <div class="right">
                    <?php 
                        if (Yii::app()->user->checkAccess('adminLecture') || Yii::app()->user->checkAccess('adminOwnLecture')) {
                            echo CHtml::link(
                                    Yii::t('zii', 'Update Lecture'), 
                                    $this->createUrl('lecture/update', array('id' => $model->getPrimaryKey())),
                                    array('class' => 'edit-link'));
                        } 
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            
            <p class="center">
                <?php $this->renderPartial('/_video_player', array('file' => $model->path_video_intro))?>
            </p>
            <div class="block-area">
                <?php echo $model->content?>
            </div>
            <div class="block-area">
                <h2><?php echo Yii::t('zii', 'Lessons')?></h2>
                <?php $lessons = $model->lessons?>
                <?php if (count($lessons) > 0) : ?>
                    <?php foreach($lessons as $lesson) : ?>
                        <div class="lesson">
                            <div>
                                <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lesson->path_video_thumbnail; ?>" 
                                 style="max-width:<?php echo Yii::app()->params['widthThumbnailLesson']?>; max-height:<?php echo Yii::app()->params['heightThumbnailLesson']?>" />
                            </div>
                            <div class="sticker">
                                <div class="price">
                                    <?php
                                        if ($lesson->price == 0) {
                                            echo Yii::t('zii', 'Free');
                                        } else {
                                            echo $lesson->price . ' ' . Yii::app()->params['moneyUnit'];
                                        }
                                    ?>
                                </div>
                            </div>
                            <a href="<?php echo $lecture->getHref()?>"><?php echo $lecture->title?></a>
                            <br />
                            <?php echo Yii::t('zii', 'Teacher') ?> : <span id="colo"><a href=""><?php echo $lecture->ownerBy->fullname?></a></span> 	  
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php echo Yii::t('zii', 'There is no video in this lecture !')?>
                <?php endif; ?>
                <?php if(Yii::app()->user->checkAccess('createLecture')) : ?>
                    <div class="block-area">
                        <?php 
                            echo CHtml::link('Create lessons', $this->createUrl('lesson/create', 
                                array('idLecture' => $model->getPrimaryKey())),
                                array('class' => 'bt link-btn'));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </td>
    </tr>
</table>