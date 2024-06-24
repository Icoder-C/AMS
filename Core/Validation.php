<?php

namespace Core;
use DateTime;

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
            self::$errors['fname'] = "*Only letters, apostrophes, dashes, and white space allowed.";
        }
    }

    public static function addressValidation($value)
    {
        if (!$value) {
            self::$errors['address'] = "*Address is required.";
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
        else if (!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]$/", $value)) {
            self::$errors['password'] = "*Must include at least one letter, one number, and one special character.";
        }
    }

    public static function confirmPasswordValidation($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            self::$errors['confirmPassword'] = "*Passwords do not match.";
        }
    }

    public static function dateOfAppointmentValidation($date)
    {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) <= time()) {
            self::$errors['doa'] = "*Invalid date of appointment. The date cannot be of past.";
        } 
    }

    public static function startDateValidation($date){
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < time()) {
            self::$errors['startDate'] = "*Invalid start date. The date cannot be of past.";
        }
    }

    public static function endDateValidation($startDate,$endDate){
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $endDate) || strtotime($endDate) < time() || isDateGreater($startDate, $endDate)) {
            self::$errors['endDate'] = "*Invalid end date. The date must be greater than the start date.";
        }
    }

    public static function longTextValidation($text){
        if($text==NULL){
            self::$errors['longText']="*Reason for leave is required.";
        }
        else if(strlen($text)>100){
            self::$errors['longText']="*Reason for leave is too long. Max characters allowed is 100.";
        }
    }

    public static function leaveValidation($leave)
    {
        $types = [
            'annual_leave',
            'casual_leave',
            'sick_leave',
            'wedding_leave',
            'mourn_leave',
            'paternity_leave',
            'ethnic_leave',
            'exam_leave',
            'maternity_leave'
        ];;
        if ($leave===NULL) {
            self::$errors['type'] = "*Please select a leave type.";
        }
        elseif(!in_array($leave, $types)){
            self::$errors['type'] = "*Invalid leave type, select one from the options provided";
        }
    }

    public static function dateOfBirthValidation($date)
    {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) >= time()) {
            self::$errors['dob'] = "*Invalid date of birth. The date must be in the past.";
        }
        $dob = new DateTime($date);
        $today = new DateTime();
    
        // Calculate the age
        $age = $today->diff($dob)->y;
    
        // Check if the age is less than 18
        if ($age < 18) {
            self::$errors['dob'] = "*Invalid date of birth. Employee must be 18 years or older.";
            return false;
        }
    }
    public static function genderValidation($gender)
    {
        $genderOptions=["Male", "Female", "Other"];
        if ($gender===NULL) {
            self::$errors['gender'] = "*All human beings have a gender.";
        }
        elseif(!in_array($gender, $genderOptions)){
            self::$errors['gender'] = "*Invalid gender, Gender must be either Male, Female or Other";
        }
    }
    public static function martialStatusValidate($martialStatus){
        $martialArray=["Single", "Married", "Divorced"];
        // dd($martialStatus);
        if($martialStatus==NULL){
            self::$errors['martialStatus']="*Please select an option.";
        }
        elseif(!in_array($martialStatus, $martialArray)){
            self::$errors['martialStatus']="*Invalid input, please select a valid input form the options.";
        }
    }
    public static function emergencyNameValidation($value)
    {
        if (!preg_match("/^[a-zA-Z' -]+$/", $value)) {
            self::$errors['emergencyName'] = "*Only letters, apostrophes, dashes, and white space allowed.";
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
        if($file["error"]===4){
            self::$errors['file']="*Please upload your photo.";
        }
        else if (!in_array($file['type'], $allowedMimeTypes)) {
            self::$errors['file'] = "*Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
        else if ($file['size'] > 5000000) { // 5MB limit
            self::$errors['file'] = "*File size should not exceed 5MB.";
        }
    }

    public static function ofcNameValidation($officeName){
        if (empty($officeName)) {
            self::$errors['ofcName'] = '*Office name is required.';
        } else {
            // Validate length (example: between 3 and 50 characters)
            if (strlen($officeName) < 3 || strlen($officeName) > 50) {
                self::$errors['ofcName'] = '*Office name must be between 3 and 50 characters.';
            }
            // Validate characters (allow letters, numbers, spaces, dashes, and dots)
            if (!preg_match("/^[a-zA-Z0-9\s\-\.]+$/", $officeName)) {
                self::$errors['ofcName'] = '*Office name can only contain letters, numbers, spaces, dashes, and dots (.)';
            }
        }
    }
    public static function latitudeValidation($latitude){
        if (empty($latitude)) {
            self::$errors['latitude'] = '*Latitude is required.';
        } else {
            // Validate latitude range
            if (!is_numeric($latitude) || $latitude < -90 || $latitude > 90) {
                self::$errors['latitude'] = '*Latitude must be a numeric value between -90 and 90.';
            }
        }
    }
    public static function longitudeValidation($longitude){
        if (empty($longitude)) {
            self::$errors['longitude'] = '*Longitude is required.';
        } else {
            // Validate longitude range
            if (!is_numeric($longitude) || $longitude < -180 || $longitude > 180) {
                self::$errors['longitude'] = '*Longitude must be a numeric value between -180 and 180.';
            }
        }
    }
    public static function dateOfEstdValidation($date)
    {
        if (is_null($date)) {
            self::$errors['ofcName'] = '*Date of establishment is required.';
        } else {
            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) >= time()) {
                self::$errors['doE'] = "*Invalid date of establishment. The date must be in the past.";
            }
        }
    }

    public static function getErrors()
    {
        return self::$errors;
    }
}
