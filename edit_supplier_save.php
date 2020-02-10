<html>
	<head>
		<title>Dostawca został zedytowany</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "UPDATE Dostawca
							SET
								Name = :Name,
								Adres = :Adres,
								mail = :mail,
								website = :website
							WHERE Id_supplier = :Id_supplier";

				$data = [
					'Id_supplier' => $_POST['Id_supplier'],
					'Name' => $_POST['Name'],
					'Adres' => $_POST['Adres'],
					'mail' => $_POST['mail'],
					'website' => $_POST['website'],
					];

				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Dostawca został zedytowany <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
