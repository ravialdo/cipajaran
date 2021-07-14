<?php

class URL {
	public static function route($route = '')
	{
		return 'http://localhost:8000/'. $route;
	}

	public static function asset($asset = '')
	{
		return 'http://localhost:8000/public/'. $asset;
	}
}