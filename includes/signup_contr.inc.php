<?php
// is input empty
// is invalid email
// is username taken
declare(strict_types=1);
require_once "signup_model.inc.php";
function isInputEmpty(string $name, string $email, string $password)
{
    if (empty($name) || empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function isInvalidEmail(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return true;
    } else {
        return false;
    }
}

function isUserNameTaken(PDO $pdo, string $name)
{
    if (getUserNameFromDatabase($pdo, $name)) {
        return true;
    } else {
        return false;
    }
}
function isEmailRegistered(PDO $pdo, string $email)
{
    if (getEmailFromDatabase($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function createUser(PDO $pdo, string $username, string $email, string $pwd)
{
    insertUserToDatabase($pdo,  $username,  $email,  $pwd);
}
