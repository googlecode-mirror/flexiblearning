<div class="home-wrap" id="index-page">
    <table width="910" border="0" id="home-td">
        <?php foreach($categories as $category) : ?>
            <tr>
                <td colspan="4">
                    <div id="title">
                        <a href="<?php echo $category->getHref()?>"><?php echo $category->name?></a>
                    </div>
                    <div id="line-box"> 
                        <a href="<?php echo $category->getHref()?>">&gt;View all</a> 
                    </div>	
                </td>
            </tr>
            <?php foreach ($category->lessons as $index => $lesson) : ?>
                <?php if ($index % 4 == 0) :?>
                    <tr>
                <?php endif; ?>        
                        
                <td>
                    <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lesson->thumbnail; ?>" 
                         width="<?php echo Yii::app()->params['widthThumbnailLesson']?>" 
                         height="<?php echo Yii::app()->params['heightThumbnailLesson']?>" /> <br />
                    <a href="#"><?php echo $lesson->title?></a><br />
                    Teach: <span id="colo">Sara Corner</span> 	  
                </td>
                
                <?php if ($index % 4 == 0) :?>
                    </tr>
                <?php endif; ?>
                    
            <?php endforeach; ?>
            <?php if (Yii::app()->user->checkAccess('createLecture')) : ?>
                <tr>
                    <td colspan="4">
                    <?php
                        echo CHtml::link('Create lessons', $this->createUrl('lesson/create', 
                                array('idCategory' => $category->getPrimaryKey())));
                    ?>
                    </td>
                </tr>
            <?php endif; ?>        
        <?php endforeach; ?>
        <tr>
            <td>&nbsp;</td>
        </tr> 
    </table>
</div>
<!-- InstanceEndEditable -->
<div id="stroke" ></div>