<?php

	include ('models/database.php');
	$db = new Database();
	$data = $db->select2();

	$json = [];
	while( $row = $data->fetch() ){
	     $json[] = ['id'=>$row['id'], 'text'=>$row['numero']];
	}


	echo json_encode($json);

?>