<?php
// I'm using a separate config file. so pull in those config values
require("include/config.inc.php");

// pull in the file with the database class
require("include/Database.singleton.php");

// create the $db singleton object
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

// connect to the server
$db->connect();
$stockSymbol="D05.SI";
$url = 'http://ichart.finance.yahoo.com/table.csv?s=' . $stockSymbol;
$content = file_get_contents($url);
$your_array = explode("\n", $content);
for ($i=1;$i<sizeof($your_array);$i++) {
	$splitString=explode(",",$your_array[$i]);
	$record=$db->query_first("SELECT * FROM prices WHERE symbol = '".$stockSymbol."' AND date ='".$splitString[0]."'");
	if (!isset($record['id'])) {
		$data=array();
		$data['symbol']=$stockSymbol;
		$data['date']=$splitString[0];
		$data['open']=$splitString[1];
		$data['high']=$splitString[2];
		$data['low']=$splitString[3];
		$data['close']=$splitString[4];
		$data['volume']=$splitString[5];
		$data['adjustedClose']=$splitString[6];
		$data['updatedDatetime']=date("Y-m-d H:i:s");
		$db->insert("prices",$data);
	}
}
$db->close();



?>