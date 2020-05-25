<html>
	<head>
		<title>Faktura została zedytowana</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "UPDATE Faktury
							SET
								NumerFakt = :NumerFakt,
								Id_order = :Id_order,
								DataWyst = :DataWyst,
								DataDost = :DataDost,
								Kwota = :Kwota,
								Komentarz_fak = :Komentarz_fak
							WHERE id_faktury = :id_faktury";

				$data = [
					'id_faktury' => $_POST['id_faktury'],
          'NumerFakt' => $_POST['NumerFakt'],
					'Id_order' => $_POST['Id_order'],
					'DataWyst' => $_POST['DataWyst'],
					'DataDost' => $_POST['DataDost'],
					'Kwota' => $_POST['Kwota'],
					'Komentarz_fak' => $_POST['Komentarz_fak']
				];

				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Zamówienie zostało zedytowane <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista Faktur</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista Faktur</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
