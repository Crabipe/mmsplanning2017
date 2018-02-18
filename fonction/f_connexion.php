<?php 
	
	function connection($id, $pw, $PDO) {
		if(isset($id)) {
			if(ConnectValide($id, $pw, $PDO) != -1) {
				header("Location: index2.php");
			}else {
				echo "salut";
			}
		}
	}
?>