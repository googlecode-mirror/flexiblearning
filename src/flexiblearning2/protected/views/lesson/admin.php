<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Lessons') => array('index'),
    Yii::t('zii', 'Manage'),
);

$this->menu = array(
    array('label' => 'List Lesson', 'url' => array('index')),
);
?>

<h1>Manage Lessons</h1>

<br />
<div class="form-element">
    <?php echo CHtml::label('Language', ''); ?>
    <?php
        $arrDataLanguages = array($this->createUrl('lesson/admin') => '');
        $languages = Language::model()->findAll();
        foreach ($languages as $language) {
            $url = $this->createUrl('lesson/admin', array('language_id' => $language->getPrimaryKey()));
            $arrDataLanguages[$url] = $language->name;
        }
        $idLanguage = Yii::app()->request->getQuery('language_id');
        if ($idLanguage) {
            $url = $this->createUrl('lesson/admin', array('language_id' => $idLanguage));
        } else {
            $url = $this->createUrl('lesson/admin');
        }
        echo CHtml::dropDownList('language_id', $url, $arrDataLanguages);
    ?>
</div>

<br />
<div class="form-element">
    <?php echo CHtml::label('Category', ''); ?>
    <?php
        if ($idLanguage) {
            $arrDataCategories = array($this->createUrl('lesson/admin', array('language_id' => $idLanguage)) => '');
            $categories = Category::model()->findAllByAttributes(array('id_language' => $idLanguage));
        } else {
            $arrDataCategories = array($this->createUrl('lesson/admin') => '');
            $categories = Category::model()->findAll();
        }
        foreach ($categories as $category) {
            $arrParam = array();
            if ($idLanguage) {
                $arrParam['language_id'] = $idLanguage;
            }
            $arrParam['category_id'] = $category->getPrimaryKey();
            $url = $this->createUrl('lesson/admin', $arrParam);
            $arrDataCategories[$url] = $category->name;
        }
        echo CHtml::dropDownList('category_id', Yii::app()->request->getRequestUri(), $arrDataCategories);
        $idCategory = Yii::app()->request->getQuery('category_id');
    ?>
</div>

<br />

<?php
if ($idCategory) {
    $data = Lecture::model()->findAllByAttributes(array('id_category' => $idCategory));
} else {
    if ($idLanguage) {
        $criteria = new CDbCriteria();
        $criteria->join = 'JOIN category ON category.id = id_category';
        $criteria->condition = 'category.id_language = ' . $idLanguage;
        $data = Lecture::model()->findAll($criteria);
    } else {
        $data = Lecture::model()->findAll();
    }
}
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lesson-grid',
    'dataProvider' => $model->search($idCategory, $idLanguage),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'title_vi',
        'title_en',
        'title_ko',
        array(
            'name' => 'id_lecture',
            'value' => '$data->lecture->title',
            'filter' => CHtml::listData($data, 'id', 'title'),
        ),
        array(
            'name' => 'is_active',
            'filter' => array('0' => 'No', '1' => 'Yes'),
            'value' => '($data->is_active)?"Yes":"No"',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script language="javascript" type="text/javascript">
    $('#language_id').change(function() {
        window.location.href = $(this).val();
    });
    
    $('#category_id').change(function() {
        window.location.href = $(this).val();
    });
</script>