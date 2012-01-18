<?php
$language = $model->language;

$this->breadcrumbs = array(
    $language->name => $language->href,
    $model->name,
);
?>

<table border="0" id="home-td" >
    <tr>
        <td colspan="4" id="home-box">
            <div id="title">
                <a href="javascript:void()"><?php echo $model->name?></a>
            </div>
            <div id="line-box">
                <?php 
                if (Yii::app()->user->checkAccess('adminCategory')) {
                    echo CHtml::link(
                            Yii::t('zii', 'Update category'), 
                            $this->createUrl('category/update', array('id' => $model->getPrimaryKey())), 
                            array('class' => 'edit-link icon-control-link'));
                } 
                ?>
            </div>	
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <p class="description"><?php echo $model->description?></p>
        </td>
    </tr>
    <?php foreach ($lectures as $index => $lecture) : ?>
        <?php if ($index % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) : ?>
            <tr>
        <?php endif; ?>
                <td>
                    <div class="lesson">
                        <div>
                            <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lecture->path_video_thumbnail; ?>" 
                             style="max-width:<?php echo Yii::app()->params['widthThumbnailLesson']?>; max-height:<?php echo Yii::app()->params['heightThumbnailLesson']?>" />
                        </div>
<!--                        <div class="sticker">
                            <div class="price">
                                <?php
//                                    if ($lesson->price == 0) {
//                                        echo Yii::t('zii', 'Free');
//                                    } else {
//                                        echo $lesson->price . ' ' . Yii::app()->params['moneyUnit'];
//                                    }
                                ?>
                            </div>
                        </div>-->
                        <a href="<?php echo $lecture->getHref()?>"><?php echo $lecture->title?></a>
                        <br />
                        <?php echo Yii::t('zii', 'Teacher') ?> : 
                        <span id="colo">
                            <a href="<?php echo $lecture->ownerBy->href ?>"><?php echo $lecture->ownerBy->fullname?></a>
                        </span> 	  
                    </div>
                </td>
        <?php if (($index + 1) % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) : ?>
            </tr>
        <?php endif; ?> 
    <?php endforeach; ?>
        
    <tr>
        <td>
            <?php 
                echo '<div class="block-area">';
                if (Yii::app()->user->checkAccess('createLecture'))  {
                    echo CHtml::link('Create lectures', $this->createUrl('lecture/create', 
                        array('idCategory' => $model->getPrimaryKey())),
                        array('class' => 'bt link-btn'));
                }
                echo '</div>';
            ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<?php $this->widget('CLinkPager', array('pages' => $pages)) ?>