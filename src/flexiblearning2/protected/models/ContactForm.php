<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel {

    public $gender;
    public $name;
    public $email;
    //   public $subject;
    public $phone;
    public $subject;
    public $body;
    // public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, email, subject, gender, body', 'required'),
            // email has to be a valid email address
            array('email', 'email'),
            array('phone', 'safe')
                // verifyCode needs to be entered correctly
                // array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'verifyCode' => Yii::t('flexiblearn', 'Verification Code'),
            'gender' => Yii::t('flexiblearn', 'Gender'),
            'name' => Yii::t('flexiblearn', 'Name'),
            'email' => Yii::t('flexiblearn', 'Email'),
            'phone' => Yii::t('flexiblearn', 'Phone'),
            'body' => Yii::t('flexiblearn', 'Message'),
        );
    }

}