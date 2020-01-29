<html>
	<head>
		<title>Dodano dostawcę</title>

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
            echo "Dodano nowe zamówienie <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/Dostawcy_lista.php'>Lista dostawców</a>";
            echo '</div>';
            die ("");
        	}
        catch(Exception $e) {
            echo '<div class="alert alert-warning">';
            echo 'Exception -> ';
            echo ($e->getMessage());
            die("<br>Coś poszło nie tak  ;( <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/Dostawcy_lista.php'>Lista dostawców</a></div>");
        	}
			?>
		</div>
	</body>
</html>
