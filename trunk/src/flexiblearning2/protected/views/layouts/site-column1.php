<?php $this->beginContent('//layouts/site'); ?>
<div class="container">
    <div id="content">
        <div class="block">
            <?php
            $this->beginWidget('zii.widgets.CPortlet');
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div>
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>