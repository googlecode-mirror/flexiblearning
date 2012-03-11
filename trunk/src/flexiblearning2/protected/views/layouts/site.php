<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title><?php echo Yii::app()->name?></title>        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/form.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheet/tabify.css" media="screen" />
        
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
    </head>

    <body>
        <center>
            <div id="page">
                <div id="head">
                    <div id="logo"></div>
                    
                    <div id="head-mid">
                        <div id="head-mid-top"></div>

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
                                    <a href="<?php echo $this->createUrl('site/login', array('return-url' => Yii::app()->request->requestUri)) ?>">
                                        <?php echo Yii::t('zii', 'Login');?>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="logout">
                                <div class="hi-username">    
                                    <?php echo Yii::t('zii', 'Hi');?> 
                                    <?php echo CHtml::link(Yii::app()->user->name, $this->createUrl('account/view', array('id' => Yii::app()->user->getId())))?>
                                    <?php if (isset($this->unreadReceivedMessagesCount)) : ?>
                                        <span id="message">
                                            <a href="<?php echo $this->createUrl('message/manage')?>">
                                                <?php 
                                                    echo Yii::t('zii', '({n} message)|({n} messages)', $this->unreadReceivedMessagesCount)
                                                ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
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
                    <?php foreach(Language::model()->findAll() as $lang) : ?>
                        <a href="<?php echo $this->createUrl('site/switchLanguage', 
                                array('code' => $lang->code))?>" class="link-lang link-<?php echo $lang->code?>">
                            <?php echo $lang->name?>
                        </a>
                    <?php endforeach; ?>
                    
                    <div class="link_manage">
                    	<?php if (Yii::app()->user->checkAccess('viewPayment')) {
                    		echo CHtml::link('account/viewPayment', 'view payments');
                    	}?>
                        <?php if (Yii::app()->user->checkAccess('admin')) : ?>
                            <a href="<?php echo $this->createUrl('site/admin')?>"><?php echo Yii::t('zii', 'Admin Control Panel');?></a>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->checkAccess('adminOwnLesson') || 
                                (Yii::app()->user->checkAccess('adminLecture'))) : ?>
                            <a href="<?php echo $this->createUrl('lecture/admin')?>">
                                <?php echo Yii::t('zii', 'Manage lectures');?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div><!--end-menu-->

                <div id="content">
                    <!-- InstanceBeginEditable name="content" -->
                    <!-- breadcrumbs -->
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?>
                    <?php endif ?>
                    <div class="home-wrap">
                        <?php echo $content; ?>
                    </div>
                </div><!--end-content-->

                <div id="wrap-menu-bottom" >
                    <div id="bottom">&nbsp;&nbsp;
                        <a href="PrivacyPolicy.html">Privacy Policy</a>
                        &nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('/site/contact')?>">
                            <?php echo Yii::t('zii', 'Contact');?>
                        </a>
                        &nbsp;&nbsp;
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
                    	
                    </div>
                    <div id="bottom-r">Language  
                        <a href="<?php echo $this->createUrl('site/switchLanguage', 
                                array('code' => 'en'))?>" class="link-lang link-<?php echo 'en'?>">
                        
                        
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-anh.png" border="0" />
                        </a> 
                        &nbsp; 
                        <a href="<?php echo $this->createUrl('site/switchLanguage', 
                                array('code' => 'ko'))?>" class="link-lang link-<?php echo 'ko'?>">
                        
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han.png" border="0" 
                                 onmouseover="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han-over.png';" onmouseout="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-han.png';" />
								                         
                        </a> 
                        &nbsp;
                        <a href="<?php echo $this->createUrl('site/switchLanguage', 
                                array('code' => 'fr'))?>" class="link-lang link-<?php echo 'fr'?>">
                        
                        	
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap.png" border="0" 
                                 onmouseover="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap-over.png';"
                                 onmouseclick = "this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap.png';"
                                 onmouseout="this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/icon-lang-phap.png';"  />
                        </a>
                    </div>
                </div>
            </div><!--page-->
        </center>
    </body>
</html>