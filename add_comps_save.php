<html>
<head>
    <title>Dodawanie nowego komputera</title>
    <?php include('core/bootstrap.php');?>
</head>
<body>
<div class="container-fluid">
    <?php
    include('core/config.php');



    $sql = "INSERT INTO  Kompy (Nazwa, ModelId, Service_tag, SystemId,PracownikId, Data_Wydania, Mikrofon, Kamera, MiejsceId, Uwagi)
                            Values (:Nazwa, :ModelId, :Service_tag, :SystemId, :PracownikId, :Data_Wydania, :Mikrofon, :Kamera, :MiejsceId, :Uwagi)";

    $data = [
        'Nazwa' => $_POST['Nazwa'],
        'ModelId' => $_POST['ModelId'],
        'Service_tag' => $_POST['Service_tag'],
        'SystemId' => $_POST['SystemId'],
        'PracownikId' => $_POST['PracownikId'],
        'Data_Wydania' => $_POST['Data_Wydania'],
        'Mikrofon' => $_POST['Mikrofon'],
        'Kamera' => $_POST['Kamera'],
        'MiejsceId' => $_POST['MiejsceId'],
        'Uwagi' => $_POST['Uwagi']
    ];

    try {
        $pdo->prepare($sql)->execute($data);
        echo '<div class="alert alert-success">';
        echo "Komputer został dodany <br>";
        echo "<a class='btn btn-outline-dark btn-sm'  href='List_comps.php'>Powrót do listy komputerów</a>";
        echo '</div>';
        die ("");
    }
    catch(Exception $e) {
        echo '<div class="alert alert-warning">';
        echo 'Exception -> ';
        echo ($e->getMessage());
        die("<br>Coś poszło nie tak z zapisem  <br> <a class='btn btn-outline-dark btn-sm'  href='http://localhost/EKOCHEM-URSU/List_comps.php'>Lista komputerów</a></div>");
    }
    ?>
</div>
</body>
</html>

