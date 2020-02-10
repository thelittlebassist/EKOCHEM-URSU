<html>
	<head>
		<title>Nowe zamówienie dodano</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "INSERT INTO Zamowienie (Opis,Dostawca,NumZamDost,DataZamowienia,StatusZam,DataDost,StatusFaktury,NrFaktury,Komentarz)
						VALUES
						(:Opis,:Dostawca,:NumZamDost,:DataZamowienia,:StatusZam,:DataDost,:StatusFaktury,:NrFaktury,:Komentarz)";
				$data = [
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
            echo "Dodano nowe zamówienie <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_orders.php'>Lista zamówień</a>";
            echo '</div>';
            die ("");
        	}
        catch(Exception $e) {
            echo '<div class="alert alert-warning">';
            echo 'Exception -> ';
            echo ($e->getMessage());
            die("<br>Coś poszło nie tak  ;( <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_orders.php'>Lista zamówień</a></div>");
        	}
			?>
		</div>
	</body>
</html>
