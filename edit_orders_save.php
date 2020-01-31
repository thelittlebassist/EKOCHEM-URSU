<html>
	<head>
		<title>Zamówienie zostało zedytowane</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "UPDATE Zamowienie
							SET
								Opis = :Opis,
								Dostawca = :Dostawca,
								NumZamDost = :NumZamDost,
								DataZamowienia = :DataZamowienia,
								StatusZam = :StatusZam,
								DataDost = :DataDost,
								StatusFaktury = :StatusFaktury,
								NrFaktury = :NrFaktury,
								Komentarz = :Komentarz
							WHERE Id_order = :Id_order";

				$data = [
					'Id_order' => $_POST['Id_order'],
					'Opis' => $_POST['Opis'],
					'Dostawca' => $_POST['Dostawca'],
					'NumZamDost' => $_POST['NumZamDost'],
					'DataZamowienia' => $_POST['DataZamowienia'],
					'StatusZam' => $_POST['StatusZam'],
					'DataDost' => $_POST['DataDost'],
					'StatusFaktury' => $_POST['StatusFaktury'],
					'NrFaktury' => $_POST['NrFaktury'],
					'Komentarz' => $_POST['Komentarz']
				];
			
				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Zamówienie zostało zedytowane <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/List_orders.php'>Lista zamówień</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/List_orders.php'>Lista zamówień</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
