<?php

function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL)
        && preg_match('/@.+\./', $email);
}

function validateMobileNumber($mobile)
{
    if (!empty($mobile)) {
        $isMobileNmberValid = true;
        $mobileDigitsLength = strlen($mobile);
        if ($mobileDigitsLength < 10 || $mobileDigitsLength > 15) {
            $isMobileNmberValid = false;
        } else {
            if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $mobile)) {
                $isMobileNmberValid = false;
            }
        }
        return $isMobileNmberValid;
    } else {
        return false;
    }
}
