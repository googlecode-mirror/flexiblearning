<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class LectureForm extends CFormModel {
    
    public $name;
    public $description;
    public $price;
    public $idCategory;
    public $fileThumbnail;
    public $isNewRecord = true;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, idCategory', 'required'),
            // email has to be a valid email address
            array('price', 'numerical'),
            array('fileThumbnail', 'file', 'types' => 'jpeg, jpg, gif, png'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'idCategory' => 'Category',
        );
    }
    
//    public function init() {
//        parent::init();
//        
//        $this->setAttributes(array('enctype' => 'multipart/form-data'));
//    }
}