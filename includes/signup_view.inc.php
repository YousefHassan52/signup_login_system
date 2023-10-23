<?php

declare(strict_types=1);
function chekSignupErrors()
{
    if (isset($_SESSION['signup_errors'])) {
        $errors = $_SESSION['signup_errors'];

        echo "<br>";

        foreach ($errors as $error) {

            echo "<p class='error_msg'>" . $error . "<br>" . "</p>";
        }
        unset($_SESSION['signup_errors']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo "<br>";
        echo "<p class='success_msg'>This is a success message.</p>";
    }
}
