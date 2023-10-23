<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = (string)$_POST['password'];
    try {
        require_once 'db.includes.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';
        require_once 'config_session.inc.php';




        // errors handler
        $errors = [];
        if (isInputEmpty($name, $email, $pwd)) {
            $errors["empty_input"] = 'there is one or more missing field';
        }
        if (isInvalidEmail($email)) {
            $errors["invalid_email"] = 'your rmail is invalid';
        }
        if (isUserNameTaken($pdo, $name)) {
            $errors["taken_username"] = 'this username already taken choose another one';
        }
        if (isEmailRegistered($pdo, $email)) {
            $errors["registered_email"] = 'your email is already registered in the system';
        }

        if ($errors) // errors not equall to null
        {
            $_SESSION["signup_errors"] = $errors;
            header('location: ../index.php');
            die();
        }
        // die() el fo2 heya el hatemn3ni 2ni 2nzel le 2 lines el t7t "4abah return kda"
        createUser($pdo, $name, $email, $pwd);
        header('location: ../index.php?signup=success');

        $pdo = null;


        die();
    } catch (PDOException $e) {
        die("insertion error: " . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
}
?>












/*
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Receive data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$salary = $_POST['salary'];

// Perform data type validation
if (!empty($name) && is_string($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && is_numeric($age) && is_float($salary)) {
// Data types are valid, proceed with processing

// Connect to your MySQL database
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Insert validated data into the database using prepared statements
$stmt = $pdo->prepare("INSERT INTO your_table (name, email, age, salary) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $email, $age, $salary]);

echo "Data inserted successfully!";
} else {
// Data types are not valid, display an error message
echo "Invalid data. Please enter valid information.";
}
}

*/