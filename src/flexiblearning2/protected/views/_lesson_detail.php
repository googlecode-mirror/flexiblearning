<div class="block-price">
    <div class="left">
        <form action="<?php echo $this->createUrl('account/buy')?>" method="post">
            <span><?php echo Yii::t('zii', 'Price : ') ?></span>
            <span class="price-text"><?php echo $model->price ?></span>
            <?php if (!$model->isBoughtBuy(Yii::app()->user->getId())) : ?>
                <input type="hidden" name="lessonId" value="<?php echo $model->getPrimaryKey()?>" />
                &nbsp; 
                <input type="submit" value="<?php echo Yii::t('zii', 'Buy Now') ?>" class="bt-muangay" border="0"/>
            <?php endif;?>
        </form>
    </div>
    <div class="right">
        <?php if (Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $model)) 
                || Yii::app()->user->checkAccess('adminLesson')) : ?>
            <a class="edit-link icon-control-link" 
               href="<?php echo $this->createUrl('lesson/update', array('id' => $model->getPrimaryKey())) ?>">
                <?php echo Yii::t('zii', 'Update lesson') ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>

<div class="top">
    <div id="box-tab">
        <ul id="tab" class="tab">
            <li class="active">
                <a href="#description">
                    <?php echo Yii::t('zii', 'Description') ?>
                </a>
            </li>
            <li> <a href="#thongbao"><?php echo Yii::t('zii', 'Annoucements') ?></a></li>
            <li><a href="#tailieu"><?php echo Yii::t('zii', 'Attachments') ?></a></li>
        </ul>
    </div><!--end-box-tap-->

    <div id="box-tab-content"> 
        <div id="description" class="inner">            
            <?php echo $model->description ?>
        </div>
        
        <div id="thongbao" class="inner">
            <?php $this->renderPartial('/_annoucement', array('lesson' => $model)); ?>
        </div>

        <div id="tailieu" class="inner">            
            <?php $this->renderPartial('/_document', array('lesson' => $model)); ?>
        </div>

    </div><!--end-box-tab-content-->

    <div class="tab-bottom"></div>
</div>

<div class="top">
    <h2><?php echo Yii::t('zii', 'Videos') ?></h2>
    <div class="block-area">
        <?php foreach ($model->videos as $video) : ?>
            <?php if($video->is_active 
                || (!$video->is_active && Yii::app()->user->checkAccess('adminVideo') || 
                Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $model)))):?>
                <div class="video">
                    <div>
                        <img src="<?php echo Yii::app()->request->baseUrl . '/' . $video->path_video_thumbnail ?>" 
                             class="bor" max-width="<?php echo Yii::app()->params['widthThumbnailVideo']?>" 
                             max-height="<?php echo Yii::app()->params['heightThumbnailVideo']?>" />
                    </div>
                    <div class="title-area">
                        <a class="title" href="<?php echo $video->getHref() ?>">
                            <?php echo $video->name ?>
                        </a>
                        <?php if (Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $model)) 
                            || Yii::app()->user->checkAccess('adminLesson')) : ?>
                            <div>
                                <a href="<?php echo $this->createUrl('video/delete', array('id' => $video->getPrimaryKey()))?>" class="delete-link icon-control-link">
                                    <?php echo Yii::t('zii', 'Delete')?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (!$video->is_active) : ?>
                            <div class="errorMessage">
                                <?php echo Yii::t('zii', 'Not Active')?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
          <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
    <?php if (Yii::app()->user->checkAccess('adminVideo') 
            || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $model))) : ?>
        <div class="block-area">
            <?php
                echo CHtml::link(Yii::t('zii', 'Create videos'), 
                        $this->createUrl('video/create', array('idLesson' => $model->getPrimaryKey())), 
                        array('class' => 'bt link-btn'));
            ?>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    jQuery('#tab').tabify();
</script>