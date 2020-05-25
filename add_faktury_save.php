<html>
	<head>
		<title>Nową fakturę dodano</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql1 = "INSERT INTO Faktury (NumerFakt,Id_order,DataWyst,DataDost,Kwota,Komentarz_fak) VALUES (:NumerFakt,:Id_order,:DataWyst,:DataDost,:Kwota,:Komentarz_fak)";
				$data1 = [
					'NumerFakt' => $_POST['NumerFakt'],
					'Id_order' => $_POST['Id_order'],
					'DataWyst' => $_POST['DataWyst'],
					'DataDost' => $_POST['DataDost'],
					'Kwota' => $_POST['Kwota'],
					'Komentarz_fak' => $_POST['Komentarz_fak']
				];

				$sql2 = "UPDATE Zamowienie
								SET NrFaktury = :NumerFakt
								WHERE Id_order = :Id_order";
				$data2 = [
									'NumerFakt' => $_POST['NumerFakt'],
									'Id_order' => $_POST['Id_order'],
				];

				try {
            $pdo->prepare($sql1)->execute($data1);
						$pdo->prepare($sql2)->execute($data2);
            echo '<div class="alert alert-success">';
            echo "Dodano nową fakturę <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista faktur</a><br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_orders.php'>Lista zamówień</a>";
            echo '</div>';
            die ("");
        	}
        catch(Exception $e) {
            echo '<div class="alert alert-warning">';
            echo 'Exception -> ';
            echo ($e->getMessage());
            die("<br>Coś poszło nie tak  ;( <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista faktur</a></div>");
        	}
			?>
		</div>
	</body>
</html>
