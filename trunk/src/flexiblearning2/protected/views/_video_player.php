<object type="application/x-shockwave-flash"
        data="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->params['flashObjectFolder'] ?>/FLVPlayer_Progressive.swf"
        width="<?php echo Yii::app()->params['videoWidth'] ?>" 
        height="<?php echo Yii::app()->params['videoHeight'] ?>">
    <!--<![endif]-->
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="scale" value="noscale" />
    <param name="salign" value="lt" />
    <param name="FlashVars"
           value="&amp;MM_ComponentVersion=1&amp;skinName=<?php 
               echo Yii::app()->request->baseUrl . '/' . Yii::app()->params['flashObjectFolder']
                       ?>/Clear_Skin_3&amp;streamName=<?php echo Yii::app()->request->baseUrl . '/' . substr($model->path, 0, strrpos($model->path, ".")) ?>&amp;autoPlay=false&amp;autoRewind=false" />
    <param name="swfversion" value="8,0,0,0" />
    <param name="expressinstall"
           value="<?php echo Yii::app()->params['flashObjectFolder'] ?>/expressInstall.swf" />
    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
    <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p>
            <a href="http://www.adobe.com/go/getflashplayer"><img
                    src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"
                    alt="Get Adobe Flash player" />
            </a>
        </p>
    </div>
    <!--[if !IE]>-->
</object>