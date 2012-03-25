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
                                            'label' => Yii::t('flexiblearn', 'Home'), 
                                            'url' => array('/site/index'),
                                            'itemOptions' => array('class' => 'home-link top-navigation-link')
                                        ),
                                        array(
                                            'label' => Yii::t('flexiblearn', 'About'), 
                                            'url' => array('/site/page', 'view' => 'about'),
                                            'itemOptions' => array('class' => 'about-link top-navigation-link')
                                        ),
                                        array(
                                            'label' => Yii::t('flexiblearn', 'Contact'), 
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
                                    <a href="<?php echo $this->createUrl('account/register') ?>"><?php echo Yii::t('flexiblearn', 'Register');?></a>
                                </div>
                                <div class="link"> 
                                    <a href="<?php echo $this->createUrl('site/login') ?>"><?php echo Yii::t('flexiblearn', 'Login');?></a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="logout">
                                <div class="hi-username">    
                                    <?php echo Yii::t('flexiblearn', 'Hi');?>&nbsp;
                                    <?php echo CHtml::link(Yii::app()->user->name, $this->createUrl('account/view', array('id' => Yii::app()->user->getId())))?>
                                    <?php if (isset($this->unreadReceivedMessagesCount)) : ?>
                                        <span id="message">
                                            <a href="<?php echo $this->createUrl('message/manage')?>">
                                                <?php 
                                                    echo Yii::t('flexiblearn', '({n} message)|({n} messages)', $this->unreadReceivedMessagesCount)
                                                ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <span class="link"> 
                                    <a href="<?php echo $this->createUrl('site/logout') ?>"><?php echo Yii::t('flexiblearn', 'Logout');?></a>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <div id="search"> <?php echo Yii::t('flexiblearn', 'Search');?>|
                            <input name="" type="text" style="border: none; width:170px;"  />
                            <input name="" type="button" value="" class="bt-search"  />
                        </div>
                    </div><!--end-head-right-->
                </div><!--end-head-->
                
                <div id="menu">
                    <?php
                        $role = $this->viewer->role;
                        $menuItems = array();
                        $menuItems['0'] = array('label' => Yii::t('flexiblearn', 'Home'), 'url' => array('/site/admin'));
                        if ($role == Account::$ROLE_ADMIN) {
                            $menuItems['1'] = array('label' => Yii::t('flexiblearn', 'Language'), 'url' => array('/language/admin'));
                            $menuItems['2'] = array('label' => Yii::t('flexiblearn', 'Category'), 'url' => array('/category/admin'));
                        }
                        $menuItems['3'] = array('label' => Yii::t('flexiblearn', 'Lecture'), 'url' => array('/lecture/admin'));
                        $menuItems['4'] = array('label' => Yii::t('flexiblearn', 'Lesson'), 'url' => array('/lesson/admin'));
                        if ($role == Account::$ROLE_ADMIN) {
                            $menuItems['5'] = array('label' => Yii::t('flexiblearn', 'User'), 'url' => array('/account/admin'));
                            $menuItems['6'] = array('label' => Yii::t('flexiblearn', 'Partner'), 'url' => array('/partner/admin'));
                            $menuItems['7'] = array('label' => Yii::t('flexiblearn', 'Banner'), 'url' => array('/banner/admin'));
                            $menuItems['8'] = array('label' => Yii::t('flexiblearn', 'Document'), 'url' => array('/document/admin'));
                            $menuItems['9'] = array('label' => Yii::t('flexiblearn', 'Entry'), 'url' => array('/entry/admin'));
                        }
                        $menuItems['10'] = array('label' => Yii::t('flexiblearn', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest);
                        
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
                            <?php if (isset($this->menu)) : ?>
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
                            <?php endif; ?>
                            <div class="span-19">
                                <div id="left-content">
                                    <?php echo $content; ?>
                                </div><!-- content -->
                            </div>
                        </div>
                    </div>
                </div><!--end-content-->

                <div id="wrap-menu-bottom" >
                    <div id="bottom">&nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('site/page/view/privacy')?>">
                            <?php echo Yii::t('flexiblearn', 'Privacy Policy')?>
                        </a>
                        &nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('site/contact') ?>">
                            <?php echo Yii::t('flexiblearn', 'Contact'); ?>
                        </a>
                        &nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('site/page/view/about') ?>">
                            <?php echo Yii::t('flexiblearn', 'About'); ?>
                        </a>
                    </div>
                    <div id="bottom-l">
                        <span style="color:#666666"><?php echo Yii::t('flexiblearn', 'Follow us') ?></span> &nbsp; 
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
                        &copy; <?php echo Yii::t('flexiblearn', 'Copyright 2011 by Flexilearning. All rights reserved.') ?>
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