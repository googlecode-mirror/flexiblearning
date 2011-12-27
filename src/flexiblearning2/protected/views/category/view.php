<?php
$language = $model->language;

$this->breadcrumbs = array(
    $language->name => $language->getHref(),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Update Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Category', 'url' => array('admin')),
    array('label' => 'Create Lesson', 'url' => array(
            'lesson/create',
            'idCategory' => $model->id,
            'idLanguage' => $model->language->id)),
);
?>

<table width="910" border="0" id="home-td" >
    <tr>
        <td colspan="4" id="home-box">
            <div id="title">
                <a href="javascript:void()"><?php echo $model->name?></a>
            </div>
            <div id="line-box"></div>	
        </td>
    </tr>
    <?php foreach ($model->lessons as $index => $lesson) : ?>
        <?php if ($index % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) : ?>
            <tr>
        <?php endif; ?>
                <td>
                    <img class="lesson-thumbnail" src="<?php echo Yii::app()->request->baseUrl . '/' . $lesson->getThumbnail(); ?>" 
                         style="max-width:<?php echo Yii::app()->params['widthThumbnailLesson']?>; max-height:<?php echo Yii::app()->params['heightThumbnailLesson']?>" />
                    <br />
                    <a href="<?php echo $lesson->getHref()?>"><?php echo $lesson->title?></a>
                    <br />
                    Teacher : <span id="colo"><a href=""><?php echo $lesson->createdBy->fullname?></a></span> 	  
                </td>
        <?php if (($index + 1) % Yii::app()->params['numberOfVideoPerRowOnIndex'] == 0) : ?>
            </tr>
        <?php endif; ?> 
    <?php endforeach; ?>
        
    <tr>
        <td>
            <?php 
                echo '<div class="block-area">';
                if (Yii::app()->user->checkAccess('createLesson'))  {
                    echo CHtml::link('Create lessons', $this->createUrl('lesson/create', 
                        array('idCategory' => $model->getPrimaryKey())),
                        array('class' => 'bt link-btn'));
                }
                echo '</div>';
            ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>



