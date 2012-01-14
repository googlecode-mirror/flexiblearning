<div class="block-price">
    <div class="left">
        <span><?php echo Yii::t('zii', 'Price : ') ?></span>
        <span><?php echo $model->price ?></span> &nbsp; 
        <input type="button" value="<?php echo Yii::t('zii', 'Buy Now') ?>" class="bt-muangay" border="0"/>
    </div>
    <div class="right">
        <?php if (Yii::app()->user->checkAccess('adminOwnLesson') || Yii::app()->user->checkAccess('adminLesson')) : ?>
            <a class="edit-link" href="<?php echo $this->createUrl('lesson/update', array('id' => $model->getPrimaryKey())) ?>">
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
                    <?php echo Yii::t('default', 'Description') ?>
                </a>
            </li>
            <li> <a href="#thongbao"><?php echo Yii::t('default', 'Annoucements') ?></a></li>
            <li><a href="#tailieu"><?php echo Yii::t('default', 'Attachments') ?></a></li>
        </ul>
    </div><!--end-box-tap-->

    <div id="box-tab-content"> 
        <div id="description" class="inner">
            <h3>&nbsp;</h3>
            <?php echo $model->description ?>
        </div>
        <div id="thongbao" class="inner">
            Ngày 13/11/2011<br /><br />
            <p id="title-text">Thông Báo</p>
            <p>V/v gặp nhau giao lưu các học viên khóa TT						</p>
            <p>&nbsp;</p>
            <p>Các bạn thân mến!					  
                Facebook hiện là mạng xã hội hàng đầu trên thế giới cũng như tại Việt Nam với số lượng người dùng rất lớn và khả năng tương tác cao. Để theo kịp xu hướng chung cũng như thể theo nguyện vọng của số đông người dùng, Ban quản trị Baamboo Tra từ đã quyết định chọn Facebook làm kênh thông tin liên lạc và kết nối cộng đồng thông qua việc cho ra đời BBTT Facebook Fan page.						  </p>
            <p>&nbsp;</p>
            <p>Thân ái,</p>
            <p> Ban Quản Trị.						  </p>
            <p>&nbsp;</p>
            <p><strong>Các thông báo khác :</strong></p>
            <p><a href="#">Thông báo thay đổi quy định học tập (08/08/2011)</a> </p>
            <p><a href="#">Thông báo thay đổi lịch học lớp 06EN02 (08/08/2011)</a> </p>
            <p><a href="#">Chương trình học bổng từ Đại học Australia (08/08/2011)</a> </p>
        </div>

        <div id="tailieu" class="inner">
            <p>&nbsp;</p>
            <p><a href="#">Học tiếng Anh online.pdf</a></p>
            <p><a href="#">1200 từ vựng cần nhất.pdf</a></p>
            <p><a href="#">Luyện phát âm.pdf</a></p>
            <p><a href="#">Nghe nói tiếng Anh.pdf</a></p>
            <p><a href="#">Giáo trình TOEIC.pdf</a></p>

        </div>

    </div><!--end-box-tab-content-->

    <div  class="tab-bottom"></div>
</div>

<div class="top">
    <span style="font-size:12pt; color:#000000">
        <a href="#"><?php echo Yii::t('zii', 'Videos') ?></a>
    </span>
    <br />

    <table width="630px">
        <tr>
            <?php foreach ($model->videos as $video) : ?>
                <td class="top">
                    <div>
                        <img src="<?php echo Yii::app()->request->baseUrl . '/' . $video->path_video_thumbnail ?>" 
                             class="bor" width="<?php echo Yii::app()->params['widthThumbnailLesson']?>" 
                             height="<?php echo Yii::app()->params['heightThumbnailLesson']?>" />
                    </div>
                    <a href="<?php echo $video->getHref() ?>"><?php echo $video->name ?></a><br />
                </td>
            <?php endforeach; ?>
        </tr>
    </table>

    <?php if (Yii::app()->user->getId() == $model->createdBy->getPrimaryKey()) : ?>
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
    $('#tab').tabify();
</script>