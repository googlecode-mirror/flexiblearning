<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/imageflow.packed.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/intro.css" media="screen" />

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/imageflow.packed.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" />
        </div>
        <div id="flip" class="imageflow">  
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-tiengnhat.png" width="174" height="473"  />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-tienghan.png" width="206" height="519" />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-tienganh.png" width="227" height="559" />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-tiengphap.png" width="206" height="519" />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-tiengtrung.png" width="174" height="479"/>
        </div>
        <div id="intro">
            <div class="languages">
                <?php foreach(Language::model()->findAll() as $lang) : ?>
                <a href="<?php echo CHtml::normalizeUrl(array('site/index', 'idLanguage' => $lang->id))?>"><?php echo $lang->name?></a>
                <?php endforeach; ?>
            </div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-gioithieu.png" /> 
            <a href=<?php echo $this->createUrl('site/page/view/about')?>>Giới thiệu</a> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/intro-lienhe.png" /> 
            <a href=<?php echo $this->createUrl('site/contact')?>> Liên hệ</a>
        </div>

        <script type="text/javascript">
            var basic_1 = new ImageFlow();
            basic_1.init({ ImageFlowID: 'flip' ,
                reflections: false, 
                reflectionP: 0.0, 
                slider: false,
                startID: 3	,
                xStep: 70,
                imagesHeight: 1,
                aspectRatio: 1.618,				
                imageScaling: true,
                imageFocusMax:3
            });
            var arrLangs = [];
            arrLangs.push({
                lang : '1',
                url : '<?php echo CHtml::normalizeUrl(array('/site/index', 'languageId' => 1)) ?>'
            });
            
            arrLangs.push({
                lang : '2',
                url : '<?php echo CHtml::normalizeUrl(array('/site/index', 'languageId' => 2)) ?>'
            });
                
            function gotoLang(lang) {
                alert(lang);
                for (var i = 0; i < arrLangs.length; i++) {
                    var la = arrLangas[i];
                    if (la.get('lang') == lang) {
                        window.location = la.get('url');
                    }
                }
            }
        </script>
    </body>
</html>