<?php
    // variable pendefinisian kredensial
    $usernamelogin = 'admin';
    $passwordlogin = '12345678';

    // memulai session
    session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // pengecekan kredensial login
    if ($username == $usernamelogin && $password == $passwordlogin) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: app.php");
    } 
    else {
        header("Location: login.php");
   }
?>