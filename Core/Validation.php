<?php

namespace Core;

class Validation
{
    protected static $errors = [];

    public static function emailValidation($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$errors['email'] = "*Invalid email format.";
        }
    }

    public static function nameValidation($value)
    {
        if (!preg_match("/^[a-zA-Z' -]+$/", $value)) {
            self::$errors['fname'] = "*Only letters, apostrophes, dashes, and white space allowed in name.";
        }
    }

    public static function addressValidation($value)
    {
        if (!is_null($value)) {
            self::$errors['address'] = "*Full address is required.";
        }
    }

    public static function phoneNumberValidation($value)
    {
        if (!preg_match("/^9[78]\d{8}$/", $value)) {
            self::$errors['phone'] = "*Invalid Nepali phone number.";
        }
    }

    public static function passwordValidation($value)
    {
        if(strlen($value)<=7){
            self::$errors['password'] = "*Password must be at least 8 characters long";
        }
        // else if (!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]$/", $value)) {
        //     self::$errors['password'] = "*Must include at least one letter, one number, and one special character.";
        // }
    }

    public static function confirmPasswordValidation($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            self::$errors['confirmPassword'] = "*Passwords do not match.";
        }
    }

    public static function dateOfAppointmentValidation($date)
    {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < time()) {
            self::$errors['doa'] = "*Invalid date of appointment. The date must be in the future.";
        }
    }

    public static function dateOfBirthValidation($date)
    {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) >= time()) {
            self::$errors['dob'] = "*Invalid date of birth. The date must be in the past.";
        }
    }
    public static function genderValidation($gender)
    {
        $genderOptions=["Male", "Female", "Other"];
        if ($gender===NULL) {
            self::$errors['gender'] = "*All human beings have a gender.";
        }
        elseif(in_array($gender, $genderOptions)){
            self::$errors['gender'] = "*Invalid gender, Gender must be either Male, Female or Other";
        }
    }
    public static function martialStatusValidate($martialStatus){
        $martialArray=["Single", "Married", "Divorced"];
        // dd($martialStatus);
        if($martialStatus==NULL){
            self::$errors['martialStatus']="*Invalid input, please select a valid input form the options.";
        }
        elseif(in_array($martialStatus, $martialArray)){
            self::$errors['martialStatus']="*Invalid input, please select a valid input form the options.";
        }
    }
    public static function emergencyNameValidation($value)
    {
        if (!preg_match("/^[a-zA-Z' -]+$/", $value)) {
            self::$errors['emergencyName'] = "*Only letters, apostrophes, dashes, and white space allowed in name.";
        }
    }
    public static function emergencyPhoneValidation($value)
    {
        if (!preg_match("/^9[78]\d{8}$/", $value)) {
            self::$errors['emergencyPhone'] = "*Invalid Nepali phone number.";
        }
    }

    public static function photoFileValidation($file)
    {
        $allowedMimeTypes = ['image/jpeg','image/jpg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedMimeTypes)) {
            self::$errors['file'][] = "*Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
        if ($file['size'] > 5000000) { // 5MB limit
            self::$errors['file'][] = "*File size should not exceed 5MB.";
        }
    }

    public static function getErrors()
    {
        return self::$errors;
    }
}
