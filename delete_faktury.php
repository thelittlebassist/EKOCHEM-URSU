<html>
	<head>
		<title>Zamówienie zostało usunięte</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "DELETE From Faktury WHERE id_faktury = :id_faktury";
				$data = ['id_faktury' => $id_faktury
				];

				if ($stmt = $pdo->prepare($sql)) {
                	if ($stmt->execute(array(':id_faktury'=>trim($_GET['id_faktury'])))) {
                  }
                }


				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Zamówienie zostało usunięte <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista Faktur</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z usuwaniem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_faktury.php'>Lista Faktur</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
