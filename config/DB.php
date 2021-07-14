<?php

class DB {
		
	public static function db_connect(){
		
		return $conn = new mysqli(
			'ec2-54-157-100-65.compute-1.amazonaws.com',
			'ftpzaajhsyjvsb',
			'19210d1c4648e3bc4352104eed5298f8d98903a27059dffda7cc043629797951',
			'd10q14vc59h36a'
		); 
	
		if(!$conn) {
			return die("Koneksi gagal: " . mysqli_connect_error());
		}
	}
	
	public function __destruct(){
		return mysqli_close($this->db_connect()->close());
	}
}
