<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LessonForm
 *
 * @author haidang
 */
class LessonForm extends CFormModel {
    //put your code here
    public $id;
    public $title_vi;
    public $title_en;
    public $title_ko;
    public $description_vi;
    public $description_en;
    public $description_ko;
    public $price;
    public $fileThumbnail;
    public $category;
    
    public function rules() {
         return array(
            array('fileThumbnail', 'file'),
            array('price, title_en', 'required'),
            array('title_vi, title_en, title_ko', 'length', 'max' => 50),
            array('price', 'length', 'max' => 10),
            array('description_vi, description_en, description_ko, title_vi, title_en, title_ko', 'safe'),
        );
    }
}

?>
