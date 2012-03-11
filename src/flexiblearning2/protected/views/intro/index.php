<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/imageflow.packed.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/intro.css" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/imageflow.packed.js"></script>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <body>
        <div id="logo">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" />
        </div>
        <div id="flip" class="imageflow">  
            <?php foreach(Language::model()->findAll() as $lang) : ?>
                <img src="<?php echo $lang->avatar; ?>" idLanguage="<?php echo $lang->getPrimaryKey()?>"/>
            <?php endforeach; ?>
        </div>
        <div id="intro">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-gioithieu.png" /> 
            <a href="<?php echo $this->createUrl('site/page/view/about')?>"><?php echo Yii::t('default', 'About us')?></a> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-lienhe.png" /> 
            <a href="<?php echo $this->createUrl('site/contact')?>"><?php echo Yii::t('default', 'Contact us')?></a>
        </div>

        <script type="text/javascript">
            var basic_1 = new ImageFlow();
            basic_1.init({ 
                ImageFlowID: 'flip' ,
                reflections: false, 
                reflectionP: 0.0, 
                slider: false,
                imageScaling: true,
                circular: true,
                glideToStartID: false,
                imagesHeight: .9,
                xStep: 70,
                onClick : function() {
                    var idLanguage = this.getAttribute('idLanguage');
                    document.location = '<?php echo CHtml::normalizeUrl(array('/site/index')) ?>?idLanguage=' + idLanguage;
                }
            });
        </script>
    </body>
</html>