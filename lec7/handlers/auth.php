<?php
session_start();
// var_dump(__DIR__ . '/../core/functions.php');
require_once __DIR__ . '/../core/functions.php';


$action = $_POST['action'] ?? '';

if ($action === 'register') {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        $_SESSION['error'] = 'تحقق من المدخلات (كلمة المرور 6 أحرف على الأقل).';
        header('Location: ../register.php');
        exit;
    }
    // var_dump($_SESSION['user']);

    if (findUserByEmail($email)) {
        $_SESSION['error'] = 'هذا الإيميل مسجل بالفعل.';
        header('Location: ../register.php');
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $users = readUsers();

    $users[] = [
        'name' => $name,
        'email' => $email,
        'password' => $hash
    ];

    saveUsers($users);

    $_SESSION['user'] = ['name' => $name, 'email' => $email];
    header('Location: ../profile.php');
    exit;
}

if ($action === 'login') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $user = findUserByEmail($email);

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['error'] = 'بيانات الدخول خاطئة.';
        header('Location: ../login.php');
        exit;
    }

    $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];
    header('Location: ../profile.php');
    exit;
}

header('Location: ../login.php');
exit;
