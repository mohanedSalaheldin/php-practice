<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

// ----------name-----------
$err = [];
if (empty($name)) {
    $err[] = 'Name is empty';
}

// ----------email-----------
if (empty($email)) {
    $err[] = 'Email is empty';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err[] = 'Email Invalid Email';
}

// ----------password-----------
if (empty($password)) {
    $err[] = 'Password is empty';
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
    $err[] = 'Password too weak - include upper, lower, number & symbol';
}

// ----------phone-----------
if (empty($phone)) {
    $err[] = 'Phone is empty';
} elseif (!preg_match('/^[0-9]+$/', $phone)) {
    $err[] = 'Phone should be Numbers only';
}


// ----------- save and redirect----------
if (!empty($err)) {
    $_SESSION['err'] = $err;
    header('Location: register.php');
    exit;
} else {
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ];
    header('Location: profile.php');
    exit;
}
