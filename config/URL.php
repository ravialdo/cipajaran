<?php

class URL {
	public static function route($route = '')
	{
		return 'http://cipajaran-farm.herokuapp.com/'. $route;
	}

	public static function asset($asset = '')
	{
		return 'http://cipajaran-farm.herokuapp.com/public/'. $asset;
	}
}