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

    public static function phoneNumberValidation($value)
    {
        if (!preg_match("/^9[78]\d{8}$/", $value)) {
            self::$errors['phone'] = "*Invalid Nepali phone number format.";
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
