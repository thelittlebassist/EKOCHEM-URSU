<html>
<head>
    <title>Pracownik zostało usunięte</title>
    <?php include('core/bootstrap.php');?>
</head>
<body>
<div class="container-fluid">
    <?php
    include('core/config.php');

    $sql = "DELETE From Kompy WHERE Id = :Id";
    $data = ['Id' => $Id
    ];

    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }


    try {
        $pdo->prepare($sql)->execute($data);
        echo '<div class="alert alert-success">';
        echo "Komputer został usunięty <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_comps.php'>Lista komputerów</a>";
        echo '</div>';
        die ("");
    }
    catch(Exception $e) {
        echo '<div class="alert alert-warning">';
        echo 'Exception -> ';
        echo ($e->getMessage());
        die("<br>Coś poszło nie tak z usuwaniem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_comps.php'>Lista komputerów</a></div>");
    }
    ?>
</div>
</body>
</html>