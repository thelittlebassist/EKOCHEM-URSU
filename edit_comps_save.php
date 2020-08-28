<html>
<head>
    <title>Komputer został zedytowany</title>
    <?php include('core/bootstrap.php');?>
</head>
<body>
<div class="container-fluid">
    <?php
    include('core/config.php');

    $sql = "UPDATE Kompy
							SET
								Nazwa = :Nazwa,
								ModelId = :ModelId,
								Service_tag = :Service_tag,
								SystemId = :SystemId,
							    PracownikId = :PracownikId,
								Data_Wydania = :Data_Wydania,
								Mikrofon = :Mikrofon,
								Kamera = :Kamera,
							    MiejsceId = :MiejsceId,
								Uwagi = :Uwagi,
                                Checked = :Checked
							WHERE Id = :Id ";

    if ($_POST['PracownikId'] == 'null') {
        $PracownikId = null;
    }
    else {
        $PracownikId = $_POST['PracownikId'];
    }

    if ($_POST['MiejsceId'] == 'null') {
        $MiejsceId = null;
    }
    else {
        $MiejsceId = $_POST['MiejsceId'];
    }

    $data = [
        'Id' => $_POST['Id'],
        'Nazwa' => $_POST['Nazwa'],
        'ModelId' => $_POST['ModelId'],
        'Service_tag' => $_POST['Service_tag'],
        'SystemId' => $_POST['SystemId'],
        'PracownikId' => $PracownikId,
        'Data_Wydania' => $_POST['Data_Wydania'],
        'Mikrofon' => $_POST['Mikrofon'],
        'Kamera' => $_POST['Kamera'],
        'MiejsceId' => $MiejsceId,
        'Uwagi' => $_POST['Uwagi'],
        'Checked' => $_POST['Checked']
    ];

    try {
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':PracownikId',null,PDO::PARAM_INT);
        $sth->execute($data);
        echo '<div class="alert alert-success">';
        echo "Komputer został zedytowany <br>";
        echo "<a class='btn btn-outline-dark btn-sm'  href='view_comps.php?Id=".$_POST["Id"]."'>Powrót do podglądu</a>";
        echo "<a class='btn btn-outline-dark btn-sm'  href='List_comps.php'>Powrót do listy komputerów</a>";
        echo '</div>';
        die ("");
    }
    catch(Exception $e) {
        echo '<div class="alert alert-warning">';
        echo 'Exception -> ';
        echo ($e->getMessage());
        die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='view_comps.php?Id=".$_POST["Id"]."'>Powrót do podglądu</a> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_comps.php'>Lista komputerów</a></div>");
    }
    ?>
</div>
</body>
</html>

