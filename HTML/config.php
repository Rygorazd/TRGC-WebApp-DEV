<?php
$db_host="trgc-mysql.mysql.database.azure.com"; //host server 
$db_user="student";	//database username
$db_password="T0r0nt057";	//database password   
$db_name="trgcdev";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>
