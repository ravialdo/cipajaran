<?php

session_start();

require '../../config/URL.php';
require '../../models/User.php';
	
if(isset($_POST['submit'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$user = User::whereUsername($username);
	
	if($user->num_rows > 0){
		while($row = $user->fetch_assoc()):
			$hash = $row['password'];
		endwhile;
	
		if(password_verify($password, $hash)){
			$_SESSION['status'] = 'success';
			$_SESSION['message'] = "Selamat datang, $username!";
			
			$_SESSION['user'] = [
				'username' => $username
			];
			
			header('location:'. URL::route('dashboard.php'));
		}else {
			$_SESSION['status'] = 'failed';
			$_SESSION['message'] = 'Password yang anda masukan salah!';

			header('location:'. URL::route('login.php'));
		}
		
	}else {
		$_SESSION['status'] = 'failed';
		$_SESSION['message'] = 'Username tidak ditemukan!';

			header('location:'. URL::route('login.php'));
	}
	
}else {
	header('location:'. URL::route('dashboard.php'));
}