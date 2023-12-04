<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    // Your reCAPTCHA secret key
    $recaptchaSecretKey = 'YOUR_RECAPTCHA_SECRET_KEY';

    // Get reCAPTCHA response
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA
   $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
    $recaptchaData = [
        'secret'   => $recaptchaSecretKey,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'],
    ];

    $recaptchaOptions = [
        'http' => [
            'method' => 'POST',
            'content' => http_build_query($recaptchaData),
        ],
    ];

    $recaptchaContext = stream_context_create($recaptchaOptions);
    $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);

    // Decode the JSON response
    $recaptchaResultData = json_decode($recaptchaResult, true);

    // Check if reCAPTCHA verification was successful
   // if (!$recaptchaResultData['success']) {
   //     header("location: signup.php?error=recaptchafailed");
   //     exit();
   // }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
} else {
    header("location: signup.php");
    exit();
}
