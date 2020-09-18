<html>
<head>
    <title>Dodawanie nowego zdarzenia</title>
    <?php include('core/bootstrap.php');?>
</head>
<body>
<div class="container-fluid">
    <?php
    include('core/config.php');



    $sql = "INSERT INTO  Historia (Data, ZdarzenieId, Opis, KompId,PracownikId)
                            Values (:Data, :ZdarzenieId, :Opis, :KompId, :PracownikId)";

    if ($_POST['PracownikId'] == 'null') {
        $PracownikId = null;
    }
    else {
        $PracownikId = $_POST['PracownikId'];
    }

    if ($_POST['KompId'] == 'null') {
        $KompId = null;
    }
    else {
        $KompId = $_POST['KompId'];
    }

    $data = [
        'Data' => $_POST['Data'],
        'ZdarzenieId' => $_POST['ZdarzenieId'],
        'Opis' => $_POST['Opis'],
        'KompId' => $_POST['KompId'],
        'PracownikId' => $PracownikId
    ];

    try {
        $pdo->prepare($sql)->execute($data);
        echo '<div class="alert alert-success">';
        echo "Zdarzenie zostało dodane <br>";
        echo "<a class='btn btn-outline-dark btn-sm'  href='List_events.php'>Powrót do listy zdarzeń</a>";
        echo '</div>';
        die ("");
    }
    catch(Exception $e) {
        echo '<div class="alert alert-warning">';
        echo 'Exception -> ';
        echo ($e->getMessage());
        die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_cevents.php'>Lista zdarzeń</a></div>");
    }
    ?>
</div>
</body>
</html>

