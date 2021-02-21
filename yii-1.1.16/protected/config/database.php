<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=140.82.38.62;port=3306;dbname=barattson',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '1',
	'charset' => 'utf8',
	
);