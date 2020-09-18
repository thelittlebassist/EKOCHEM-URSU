<html>
<head>
    <title>Podgląd Komputera</title>
    <?php
    include('core/bootstrap.php');
    include('core/navbar.php');
    ?>

<body>

<div>
    <h3 align="center">Podgląd Komputera</h3>
</div>

<table border="1" style="font-size:14px" class="table table-striped table-hover">
    <?php
    include('core/config.php');


    # $sql = "select * from Faktury where NumerFakt = :NumerFakt";
    $sql = "select
                      	k.Id,
                      	k.Nazwa,
                      	m.Nazwa AS Model,
                        pr.Nazwa AS Producent,
                        t.Nazwa AS Typ,
                      	k.Service_tag AS Service_tag,
                      	s.Nazwa AS System,
                      	p.Imię AS Imię,
                        p.Nazwisko AS Nazwisko,
                        k.Data_Wydania AS DataWydania,
                            CASE
                                when k.Mikrofon = 1
                                    then 'Tak'
                                    else 'Nie'
                            END AS Mikrofon,
                            CASE
                                when k.Kamera = 1
                                    then 'Tak'
                                    else 'Nie'
                            END AS Kamera,
                        ms.Nazwa AS Miejsce,
                        k.Uwagi,
                        p.Id AS PracownikId,
                        CASE
                            when k.Checked = 1
                                then 'TAK'
                                else 'NIE'
                        END AS Checked
                      from Kompy AS k
                        left join Modele AS m on [m].[Id] = [k].[ModelId]
                      	left join Systemy AS s on [s].[Id] = [k].[SystemId]
                      	left join Pracownicy AS p on [p].[Id] = [k].[PracownikId]
                        left join Miejsca AS ms ON ms.Id = k.MiejsceId
                        left join Producenci AS pr ON pr.Id = m.ProducentId
                        left join Typy_komp AS t ON t.Id = m.TypId
                    where k.Id = :Id;";
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
    {
        print '<tr>';
        print '<th width="120">Nazwa</th>';
        print '<td><name="Nazwa">' . $row["Nazwa"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Model</th>';
        print '<td><name="Model">' . $row["Producent"] . " " . $row["Model"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Typ</th>';
        print '<td><name="Typ">' . $row["Typ"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Service Tag</th>';
        print '<td><name="Service_tag">' . $row["Service_tag"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">System</th>';
        print '<td><name="System">' . $row["System"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Pracownik</th>';
        print " <td><a href='view_persons.php?Id=".$row['PracownikId']."'>" . $row["Imię"] . " " . $row["Nazwisko"] . "</a><br>";
        print '</tr>';
        print '<tr>';
        print '<th width="120">Data Wydania</th>';
        print '<td><name="DataWydania">' . $row['DataWydania'] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Mikrofon</th>';
        print '<td><name="Mikrofon">' . $row['Mikrofon'] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Kamera</th>';
        print '<td><name="Kamera">' . $row['Kamera'] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Miejsce</th>';
        print '<td><name="Miejsce">' . $row['Miejsce'] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Uwagi</th>';
        print '<td><name="Uwagi">' . $row['Uwagi'] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Check</th>';
        print '<td><name="Checked">' . $row['Checked'] . '</td>';
        print '</tr>';

    }
    print_r($row);
    sqlsrv_close($conn);
    ?>
</table>

<div>
    <?php
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
    {
        print "<a class='btn btn-dark btn-sm'  href='edit_comps_form.php?Id=".$row["Id"]."'>Edytuj</a>";
        print "<a class='btn btn-outline-dark btn-sm'  href='List_comps.php'>Powrót</a>";
    }
    ?>
</div>

<div class="container-fluid">
    <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead table-sm">
        <thead class="thead-dark">
        <tr>
            <th>Data
            <th>Zdarzenie
            <th>Pracownik
            <th>Opis
        </tr>
        </thead>
        <!-- END NAGŁÓWEK TABELI -->

        <div>
            <h5 align="center">Historia</h5>
        </div>

        <?php

        $sql = "select
	                   h.Id AS Id,
                       h.Data,
                       z.Nazwa AS Zdarzenie,
                       k.Nazwa AS Komp,
                       p.Imię,
                       p.Nazwisko,
                       h.Opis,
                       h.PracownikId,
                       k.Id AS KompId
                    from Historia AS h
                    left join Pracownicy AS p ON p.Id = h.PracownikId
                    left join Kompy as k on k.Id = h.KompId
                    left join Zdarzenie as z on z.Id = h.ZdarzenieId
                    where k.Id = :Id
                    order by h.Data, z.Nazwa";
        if ($stmt = $pdo->prepare($sql)) {
            if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
            }
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {
            print "<tr>";
            print "  <td>" . $row["Data"] . "<br>";
            print "  <td>" . $row["Zdarzenie"] . "<br>";
            print "  <td><a href='view_persons.php?Id=". $row['PracownikId'] ."'>" . $row["Imię"] . " " . $row["Nazwisko"] . "</a><br>";
            print "  <td>" . $row["Opis"] . "<br>";
            print "</tr>";
        }
        print_r($row);
        sqlsrv_close($conn);
        ?>
    </table>

</body>
</html>
