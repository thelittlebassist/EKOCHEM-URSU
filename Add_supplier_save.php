<html>
	<head>
		<title>Dodano dostawcę</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "INSERT INTO Dostawca (Name,Adres,mail,website)
						VALUES
						(:Name,:Adres,:mail,:website)";
				$data = [
					'Name' => $_POST['Name'],
					'Adres' => $_POST['Adres'],
					'mail' => $_POST['mail'],
					'website' => $_POST['website'],
				];
				try {
            $pdo->prepare($sql)->execute($data);
            echo '<div class="alert alert-success">';
            echo "Dodano nowe zamówienie <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a>";
            echo '</div>';
            die ("");
        	}
        catch(Exception $e) {
            echo '<div class="alert alert-warning">';
            echo 'Exception -> ';
            echo ($e->getMessage());
            die("<br>Coś poszło nie tak  ;( <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a></div>");
        	}
			?>
		</div>
	</body>
</html>
