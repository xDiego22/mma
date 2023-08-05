<?php 
	
   define("SOKECT_FRONTEND", "127.0.0.1:12345");


	// if(isset($_POST['tipo'])){
	// 	if($_POST['tipo'] == "Load"){
	// 		$_SESSION['sesionName'] = uniqid();
	// 		echo $_SESSION['sesionName'];
	// 		die();
	// 	}
	// }

	if(isset($_POST["name"])&&isset($_POST["message"])){
		//if(isset($_SESSION['sesionName'])){
			$dataTime = "<span> ".date('d M Y H:i:s')." </span>";
			
			$array[] = array(
				'name' => $_POST["name"],
				'message' => $_POST["message"],
				"dataTime" => $dataTime);
			echo json_encode($array);
			die();
		//}
	}
?>