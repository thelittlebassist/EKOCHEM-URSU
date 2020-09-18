<html>

<head>
    <title>Dział IT - Zdarzenia</title>
    <?php include('core/bootstrap.php');?>
</head>

<body style="font-size:16px">

<?php
include('core/navbar.php');
include('core/config.php');
include('core/css.php');
?>

<div>
    <h3 align="center">Lista Zdarzeń</h3>
</div>

<form>
    <input class="btn btn-dark" type="button" value="Dodaj Zdarzenie" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_events_form.php'" />
</form>

<!-- NAGŁÓWEK TABELI -->
<div class="container-fluid">
    <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
        <thead class="thead-dark">
        <tr>
            <th>Id
            <th>Data
            <th>Zdarzenie
            <th>Komp
            <th>Pracownik
            <th>Opis
            <th>Opcje</th>
        </tr>
        </thead>
        <!-- END NAGŁÓWEK TABELI -->

        <?php

        $sql = "select
	                   h.Id AS Id,
                       h.Data,
                       z.Nazwa AS Zdarzenie,
                       k.Nazwa AS Komp,
                       p.Imię,
                       p.Nazwisko,
                       h.Opis,
                       k.Id AS KompId,
                       p.Id AS PracownikId
                    from Historia AS h
                    left join Pracownicy AS p ON p.Id = h.PracownikId
                    left join Kompy as k on k.Id = h.KompId
                    left join Zdarzenie as z on z.Id = h.ZdarzenieId";
        if ($stmt = $pdo->prepare($sql)) {
            if ($stmt->execute()) {
            }
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {
            print "<tr>";
            print "  <td>" . $row["Id"] . "<br>";
            print "  <td>" . $row["Data"] . "<br>";
            print "  <td>" . $row["Zdarzenie"] . "<br>";
            print "  <td><a href='view_comps.php?Id=". $row['KompId'] ."'>" . $row["Komp"] . "</a><br>";
            print "  <td><a href='view_persons.php?Id=". $row['PracownikId'] ."'>" . $row["Imię"] . " " .$row["Nazwisko"] . "<br>";
            print "  <td>" . $row["Opis"] . "<br>";
            $delete="Czy chcesz usunąć?";
            print " <td><a class='btn btn-outline-dark btn-sm'  href='edit_events_form.php?Id=".$row['Id']."'>E</a>";
           // print " <a class='btn btn-outline-dark btn-sm' href='delete_persons.php?Id=".$row['Id']."' onclick=\"return confirm('".$delete."');\">U</a>";

            print "</tr>";
        }
        print_r($row);
        sqlsrv_close($conn);
        ?>
    </table>
    <form>
        <input class="btn btn-dark" type="button" value="Dodaj pracownika" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_persons_form.php'" />
    </form>
</div>
</body>
</html>
