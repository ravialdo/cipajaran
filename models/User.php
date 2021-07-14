<?php
require '../../config/DB.php';

 class User {
	
	/*
	* select data
	*/
	public static function whereUsername($username)
	{
		return DB::db_connect()->query("SELECT * FROM user WHERE username='$username'");
	}
}