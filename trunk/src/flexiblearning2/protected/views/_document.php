<ul id="list-documents">
    <?php foreach ($lesson->documents as $document) : ?>
        <li>
            <a href="<?php echo Yii::app()->request->baseUrl . '/' . $document->document_path?>"><?php echo $document->subject?></a>
            <?php 
                echo CHtml::link(
                    Yii::t('flexiblearn', '(View description)'), 
                    '', 
                    array('onclick' => "jQuery('#document-description-{$document->getPrimaryKey()}').toggle()"));
            ?>
            <?php if (Yii::app()->user->checkAccess('adminLesson')
                || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $lesson))) : ?>                
                <?php 
                    echo CHtml::link(
                            Yii::t('flexiblearn', '(Delete)'), 
                            '', 
                            array('onclick' => "deleteDocument({$document->getPrimaryKey()}, this)"))
                ?>
            <?php endif; ?>
            <p id="document-description-<?php echo $document->getPrimaryKey()?>" 
                 class="document-description" style="display:none">
                <?php echo $document->description?>
            </p>
        </li>
    <?php endforeach; ?>
    <li>
        <?php if (Yii::app()->user->checkAccess('adminLesson')
            || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $lesson))) : ?>
            <div class="block-area">
                <?php echo CHtml::link('Create new attachment', "",  // the link for open the dialog
                    array(
                        'style'=>'cursor: pointer;',
                        'onclick'=>"{jQuery('#dlgDocument').dialog('open');}"));
                ?>
            </div>
            <?php
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'dlgDocument',
                'options' => array(
                    'title' => Yii::t('flexiblearn', 'Create new attachment'),
                    'autoOpen' => false,
                    'modal' => true,         
                    'width' => 410,
                    'height' => 550
                ),
            ));
            ?>
                <div class="divForForm">
                    <iframe src="<?php echo $this->createUrl('document/create', array('id_lesson' => $lesson->getPrimaryKey()))?>"
                            width="380px" height="500px">
                    </iframe>
                </div>
            <?php $this->endWidget();?>
        <?php endif; ?>
    </li>        
</ul>

<script language="javascript" type="text/javascript">
    function deleteDocument(documentId, element) {
        if(confirm('<?php echo Yii::t('flexiblearn', 'Are you sure you want to delete this document ?')?>')) {
            jQuery.post(
                '<?php echo $this->createUrl('document/delete', array('format' => 'json'))?>', 
                {id:documentId}, 
                function(data) {                    
                    if (data.result == '1') {                        
                        var parent = jQuery(element).parent('li');
                        if (parent) {
                            jQuery(parent).remove();
                        }
                    }
                }, 'json');
        }
    }    
</script>