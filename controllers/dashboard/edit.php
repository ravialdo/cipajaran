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
	
	$id = base64_decode($_GET['k']);
	$sheep = Sheep::whereId($id);
	
	$name_file = basename($_FILES['gambar']['name']);
	
	if($name_file != ''){
		
		$target_dir = '../../public/item/';
		$upload_file = $target_dir . $name_file;
		move_uploaded_file($_FILES ['gambar']['tmp_name'], $upload_file);
		
		Sheep::updatePhoto(
			$name_file, $id
		);
		
		while($row = $sheep->fetch_assoc()):
			$gambar_lama = $row['gambar'];
		endwhile;
		
		unlink($target_dir . $gambar_lama);
	}
	
	$check = Sheep::update(
		$jenis_domba, $harga, $deskripsi, $nomor_wa, $id
	);
	
	if($check === TRUE){
		$_SESSION['status'] = 'success';
		$_SESSION['message'] = 'Data berhasil diedit!';
	
		header('location:'. URL::route('dashboard.php'));
	} else {
		$_SESSION['status'] = 'failed';
		$_SESSION['message'] = 'Data gagal diedit!';
	
		header('location:'. URL::route('dashboard.php'));
	}

}else {
	header('location:'. URL::route('dashboard.php'));
}