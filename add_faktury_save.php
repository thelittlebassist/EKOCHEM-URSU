<html>
	<head>
		<title>Nową fakturę dodano</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "INSERT INTO Faktury (NumerFakt,Dostawca,Id_order,DataWyst,DataDost,Kwota,Komentarz)
						VALUES
						(:NumerFakt,:Dostawca,:Id_order,:DataWyst,:DataDost,:Kwota,:Komentarz)";
				$data = [
					'NumerFakt' => $_POST['NumerFakt'],
					'Dostawca' => $_POST['Dostawca'],
					'Id_order' => $_POST['Id_order'],
					'DataWyst' => $_POST['DataWyst'],
					'DataDost' => $_POST['DataDost'],
					'Kwota' => $_POST['Kwota'],
					'Komentarz' => $_POST['Komentarz']
				];
				try {
            $pdo->prepare($sql)->execute($data);
            echo '<div class="alert alert-success">';
            echo "Dodano nową fakturę <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista faktur</a>";
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
