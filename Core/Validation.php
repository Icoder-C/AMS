<?php

namespace Core;

class Validation {
    protected $errors = [];

    // Validate email
    public static function emailValidation($value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return self::$errors['email']= "Invalid email format.";
        }
        return true;
    }

    // Validate name
    public static function nameValidation($value) {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $value)) {
            return "Only letters and white space allowed in name.";
        }
        return true;
    }

    // Validate Nepali phone number
    public static function phoneNumberValidation($value) {
        if (!preg_match("/^(\+977)?-?9[78]\d{8}$/", $value)) {
            return "Invalid Nepali phone number format.";
        }
        return true;
    }

    // Validate password (minimum eight characters, at least one letter, one number and one special character)
    public static function passwordValidation($value) {
        if (!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,}$/", $value)) {
            return "Password must be at least 8 characters long and include at least one letter, one number, and one special character.";
        }
        return true;
    }

    // Validate confirm password
    public static function confirmPasswordValidation($password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }
        return true;
    }

    // Validate date of appointment (YYYY-MM-DD and must be a future date)
    public static function dateOfAppointmentValidation($date) {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) < time()) {
            return "Invalid date of appointment. The date must be in the future.";
        }
        return true;
    }

    // Validate date of birth (YYYY-MM-DD and must be a past date)
    public static function dateOfBirthValidation($date) {
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) || strtotime($date) >= time()) {
            return "Invalid date of birth. The date must be in the past.";
        }
        return true;
    }

    // Validate photo file
    public static function photoFileValidation($file) {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedMimeTypes)) {
            return "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        }
        if ($file['size'] > 5000000) { // 5MB limit
            return "File size should not exceed 5MB.";
        }
        return true;
    }
}
