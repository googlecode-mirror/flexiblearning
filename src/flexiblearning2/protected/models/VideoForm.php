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
class VideoForm extends CFormModel {
    //put your code here
    public $id;
    public $name;
    public $description_vi;
    public $description_en;
    public $description_ko;
    public $file;
    public $lesson;
    
    public function rules() {
         return array(
            array('file', 'file'),
            array('name, file', 'required'),
            array('name', 'length', 'max' => 50),
            array('description_vi, description_en, description_ko', 'safe'),
        );
    }
}

?>
