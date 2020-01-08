<html>
	<head>
		<title>Zamówienie zostało zedytowane</title>

		  <!-- ŁADOWANIE BOOTSTRAP -->
    <link rel="stylesheet" href="bt4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    	<!-- END ŁADOWANIE BOOTSTRAP -->

	</head>
	<body>
		<div class="container-fluid">
			<?php
				/* config pod PDO i OOP */
	          define('DB_SERVER', 'localhost\SQLEXPRESS');
	          define('DB_USERNAME', 'Rysiu');
	          define('DB_PASSWORD', '@sql^local1249');
	          define('DB_NAME', 'Rejestr_Zakupow');
	          try {
	              $pdo = new PDO("sqlsrv:Server=" . DB_SERVER . ";Database=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
	              // Set the PDO error mode to exception
	              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	          } catch (PDOException $e) {
	              die("ERROR: Could not connect. " . $e->getMessage());
	          }

				$sql = "UPDATE dbo.Zamowienie Id_order,Opis,Dostawca,NumZamDost,DataZamowienia,StatusZam,DataDost,StatusFaktury,NrFaktury,Komentarz
							SET
								Id_order = :Id_order,
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
		            echo "Zamówienie zostało zedytowane <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/Zamowiania_strona_30_1.php'>Lista zamówień</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/Zamowiania_strona_30_1.php'>Lista zamówień</a> ;(</div>");
		        	}
			?>
		</div>
	</body>
</html>
