<?php

Class Config{
	public static function getDataBase(){	
		return array(
				'database' => array (
				'host' => 'localhost',
				'port' => 3306,
				'username' => 'root',
				'password' => '', // Using an environment variable also works so we can keep sensitive information out of git, e.g. genenv('CXS_DB_PASSWORD').
				'debug' => true
			)
		);
	}
}
