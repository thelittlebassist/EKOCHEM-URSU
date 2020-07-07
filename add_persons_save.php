<html>
	<head>
		<title>Nowe zamówienie dodano</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "INSERT INTO Pracownicy (Imię, Nazwisko, StanowiskoId, Aktywny, Mail, Telefon, SpółkaId, Uwagi, DziałId)
						VALUES
						(:Imie, :Nazwisko, :StanowiskoId, :Aktywny, :Mail, :Telefon, :SpolkaId, :Uwagi, :DzialId)";
				$data = [
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
            echo "Dodano nowe zamówienie <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_persons.php'>Lista pracowników</a>";
            echo '</div>';
            die ("");
        	}
        catch(Exception $e) {
            echo '<div class="alert alert-warning">';
            echo 'Exception -> ';
            echo ($e->getMessage());
            die("<br>Coś poszło nie tak  ;( <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_persons.php'>Lista pracowników</a></div>");
        	}
			?>
		</div>
	</body>
</html>
