<?php
session_start();

require '../../config/URL.php';
require '../../models/Sheep.php';

if(isset($_GET['k'])){
	
$id = base64_decode($_GET['k']);
$sheep = Sheep::whereId($id);

$target_dir = '../../public/item/';
while($row = $sheep->fetch_assoc()):
	$gambar = $row['gambar'];
endwhile;
unlink($target_dir . $gambar);

$check = Sheep::delete($id);

if($check === TRUE){
		$_SESSION['status'] = 'success';
		$_SESSION['message'] = 'Data berhasil dihapus!';
	
		header('location:'. URL::route('dashboard.php'));
	} else {
		$_SESSION['status'] = 'failed';
		$_SESSION['message'] = 'Data gagal dihapus!';
	
		header('location:'. URL::route('dashboard.php'));
	}
	
}else {
	header('location:'. URL::route('dashboard.php'));
}