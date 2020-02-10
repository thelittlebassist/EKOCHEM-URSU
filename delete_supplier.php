<html>
	<head>
		<title>Dostawca został usunięty</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "DELETE From Dostawca WHERE Id_supplier = :Id_supplier";
				$data = ['Id_supplier' => $Id_supplier
				];

				if ($stmt = $pdo->prepare($sql)) {
                	if ($stmt->execute(array(':Id_supplier'=>trim($_GET['Id_supplier'])))) {
                  }
                }


				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Dostawca został usunięty <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z usuwaniem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_suppliers.php'>Lista dostawców</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
