<?php
// I'm using a separate config file. so pull in those config values
require("include/config.inc.php");

// pull in the file with the database class
require("include/Database.singleton.php");

// create the $db singleton object
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

// connect to the server
$db->connect();

//Get data

$url = 'https://webhose.io/search?token=ae1f42ff-9e16-4e94-ad0b-fc603b85734e&format=json&q=%22DBS%20Group%22';
$content = file_get_contents($url);
$json = json_decode($content, true);

foreach($json['posts'] as $post) {
	$record=$db->query_first("SELECT * FROM thread WHERE url ='".$post['thread']['url']."'");
	//No record, so let's add into database
	if (!isset($record['id'])) {
		$data=array();
		$data['url']=$post['thread']['url'];
		$data['site_full']=$post['thread']['site_full'];
		$data['site_section']=$post['thread']['site_section'];
		$data['section_title']=$post['thread']['section_title'];
		$data['title']=$post['thread']['title'];
		$data['title_full']=$post['thread']['title_full'];
		$data['published']=date("Y-m-d H:i:s",strtotime($post['thread']['published']));
        $data['replies_count']=$post['thread']['replies_count'];
        $data['participants_count']=$post['thread']['participants_count'];
        $data['site_type']=$post['thread']['site_type'];
        $data['country']=$post['thread']['country'];
        $data['spam_score']=$post['thread']['spam_score'];
        $data['main_image']=$post['thread']['main_image'];
		$data['text']=$post['text'];
		$db->insert("thread",$data);
	}
}
$db->close();
?>