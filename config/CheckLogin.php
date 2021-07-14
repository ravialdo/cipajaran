<?php
include 'config/URL.php';

if(isset($_SESSION['user']['username'])) {
	header('location:'. URL::route('dashboard.php'));
}