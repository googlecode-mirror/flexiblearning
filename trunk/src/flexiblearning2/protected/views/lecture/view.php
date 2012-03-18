<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('zii', 'Lecture : ') . $model->title,
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
                                    array('class' => 'edit-link icon-control-link'));
                        } 
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            
            <p class="center">
                <?php $this->renderPartial('/_video_player', array('file' => $model->path_video_intro))?>
            </p>
            <?php if ($model->is_active == 0) : ?>
                <div class="block-area errorMessage">
                    <?php echo Yii::t('zii', 'This lecture is not active')?>
                </div>
            <?php endif;?>
            
            <div class="top">
                <div id="box-tab" class="inline-block">
                    <ul id="tab" class="tab">
                        <li class="active">
                            <a href="#description">
                                <?php echo Yii::t('zii', 'Description') ?>
                            </a>
                        </li>
                        <li> <a href="#thongbao"><?php echo Yii::t('zii', 'Annoucements') ?></a></li>                        
                    </ul>
                </div><!--end-box-tap-->

                <div id="box-tab-content" class="inline-block"> 
                    <div id="description" class="inner">            
                        <?php echo $model->content?>
                    </div>

                    <div id="thongbao" class="inner">
                        Thông báo
                    </div>
                </div><!--end-box-tab-content-->

                <div class="tab-bottom inline-block"></div>
            </div>

            <div class="block-area">
                <h2><?php echo Yii::t('zii', 'Lessons')?></h2>
                <?php $lessons = $model->lessons?>
                <?php if (count($lessons) > 0) : ?>
                    <?php foreach($lessons as $lesson) : ?>
                        <?php if (Yii::app()->user->checkAccess('adminLesson') 
                                || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $lesson))) : ?>
                            <div class="lesson">
                                <div>
                                    <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lesson->thumb; ?>" 
                                     style="width:<?php echo Yii::app()->params['widthThumbnailLesson']?>; height:<?php echo Yii::app()->params['heightThumbnailLesson']?>" />
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
                                </div>
                                <div>
                                    <a href="<?php echo $lesson->href?>" class="title">
                                        <?php echo $lesson->title?>
                                    </a>
                                    <br />
                                    <a href="<?php echo $lesson->ownerBy->href?>" class="teacher">
                                        <?php echo $lesson->ownerBy->fullname?>
                                    </a>
                                    <?php if (!$lesson->is_active) : ?>
                                        <div class="errorMessage">
                                            <?php echo Yii::t('zii', 'Not active')?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php echo Yii::t('zii', 'There is no lesson in this lecture !')?>
                <?php endif; ?>
                <?php if(Yii::app()->user->checkAccess('createLecture')) : ?>
                    <div class="block-area">
                        <?php 
                            echo CHtml::link(Yii::t('zii', 'Create lessons'), $this->createUrl('lesson/create', 
                                array('idLecture' => $model->getPrimaryKey())),
                                array('class' => 'bt link-btn'));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </td>
    </tr>
</table>