<div class="home-wrap" id="index-page">
    <table width="910" border="0" id="home-td">
        <?php foreach($categories as $category) : ?>
            <tr>
                <td colspan="<?php echo Yii::app()->params['numberOfVideoPerRowOnIndex']?>">
                    <div id="title">
                        <a href="<?php echo $category->href?>"><?php echo $category->name?></a>
                    </div>
                    <div id="line-box"> 
                        <a href="<?php echo $category->href?>">&gt;View all</a> 
                    </div>	
                </td>
            </tr>
            <?php foreach ($category->lectures as $index => $lecture) : ?>
                <?php if ($index % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) :?>
                    <tr>
                <?php endif; ?>        
                        
                <td>
                    <div class="lesson">
                        <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lesson->thumb; ?>" 
                             style='max-width:<?php echo Yii::app()->params['widthThumbnailLesson']?>; max-height:<?php echo Yii::app()->params['heightThumbnailLesson']?>' />
                        <br />
                        <a href="<?php echo $lesson->href?>"><?php echo $lesson->title?></a><br />
                        Teacher : <span id="colo"><a href=""><?php echo $lesson->createdBy->fullname?></a></span> 	  
                    </div>
                </td>
                
                <?php if (($index + 1) % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) :?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (Yii::app()->user->checkAccess('createLesson')) : ?>
                <tr>
                    <td colspan="<?php echo Yii::app()->params['numberOfVideoPerRowOnIndex']?>">
                        <div class="block-area">
                            <?php
                                echo CHtml::link('Create lessons', $this->createUrl('lesson/create', 
                                        array('idCategory' => $category->getPrimaryKey())),
                                        array('class' => 'bt link-btn'));
                            ?>
                        </div>
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