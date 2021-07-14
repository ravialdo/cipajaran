<?php

class DB {
		
	public static function db_connect(){
		
		return $conn = new mysqli(
			'localhost',
			'root',
			'',
			'db_cipajaran'
		); 
	
		if(!$conn) {
			return die("Koneksi gagal: " . mysqli_connect_error());
		}
	}
	
	public function __destruct(){
		return mysqli_close($this->db_connect()->close());
	}
}
