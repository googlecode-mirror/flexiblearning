<!--<div class="top">
    <img src="<?php echo Yii::app()->request->baseUrl ?>/img/giaotrinh-ad1.jpg" />
</div>
<div class="top" style="padding-bottom:10px;">
    <img src="<?php echo Yii::app()->request->baseUrl ?>/img/giaotrinh-ad2.jpg" />
</div>-->

<div class="block-area">
    <?php foreach($banners as $banner) : ?>
        <div class="top">
            <a href="<?php echo $banner->banner_link?>">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $banner->ad_path ?>" width="280px" />
            </a>
        </div>
    <?php endforeach; ?>
</div>