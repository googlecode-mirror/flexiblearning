<?php
    $this->breadcrumbs = array(
        $model->username => $model->href,        
    );
?>

<div >
    <div id="template2-menu">			
        <ul id="menu-doc" class="menu-doc">
            <li class="active"><a href="#thongtincanhan"><?php echo Yii::t('zii', 'Personal Information')?></a></li>
            <li><a href="#video"><?php echo Yii::t('zii', 'Videos')?></a></li>
            <li><a href="#blog"><?php echo Yii::t('zii', 'Blogs')?></a></li>
        </ul>				
    </div>

    <div id="template2-content">
        <div id="thongtincanhan" class="inner">
            <?php
                $this->renderPartial('/_profile', array('model' => $model));
            ?>
        </div><!--end-#thongtincanhan-->

        <div id="video" class="inner">
            <table width="750" border="0">
                <tr>
                    <td id="title-text"><?php echo Yii::t('zii', 'Videos : ')?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="top"><img src="../Images/baigiang-img1.jpg"/><br />
                        <a href="GiaoTrinh.html">Tiếng anh sơ cấp 1</a><br />
                        20/11/2011<br />
                        <input name="" type="button" value="10$" class="bt-price" border="0"/>
                    </td>
                    <td class="top"><img src="../Images/baigiang-img2.jpg"/><br />
                        <a href="GiaoTrinh.html">Tiếng anh sơ cấp 1</a><br />
                        20/11/2011<br />
                        <input name="" type="button" value="10$" class="bt-price" border="0"/>
                    </td>
                    <td class="top"><img src="../Images/baigiang-img3.jpg"/><br />
                        <a href="GiaoTrinh.html">Tiếng anh sơ cấp 1</a><br />
                        20/11/2011<br />
                        <input name="" type="button" value="10$" class="bt-price" border="0"/>
                    </td>
                </tr>
                <tr>
                    <td class="top"><img src="../Images/baigiang-img3.jpg"/><br />
                        <a href="#">Tiếng anh sơ cấp 1</a><br />
                        20/11/2011<br />
                        <input name="" type="button" value="10$" class="bt-price" border="0"/>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div><!--end-#videodahoc-->

        <div id="blog" class="inner">
            <div id="title-text">
                <div class="left block">
                    <?php echo Yii::t('zii', 'Blogs')?>
                </div>
                <div class="right block">
                    <?php
                        if ($model->getPrimaryKey() == Yii::app()->user->getId()) {
                            echo CHtml::link(Yii::t('zii', 'Manage blogs'), $this->createUrl('entry/manage'));
                        }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div align="right">
                <form action="<?php echo $this->createUrl('entry/create')?>">
                    <?php echo CHtml::submitButton(Yii::t('zii', 'New entry'), array('class' => 'bt'))?>
                </form>
            </div>            
            
            <?php foreach($entries as $entry) : ?>
                <div class="box-blog">
                    <div class="box-blog-1">
                        <img src="<?php echo Yii::app()->request->baseUrl . '/' . $entry->thumbnailPath?>" width="150" height="150" />
                    </div>
                    <div class="box-blog-2">
                        <a href="<?php echo $entry->href?>">
                            <span class="blog-title"><?php echo $entry->title?></span>
                        </a>
                        <p>
                            <?php
                                $helper = new CString();
                                echo $helper->truncate(strip_tags($entry->content), Yii::app()->params['blogTeaserLength']);
                            ?>
                        </p>
                        <a href="<?php echo $this->createUrl('entry/view', array('id' => $entry->getPrimaryKey()))?>"><span id="style-for"><?php echo Yii::t('zii', 'Read more');?></span></a>							</div>
                </div><!--end-box-blog-->
            <?php endforeach; ?>

<!--            <div class="pad-top-bot">
                <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a> - <a href="#">4</a>                
            </div>-->
            <?php 
                $this->widget('CLinkPager', array('pages' => $pages)) 
            ?>
        </div><!--end-blog-->
    </div>
</div>

<script type="text/javascript">
    $('#menu-doc').tabify();
</script>