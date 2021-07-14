<?php
session_start();

require '../../config/URL.php';
require '../../models/Sheep.php';

if(isset($_POST['submit'])){
	
$jenis_domba = $_POST['jenis_domba'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$nomor_wa = $_POST['nomor_wa'];
$gambar  = $_FILES['gambar'];

$target_dir = '../../public/item/';
$name_file = basename($_FILES['gambar']['name']);
$upload_file = $target_dir . $name_file;

move_uploaded_file($_FILES ['gambar']['tmp_name'], $upload_file);

$check = Sheep::create(
	$jenis_domba, $harga, $deskripsi, $nomor_wa, $name_file
);

if($check === TRUE){
		$_SESSION['status'] = 'success';
		$_SESSION['message'] = 'Data berhasil ditambahkan!';
	
		header('location:'. URL::route('dashboard.php'));
	} else {
		$_SESSION['status'] = 'failed';
		$_SESSION['message'] = 'Data gagal ditambahkan!';
	
		header('location:'. URL::route('dashboard.php'));
	}
	
}else {
	header('location:'. URL::route('dashboard.php'));
}