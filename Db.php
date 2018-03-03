<?php

	class Db {
		public static function getConnect() {
			//return (new PDO("mysql:host=localhost;dbname=pikmlm_testdrive;","pikmlm_testdrive","111222333"));

			// Create (connect to) SQLite database in file
			$file_db = new PDO('sqlite:testpsychics.sqlite3');
			// Set errormode to exceptions
			$file_db->setAttribute(PDO::ATTR_ERRMODE, 
			                        PDO::ERRMODE_EXCEPTION);			

			// Create table
			$sql_text = "CREATE TABLE IF NOT EXISTS `tblData` ("
				. "`userkey` varchar(200) NOT NULL,"
				. "`userdata` text NOT NULL,"
				. "PRIMARY KEY (`userkey`)"
				. ")";
			$file_db->exec($sql_text);

			return $db;
    	}
	}
?>