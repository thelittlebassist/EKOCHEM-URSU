<html>

<head>
    <title>Dział IT - Komputery</title>
    <?php include('core/bootstrap.php');?>
</head>

<body style="font-size:16px">

<?php
include('core/navbar.php');
include('core/config.php');
include('core/css.php');
?>

<div>
    <h3 align="center">Lista Komputerów</h3>
</div>

<form>
    <input class="btn btn-dark" type="button" value="Dodaj komputer" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_comps_form.php'" />
    <input class="btn btn-dark" type="button" value="Drukuj listę laptopów w użyciu" onclick="window.location.href='print_pdf_laptoplist.php'" />
</form>

<!-- NAGŁÓWEK TABELI -->
<div class="container-fluid">
    <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
        <thead class="thead-dark">
        <tr>
            <th>Nazwa
            <th>Pracownik
            <th>Miejsce
            <th>System
            <th>Uwagi
            <th>Check</th>
            <th>Opcje
        </tr>
        </thead>
        <!-- END NAGŁÓWEK TABELI -->

        <?php

        $sql = "select
	                   k.Id,
                       k.Nazwa AS Komp,
                       p.Imię,
                       p.Nazwisko,
                       m.Nazwa AS Miejsce,
                       s.Nazwa AS System,
                       k.Uwagi,
                       p.Id AS PracownikId,
                       CASE
                            when k.Checked = 1
                                then 'TAK'
                                else 'NIE'
                        END AS Checked
                    from Kompy AS k
                    left join Miejsca AS m ON m.Id = k.MiejsceId
                    left join Pracownicy AS p ON p.Id = k.PracownikId
                    left join Systemy AS s ON s.Id = k.SystemId
                    order by k.Nazwa;";
        if ($stmt = $pdo->prepare($sql)) {
            if ($stmt->execute()) {
            }
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {

            if ($row['Checked'] == 'NIE') {
                $td_class = 'class=table-danger';
            }
            else {
                $td_class = 'class=table-success';
            }

            print "<tr>";
            print "  <td><a href='view_comps.php?Id=".$row['Id']."'>" . $row["Komp"] . "</a><br>";
            print " <td><a href='view_persons.php?Id=".$row['PracownikId']."'>" . $row["Imię"] . " " . $row["Nazwisko"] . "</a><br>";
            print "  <td>" . $row["Miejsce"] . "<br>";
            print "  <td>" . $row["System"] . "<br>";
            print "  <td>" . $row["Uwagi"] . "<br>";
            print "  <td $td_class>" . $row["Checked"] . "<br>";
            $delete="Czy chcesz usunąć?";
            print " <td><a class='btn btn-outline-dark btn-sm'  href='view_comps.php?Id=".$row['Id']."'>P</a>
                           <a class='btn btn-outline-dark btn-sm'  href='edit_comps_form.php?Id=".$row['Id']."'>E</a>
                           <a class='btn btn-outline-dark btn-sm' href='delete_comps.php?Id=".$row['Id']."' onclick=\"return confirm('".$delete."');\">U</a>";
            print "</tr>";
        }
        print_r($row);
        sqlsrv_close($conn);
        ?>
    </table>
    <form>
        <input class="btn btn-dark" type="button" value="Dodaj komputer" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_comps_form.php'" />
    </form>
</div>
</body>
</html>
