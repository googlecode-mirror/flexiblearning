<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>FlexiLearning</title>        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/style.css" media="screen" />            
    </head>

    <body>
        <center>
            <div id="page">
                <div id="head">
                    <div id="logo">
                    </div>
                    <div id="head-mid">
                        <div id="head-mid-top">
                            <ul id="icon">
                                <li><a><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-trangchu.png" /></a></li>
                                <li><a><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-gioithieu.png" /></a></li>
                                <li><a><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lienhe.png" /></a></li>
                            </ul>
                        </div>

                        <div id="wrap-nav">
                            <ul id="nav">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Home', 'url' => array('/site/index')),
                                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                        array('label' => 'Contact', 'url' => array('/site/contact')),                                        
                                    ),
                                ));
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!--end-head-mid-->

                    <div id="head-right">
                        <div id="login">
                            <a href="#">Register</a> &nbsp;&nbsp;&nbsp;
                            <a href="DangNhap.html">Login</a>
                        </div>
                        <div id="search"> Search |
                            <input name="" type="text" style="border: none; width:170px;"  /><input name="" type="button" value="" class="bt-search"  />
                        </div>
                    </div><!--end-head-right-->
                </div><!--end-head-->

                <div id="menu">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/menu-icon-anh.png" />
                    <a href="" style="color:#FFFFFF">  English</a> &nbsp; &nbsp; &nbsp; &nbsp; 
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/menu-icon-han.png" />
                    <a href="" style="color:#FFFFFF">  Korean</a> &nbsp; &nbsp; &nbsp; &nbsp; 
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/menu-icon-phap.png" />
                    <a href="" style="color:#FFFFFF">  French</a> 
                </div><!--end-menu-->

                <div id="content"><!-- InstanceBeginEditable name="content" -->
                    <?php echo $content;?>
                </div><!--end-content-->

                <div id="wrap-menu-bottom" >
                    <div id="bottom">&nbsp;&nbsp;
                        <a href="PrivacyPolicy.html">Privacy Policy</a> &nbsp;&nbsp;
                        <a href="LienHe.html">Contact</a>  &nbsp;&nbsp;
                        <a href="GioiThieu.html">About us</a>		</div>
                    <div id="bottom-l">
                        <span style="color:#666666">Flow us</span> &nbsp; 
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-facebook.jpg" width="65" height="23" border="0"  />
                        </a> 
                        &nbsp; 
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-twiter.jpg" border="0" />
                        </a>
                    </div>
                </div><!--end-wrap-menu-bottom-->

                <div>
                    <div id="bottom-l2">
                        &nbsp;&nbsp; Copy right 2011 by Flexilearning. All rights reserved
                    </div>
                    <div id="bottom-r">Language  
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-anh.png" border="0" />
                        </a> 
                        &nbsp; 
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han.png" border="0" 
                                 onmouseover="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han-over.png';" onmouseout="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han.png';" />
                        </a> 
                        &nbsp;
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap.png" border="0" 
                                 onmouseover="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap-over.png';"
                                 onmouseout="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap.png';"  />
                        </a>
                    </div>
                </div>
            </div><!--page-->

        </center>
    </body>

    <!-- InstanceEnd --></html>
