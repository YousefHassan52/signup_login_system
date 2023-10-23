<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Registration Form</title>
</head>

<body>

    
<div class="container">
        <form action="includes/signup.inc.php" method="post">
            <h2>Registration Form</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    <div>
    <?php chekSignupErrors(); ?>
    </div>


</body>

</html>