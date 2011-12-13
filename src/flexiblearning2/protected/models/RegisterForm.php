<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterForm
 *
 * @author haidang
 */
class RegisterForm extends CFormModel {

    //put your code here
    public $fullname;
    public $idNationality;
    public $dateOfBirth;
    public $address;
    public $tel;
    public $email;
    public $verifiedCode;
    public $username;
    public $password;
    public $password_repeat;
    public $idProfession;
    
    function rules() {
        return array(
            array('fullname, dateOfBirth, address, idNationality, email, username, password, idProfession', 'required'),
            array('idNationality, idProfession', 'numerical', 'integerOnly' => true),
            array('fullname, address, tel, password', 'length', 'max' => 256),
            array('email, username', 'length', 'max' => 128),                        
            array('password', 'compare'),            
            array('email', 'email'),         
            array('dateOfBirth', 'date', 'format'=>Yii::app()->params['dateFormat']),
            array('password_repeat', 'safe'),
            array('verifiedCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }
    
     /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(            
            'fullname' => 'Fullname',
            'dateOfBirth' => 'Date Of Birth',
            'address' => 'Address',
            'idNationality' => 'Nationality',
            'tel' => 'Tel',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'idProfession' => 'Id Profession',
            'favorite' => 'Favorite',            
            'idProfession' => 'Profession',
        );
    }
}

?>
