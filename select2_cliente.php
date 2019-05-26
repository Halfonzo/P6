<?php

	include ('models/database.php');
	$db = new Database();
	$data = $db->select2_user();

	$json = [];
	while( $row = $data->fetch() ){
	     $json[] = ['id'=>$row['id'], 'text'=>$row['nombre']];
	}


	echo json_encode($json);

?>