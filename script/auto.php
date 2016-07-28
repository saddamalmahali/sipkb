<?php
// Make sure it's run from CLI
$flag = true;
	if(php_sapi_name() != 'cli' && !empty($_SERVER['REMOTE_ADDR'])) exit("Access Denied.");	

	// Please configure this
	$url = "http://localhost/sipkb/backend/web";

	fclose(fopen($url."/index.php/pesan/message_routine", "r"));



?>