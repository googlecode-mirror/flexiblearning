<?php
    $this->breadcrumbs = array(
        $model->username => $model->href,
    );
?>

<div >
    <div id="template2-menu">			
        <ul id="menu-doc" class="menu-doc">
            <li class="active">
                <a href="#thongtincanhan"><?php echo Yii::t('zii', 'Personal information')?></a>
            </li>
            <li>
                <a href="#video"><?php echo Yii::t('zii', 'Videos')?></a>
            </li>
            <li>
                <a href="#blog"><?php echo Yii::t('zii', 'Blogs')?></a>
            </li>
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
            <div id="title-text">Blogs</div>
            <div align="right">
                <a href="BaiVietMoi.html"><input type="button" value="Bài viết mới" class="bt" /></a>
            </div>
            <div id="box-blog">
                <div id="box-blog-1">
                    <img src="../Images/blog-img0.jpg" width="150" height="150" />
                </div>
                <div id="box-blog-2">
                    <a href="../HTML/BaiVietDetail.html"><span id="blog-title">FlexiloLearn tham dự ngày Nhân sự Việt Nam 2011	</span></a><br /><br/>
                    <p>Carolyn Gregg's love affair with flowers began as a child when she spent her summers in the garden with her mother. The allure of the landscape evolved for her as an undergraduate at Middlebury College where she began </p><br />
                    <a href="../HTML/BaiVietDetail.html"><span id="style-for">Read more</span></a>							</div>
            </div><!--end-box-blog-->

            <div id="box-blog">
                <div id="box-blog-1">
                    <img src="../Images/blog-img1.jpg" width="150" height="150" />
                </div>
                <div id="box-blog-2">
                    <a href="#"><span id="blog-title">Meet the Artist - Carolyn Gregg	</span></a><br /><br/>
                    <p>Carolyn Gregg's love affair with flowers began as a child when she spent her summers in the garden with her mother. The allure of the landscape evolved for her as an undergraduate at Middlebury College where she began </p><br />
                    <a href="#"><span id="style-for">Read more</span></a>							
                </div>
            </div><!--end-box-blog-->

            <div id="box-blog">
                <div id="box-blog-1">
                    <img src="../Images/blog-img2.jpg" width="150" height="150" />
                </div>
                <div id="box-blog-2">
                    <a href="#"><span id="blog-title">Meet the Artist - Carolyn Gregg	</span></a><br /><br/>
                    <p>Carolyn Gregg's love affair with flowers began as a child when she spent her summers in the garden with her mother. The allure of the landscape evolved for her as an undergraduate at Middlebury College where she began </p><br />
                    <a href="#"><span id="style-for">Read more</span></a>							
                </div>
            </div><!--end-box-blog-->

            <div id="box-blog">
                <div id="box-blog-1">
                    <img src="../Images/blog-img3.jpg" width="150" height="150" />
                </div>
                <div id="box-blog-2">
                    <a href="#"><span id="blog-title">Meet the Artist - Carolyn Gregg	</span></a><br /><br/>
                    <p>Carolyn Gregg's love affair with flowers began as a child when she spent her summers in the garden with her mother. The allure of the landscape evolved for her as an undergraduate at Middlebury College where she began </p><br />
                    <a href="#"><span id="style-for">Read more</span></a>							
                </div>
            </div><!--end-box-blog-->
            <div class="pad-top-bot"><a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a> - <a href="#">4</a></div>

        </div><!--end-blog-->
    </div>
</div>

<script type="text/javascript">
    $('#menu-doc').tabify();
    <?php if (isset($section)) : ?>
        
    <?php endif;?>
</script>