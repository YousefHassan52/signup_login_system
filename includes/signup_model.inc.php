<?php

declare(strict_types=1);

function getUserNameFromDatabase(PDO $pdo, string $username)
{
    $query = "SELECT * from users WHERE users.name=:username ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getEmailFromDatabase(PDO $pdo, string $email)
{
    $query = "SELECT * from users WHERE users.email=:email ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function insertUserToDatabase(PDO $pdo, string $username, string $email, string $pwd)
{
    $query = "INSERT INTO users (users.name,users.email,users.pwd) VALUES(:username,:email,:pwd);";
    $stmt = $pdo->prepare($query);
    $options = [
        "cost" => 12,
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt->bindParam("username", $username);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("pwd", $hashedPwd);
    $stmt->execute();
}
