<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    $language->name => $language->getHref(),
    $category->name => $category->getHref(),
    $model->title,
);
?>

<table width="940" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption">
            <span id="title-text"><?php echo $model->title ?></span> 
            <br />
            <br />
            <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->thumbnail; ?>" width="627" height="382" />
            <div style="margin-top:10px;">
                <span style="font-size:13pt; color:#000000"><?php echo Yii::t('default', 'Price : ') ?></span>
                <span style="font-size:15pt; color:#ff0000"><?php echo $model->price?></span> &nbsp; 
                <input type="button" value="<?php echo Yii::t('default', 'Buy Now') ?>" class="bt-muangay" border="0"/>
            </div>

            <div style=" width:630px;"  class="top">
                <div id="box-tab">
                    <ul id="tab" class="tab">
                        <li class="active"><a href="#description"><?php echo Yii::t('default', 'Description')?></a></li>
                        <li> <a href="#thongbao"><?php echo Yii::t('default', 'Annoucements')?></a></li>
                        <li><a href="#tailieu"><?php echo Yii::t('default', 'Attachments')?></a></li>
                    </ul>
                </div><!--end-box-tap-->

                <div id="box-tab-content"> 
                    <div id="description" class="inner">
                        <h3>&nbsp;</h3>
                        <?php echo $model->description?>
                    </div>
                    <div id="thongbao" class="inner">
                        Ngày 13/11/2011<br /><br />
                        <p id="title-text">Thông Báo</p>
                        <p>V/v gặp nhau giao lưu các học viên khóa TT						</p>
                        <p>&nbsp;</p>
                        <p>Các bạn thân mến!					  
                            Facebook hiện là mạng xã hội hàng đầu trên thế giới cũng như tại Việt Nam với số lượng người dùng rất lớn và khả năng tương tác cao. Để theo kịp xu hướng chung cũng như thể theo nguyện vọng của số đông người dùng, Ban quản trị Baamboo Tra từ đã quyết định chọn Facebook làm kênh thông tin liên lạc và kết nối cộng đồng thông qua việc cho ra đời BBTT Facebook Fan page.						  </p>
                        <p>&nbsp;</p>
                        <p>Thân ái,</p>
                        <p> Ban Quản Trị.						  </p>
                        <p>&nbsp;</p>
                        <p><strong>Các thông báo khác :</strong></p>
                        <p><a href="#">Thông báo thay đổi quy định học tập (08/08/2011)</a> </p>
                        <p><a href="#">Thông báo thay đổi lịch học lớp 06EN02 (08/08/2011)</a> </p>
                        <p><a href="#">Chương trình học bổng từ Đại học Australia (08/08/2011)</a> </p>
                    </div>

                    <div id="tailieu" class="inner">
                        <p>&nbsp;</p>
                        <p><a href="#">Học tiếng Anh online.pdf</a></p>
                        <p><a href="#">1200 từ vựng cần nhất.pdf</a></p>
                        <p><a href="#">Luyện phát âm.pdf</a></p>
                        <p><a href="#">Nghe nói tiếng Anh.pdf</a></p>
                        <p><a href="#">Giáo trình TOEIC.pdf</a></p>

                    </div>

                </div><!--end-box-tab-content-->

                <div  class="tab-bottom"></div>
            </div>

            <div class="top">
                <span style="font-size:12pt; color:#000000">
                    <a href="#"><?php echo Yii::t('default', 'Videos')?></a>
                </span>
                <br />

                <table width="630px">
                    <tr>
                        <?php foreach($model->videos as $video) : ?>
                            <td class="top">
                                <div>
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/img/home-img3.jpg" class="bor" width="200" height="111" />
                                </div>
                                <div class="sticker">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/img/sticker-free.png" />
                                </div>
                                <a href="<?php echo $video->getHref()?>"><?php echo $video->name?></a><br />
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
                
                <?php if (Yii::app()->user->getId() == $model->createdBy->getPrimaryKey()) : ?>
                    <div class="block-area">
                        <?php
                            echo CHtml::link(Yii::t('default', 'Create videos'), 
                                    $this->createUrl('video/create', 
                                            array('idLesson' => $model->getPrimaryKey())), array('class' => 'bt link-btn'));
                        ?>
                    </div>
                <?php endif;?>
            </div>
        </td>

        <td style="vertical-align:top; background-color:white;">
            <div id="skype"><br />
                <a href="#"><span style="color:#fff">Nguyễn Gia Thiều</span></a>
            </div>
            <div id="skype"><br />
                <a href="#"><span style="color:#fff">Bùi Viện</span></a>
            </div>	

            <div class="top" style="width:281px; height:230px;">
                <div style="height:30px;">
                    <ul id="tab2" class="tab2">
                        <li class="active"><a href="#hoidap">Hỏi Đáp</a></li>
                        <li> <a href="#cuatoi">Của Tôi</a></li>
                    </ul>
                </div>
                <div  id="tab2-box">
                    <div id="tab2-content">
                        <div id="hoidap" class="inner">
                            <textarea name="" cols="" rows="" style=" width:250px; height:140px; border-style:none;color:#336250 ">Mời bạn đăng nhập để đăng câu hỏi và trả lời.</textarea>
                        </div>
                        <div id="cuatoi" class="inner">Load du lieu cua toi
                        </div>
                    </div>

                    <div style="width:270px; height:30px; margin-top:10px;">
                        <div style="float:left; width:100px;">&nbsp;&nbsp;<input name="" type="radio" value="group" checked="checked" />
                            EN &nbsp;<input name="" type="radio" value="group"/> 
                            VN 
                        </div>
                        <div style="float:left; width:167px; text-align:right;"><input name="" type="button"  value="Đăng câu hỏi" class="bt-cauhoi" />
                        </div>
                    </div>
                </div>
            </div><!-- last-->

            <div id="box-qa">
                <table>
                    <tr>
                        <td id="question">Q
                        </td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br />By <span id="colo">BenTq</span>  <br />
                        </td>
                    </tr>
                    <tr>
                        <td id="answer">A
                        </td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" ><div id="line"></div>
                        </td>		
                    </tr>
                    <tr>
                        <td id="question">Q</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br />By <span id="colo">BenTq</span>   <br /></td>
                    </tr>
                    <tr>
                        <td id="answer">A</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh   <br />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="top"> <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a> - <a href="#">4</a>
                            <br /></td>
                    </tr>
                </table>
            </div>
            <div class="top"><img src="<?php echo Yii::app()->request->baseUrl ?>/img/giaotrinh-ad1.jpg" /></div>
            <div class="top" style="padding-bottom:10px;"><img src="<?php echo Yii::app()->request->baseUrl ?>/img/giaotrinh-ad2.jpg" /></div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    $('#tab').tabify();
    $('#tab2').tabify();
</script>