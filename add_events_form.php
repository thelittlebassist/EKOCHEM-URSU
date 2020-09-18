<html>
<head>
    <title>Dodawanie Zdarzenia</title>
    <?php
    include('core/bootstrap.php');
    include('core/navbar.php');
    ?>
</head>

<body>

<div>
    <h3 align="center">Dodawanie Zdarzenia</h3>
</div>
<form action="add_events_save.php" method="POST">
    <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <?php

        include('core/config.php');

        print '<tr>';
        print '<th width="120">Data</th>';
        print '<td><input type="text" name="Data" size="100"></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Typ zdarzenia</th>';
        print '<td><select name="ZdarzenieId">';
        print '<option value="wyb">--WYBIERZ--</option>';
        $sql1 = "select
                                  	z.Id as Id,
                                  	z.Nazwa as Nazwa
                                   from Zdarzenie as z 
                                  	";
        if ($stmt1 = $pdo->prepare($sql1)) {
            if ($stmt1->execute()) {
            }
        }
        while ($row_st = $stmt1->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {
            $zdarzenie = $row_st['Nazwa'];
            $zdarzenieId = $row_st['Id'];
            print "<option value='$zdarzenieId'>$zdarzenie</option>";
        }
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Komp</th>';
        print '<td><select name="KompId">';
        print '<option value=null>--WYBIERZ--</option>';
        $sql2 = "select
                        k.Id as Id,
                        k.Nazwa as Nazwa
                        from Kompy as k
                        order by Nazwa
                            ";
        if ($stmt2 = $pdo->prepare($sql2)){
            if ($stmt2->execute()) {
            }
        }
        while ($row_st = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $komp = $row_st['Nazwa'];
            $komp_id = $row_st['Id'];
            print "<option value='$komp_id'>$komp</option>";
        }
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Pracownik</th>';
        print '<td><select name="PracownikId">';
        print '<option value=null>--WYBIERZ--</option>';
        $sql3 = "select
                        p.Id as Id,
                        p.Nazwisko as Nazwisko,
                        p.Imię as Imię
                        from Pracownicy as p
                        order by Nazwisko";
        if ($stmt3 = $pdo->prepare($sql3)){
            if ($stmt3->execute()) {
            }
        }
        while ($row_st = $stmt3->fetch(PDO::FETCH_ASSOC)) {

            $pracownik = $row_st['Nazwisko'];
            $pracownik_imie = $row_st['Imię'];
            $pracownik_id = $row_st['Id'];

            print "<option value='$pracownik_id'>$pracownik $pracownik_imie</option>";
        }
        print '</select></td>';
        print '</tr>';

        print '<tr>';
        print '<tr>';
        print '<th width="120">Opis</th>';
        print '<td><input type="text" name="Opis" size="100"></td>';
        print '</tr>';


        print_r($row);
        sqlsrv_close($conn);

        ?>
    </table>
    <input class='btn btn-dark btn-sm' type="submit" name="submit" value="Zapisz"/>
</form>
<form>
    <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_comps.php'" />
</form>
</body>
</html>
