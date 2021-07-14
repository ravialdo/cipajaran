<?php

session_start();

require '../../config/URL.php';

unset($_SESSION['user']);

$_SESSION['status'] = 'success';
$_SESSION['message'] = 'Anda telah logout!';

header('location:'. URL::route('login.php'));