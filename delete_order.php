<html>
	<head>
		<title>Zamówienie zostało usunięte</title>
			<?php include('core/bootstrap.php');?>
	</head>
	<body>
		<div class="container-fluid">
			<?php
				include('core/config.php');

				$sql = "DELETE From Zamowienie WHERE Id_order = :Id_order";
				$data = ['Id_order' => $Id_order
				];
			
				if ($stmt = $pdo->prepare($sql)) {
                	if ($stmt->execute(array(':Id_order'=>trim($_GET['Id_order'])))) {
                  }
                }


				try {
		            $pdo->prepare($sql)->execute($data);
		            echo '<div class="alert alert-success">';
		            echo "Zamówienie zostało usunięte <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/List_orders.php'>Lista zamówień</a>";
		            echo '</div>';
		            die ("");
        	}
		        catch(Exception $e) {
		            echo '<div class="alert alert-warning">';
		            echo 'Exception -> ';
		            echo ($e->getMessage());
		            die("<br>Coś poszło nie tak z usuwaniem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/List_orders.php'>Lista zamówień</a></div>");
		        	}
			?>
		</div>
	</body>
</html>
