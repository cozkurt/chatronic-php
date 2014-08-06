<?php

function mysqlToArray($query)
{
	$host = "localhost";
	$db = "openfire";
	$user = "root";
	$pass = "inciemre";

	$connection = mysql_connect($host, $user, $pass);

	if(!$connection)
	{
		die("Database server connection failed.");
	}
	else
	{
		$dbconnect = mysql_select_db($db, $connection);
		
		if(!$dbconnect)
		{
			die("Unable to connect to the specified database!");
		}
	}
	
	$resultset = mysql_query($query, $connection);
	$records = array();

	//Loop through all our records and add them to our array
	while($r = mysql_fetch_assoc($resultset))
	{
		$records[] = $r;
	}

	return $records;
}

function mysqlToJson($query)
{
	$records = mysqlToArray($query);
	
	//Output the data as JSON
	echo json_encode($records);
}

?>