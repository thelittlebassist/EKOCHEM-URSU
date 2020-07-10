<html>
	<head>
		<title>Zamówienie zostało zedytowane</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "UPDATE Pracownicy
							SET
								Imię = :Imie,
								Nazwisko = :Nazwisko,
								StanowiskoId = :StanowiskoId,
								DziałId = :DzialId,
								Aktywny = :Aktywny,
								Mail = :Mail,
								Telefon = :Telefon,
								SpółkaId = :SpolkaId,
								Uwagi = :Uwagi
							WHERE Id = :Id";

				$data = [
					'Id' => $_POST['Id'],
					'Imie' => $_POST['Imię'],
					'Nazwisko' => $_POST['Nazwisko'],
					'StanowiskoId' => $_POST['StanowiskoId'],
					'Aktywny' => $_POST['Aktywny'],
					'Mail' => $_POST['Mail'],
					'Telefon' => $_POST['Telefon'],
					'SpolkaId' => $_POST['SpółkaId'],
					'Uwagi' => $_POST['Uwagi'],
					'DzialId' => $_POST['DziałId']
				];

				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Pracownik został zedytowany <br>";
								echo "<a class='btn btn-outline-dark btn-sm'  href='view_persons.php?Id=".$_POST["Id"]."'>Powrót do podglądu</a>";
								echo "<a class='btn btn-outline-dark btn-sm'  href='List_persons.php'>Powrót do listy pracowników</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='view_persons.php?Id=".$_POST["Id"]."'>Powrót do podglądu</a> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_persons.php'>Lista pracowników</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
