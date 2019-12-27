<?php
	// Type your website name or domain name here.
	// $domain_name = "http://192.168.64.2/ServerChamSocSucKhoe/" ;
	$domain_name = "http://192.168.0.166/ServerChamSocSucKhoe/" ;
	
	// Image uploading folder.
	$target_dir = "uploads";
	
	// Generating random image name each time so image name will not be same .
	$target_dir = $target_dir . "/" .rand() . "_" . time() . ".jpeg";
	
	
	// Receiving image sent from Application	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)){
		
		// Adding domain name with image random name.
		$target_dir = $domain_name . $target_dir ;
		
		echo json_encode($target_dir);
	}


?>