<?php
		
		// fonction qui verifie le pseudo et le mot de passe
		function ConnectValide($lid, $mdp, $connection) {
			
			$lemdp = hash("sha256",$mdp);
			
			$id = "SELECT login FROM connexion WHERE login = '$lid'";
			$pseudocherche = $connection->query($id);
			$pseudocherche->setFetchMode(PDO::FETCH_OBJ);
			$pseudotrouve = "";
			$res = 0;
			
			if($lid == "") {
				$pseudotrouve = "a";
			}
			
			while($result = $pseudocherche->fetch()) {
				
				if($result->login == $lid) {
					
					$pseudotrouve = $lid;
				}else {
					
					$pseudotrouve = "a";
				}
			}

			if($pseudotrouve == $lid) {
				
				$mdp = "SELECT password FROM connexion WHERE login='$lid'";
				
				$mdpcherche = $connection->query($mdp);
				$mdpcherche->setFetchMode(PDO::FETCH_OBJ);

				while($result = $mdpcherche->fetch()) {
					if ($result->password == $lemdp) {
						$res = 1;
						$_SESSION['pseudo'] = $pseudotrouve;
						$_SESSION['mdp'] = $mdp;
					}else {
						$res = -1;
					}
				}
			}else {
				$res = -1;
			}
		return $res;
		}

?>