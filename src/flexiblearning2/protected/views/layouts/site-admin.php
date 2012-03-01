<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title><?php echo Yii::app()->name?></title>        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/style.css" media="screen" />            
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/form.css" media="screen" />            
        
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    </head>

    <body>
        <center>
            <div id="page">
                <div id="head">
                    <div id="logo">
                    </div>
                    <div id="head-mid">
                        <div id="head-mid-top">
                        </div>

                        <div id="wrap-nav">
                            <ul id="nav">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array(
                                            'label' => Yii::t('zii', 'Home'), 
                                            'url' => array('/site/index'),
                                            'itemOptions' => array('class' => 'home-link top-navigation-link')
                                        ),
                                        array(
                                            'label' => Yii::t('zii', 'About'), 
                                            'url' => array('/site/page', 'view' => 'about'),
                                            'itemOptions' => array('class' => 'about-link top-navigation-link')
                                        ),
                                        array(
                                            'label' => Yii::t('zii', 'Contact'), 
                                            'url' => array('/site/contact'),
                                            'itemOptions' => array('class' => 'contact-link top-navigation-link'),
                                        ),
                                    ),
                                ));
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!--end-head-mid-->

                    <div id="head-right">                        
                        <?php if (Yii::app()->user->isGuest) : ?>
                            <div id="login">
                                <div class="link">
                                    <a href="<?php echo $this->createUrl('account/register') ?>"><?php echo Yii::t('zii', 'Register');?></a>
                                </div>
                                <div class="link"> 
                                    <a href="<?php echo $this->createUrl('site/login') ?>"><?php echo Yii::t('zii', 'Login');?></a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="logout">
                                <div class="hi-username">    
                                    <?php echo Yii::t('zii', 'Hi');?> <?php echo Yii::app()->user->name?>                                
                                </div>
                                <span class="link"> 
                                    <a href="<?php echo $this->createUrl('site/logout') ?>"><?php echo Yii::t('zii', 'Logout');?></a>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <div id="search"> <?php echo Yii::t('zii', 'Search');?>|
                            <input name="" type="text" style="border: none; width:170px;"  />
                            <input name="" type="button" value="" class="bt-search"  />
                        </div>
                    </div><!--end-head-right-->
                </div><!--end-head-->
                
                <div id="menu">
                    <?php
                        $menuItems = array(
                            array('label' => Yii::t('zii', 'Home'), 'url' => array('/site/admin')),
                            array('label' => Yii::t('zii', 'Language'), 'url' => array('/language/admin')),
                            array('label' => Yii::t('zii', 'Category'), 'url' => array('/category/admin')),
                            array('label' => Yii::t('zii', 'Lecture'), 'url' => array('/lecture/admin')),
                            array('label' => Yii::t('zii', 'Lesson'), 'url' => array('/lesson/admin')),
                            array('label' => Yii::t('zii', 'User'), 'url' => array('/account/admin')),
                            array('label' => Yii::t('zii', 'Partner'), 'url' => array('/partner/admin')),
                            array('label' => Yii::t('zii', 'Banner'), 'url' => array('/banner/admin')),
                            array('label' => Yii::t('zii', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        );
                        if ($this->activeMenuItemIndex != -1) {
                            $menuItems[$this->activeMenuItemIndex]['active'] = true;
                        }
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => $menuItems,
                        ));
                    ?>
                </div>
                
                <div id="content">
                    <!-- InstanceBeginEditable name="content" -->
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                    <div class="home-wrap">
                        <div class="container">
                            <div class="span-19">
                                <div id="left-content">
                                    <?php echo $content; ?>
                                </div><!-- content -->
                            </div>
                            <div class="span-5 last">
                                <div id="sidebar">
                                    <?php
                                    $this->beginWidget('zii.widgets.CPortlet', array(
                                        'title' => 'Operations',
                                    ));
                                    $this->widget('zii.widgets.CMenu', array(
                                        'items' => $this->menu,
                                        'htmlOptions' => array('class' => 'operations'),
                                    ));
                                    $this->endWidget();
                                    ?>
                                </div><!-- sidebar -->
                            </div>
                        </div>
                    </div>
                </div><!--end-content-->

                <div id="wrap-menu-bottom" >
                    <div id="bottom">&nbsp;&nbsp;
                        <a href="PrivacyPolicy.html">Privacy Policy</a> &nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('/site/contact')?>"><?php echo Yii::t('zii', 'Contact');?></a>  &nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('/site/page/view/about')?>"><?php echo Yii::t('zii', 'About');?></a>		
                    </div>
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
                    	<?php echo Yii::app()->language;?>
                    </div>
                    <div id="bottom-r">Language  
                        <a href="<?php echo $this->createUrl('')?>">
s                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-anh.png" border="0" />
                        </a> 
                        &nbsp; 
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>">
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
</html>