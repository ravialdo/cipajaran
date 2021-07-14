<?php
require '../../config/DB.php';

class Sheep {
	
	/*
	* select data id
	*/
	public static function whereId($id)
	{
		return DB::db_connect()->query("SELECT * FROM domba WHERE id=$id");
	}
	
	/*
	* create data
	*/
	public static function create($jenis_domba, $harga, $deskripsi, $nomor_wa, $name_file)
	{
		return DB::db_connect()->query("INSERT INTO domba (jenis_domba, harga, deskripsi, nomor_wa, gambar) VALUES ('$jenis_domba', '$harga', '$deskripsi', '$nomor_wa', '$name_file')");
	}
	
	/*
	* update data
	*/
	public static function update($jenis_domba, $harga, $deskripsi, $nomor_wa, $id)
	{
		return DB::db_connect()->query("UPDATE domba SET jenis_domba='$jenis_domba', harga='$harga', deskripsi='$deskripsi', nomor_wa='$nomor_wa' WHERE id=$id");
	}
	
	/*
	* update photo
	*/
	public static function updatePhoto($nama_file, $id)
	{
		return DB::db_connect()->query("UPDATE domba SET gambar='$nama_file' WHERE id=$id");
	}
	
	/*
	* delete data
	*/
	public static function delete($id)
	{
		return DB::db_connect()->query("DELETE FROM domba WHERE id=$id");
	}
}