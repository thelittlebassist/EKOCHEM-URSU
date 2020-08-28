<html>
<head>
    <title>Dodawanie Komputera</title>
    <?php
    include('core/bootstrap.php');
    include('core/navbar.php');
    ?>
</head>

<body>

<div>
    <h3 align="center">Dodawanie Komputera</h3>
</div>
<form action="add_comps_save.php" method="POST">
    <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <?php

        include('core/config.php');

            print '<tr>';
            print '<th width="120">Nazwa</th>';
            print '<td><input type="text" name="Nazwa" size="100"></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Model</th>';
            print '<td><select name="ModelId">';
            print '<option value="wyb">--WYBIERZ--</option>';
            $sql1 = "select
                                  	m.Id as Id,
                                  	m.Nazwa as Nazwa,
                                    p.Nazwa as Producent
                                   from Modele as m 
                                        left join Producenci as p on p.Id = m.ProducentId
                                  	";
            if ($stmt1 = $pdo->prepare($sql1)) {
                if ($stmt1->execute()) {
                }
            }
            while ($row_st = $stmt1->fetch(PDO::FETCH_ASSOC)) // while there are rows
            {
                $model = $row_st['Nazwa'];
                $model_id = $row_st['Id'];
                $producent = $row_st['Producent'];
                print "<option value='$model_id'>$producent $model</option>";
            }
            print '</select></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Service Tag</th>';
            print '<td><input type="text" name="Service_tag" size="100"></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">System</th>';
            print '<td><select name="SystemId">';
            print '<option value="wyb">--WYBIERZ--</option>';
            $sql2 = "select
                        s.Id as Id,
                        s.Nazwa as Nazwa
                        from Systemy as s
                        order by Nazwa
                            ";
            if ($stmt2 = $pdo->prepare($sql2)){
                if ($stmt2->execute()) {
                }
            }
            while ($row_st = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $system = $row_st['Nazwa'];
                $system_id = $row_st['Id'];
                print "<option value='$system_id'>$system</option>";
            }
            print '</select></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Pracownik</th>';
            print '<td><select name="PracownikId">';
            print '<option value="wyb">--WYBIERZ--</option>';
            print "<option value=null>*PUSTE*</option>";
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
            print '<th width="120">Data Wydania</th>';
            print '<td><input type="text" name="Data_Wydania" size="100"></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Mikrofon</th>';
            print '<td><select name="Mikrofon">';
            print "<option value='wyb'>--WYBIERZ--</option>";
            print "<option value='1'>TAK</option>";
            print "<option value='0'>NIE</option>";
            print '</select></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Kamera</th>';
            print '<td><select name="Kamera">';
            print "<option value='wyb'>--WYBIERZ--</option>";
            print "<option value='1'>TAK</option>";
            print "<option value='0'>NIE</option>";
            print '</select></td>';
            print '</tr>';
            print '<tr>';
            print '<th width="120">Miejsce</th>';
            print '<td><select name="MiejsceId">';
            print '<option value="wyb">--WYBIERZ--</option>';
            print "<option value=null>*PUSTE*</option>";
            $sql4 = "select
                        m.Id as Id,
                        m.Nazwa as Nazwa
                        from Miejsca as m
                        order by Nazwa
                            ";
            if ($stmt4 = $pdo->prepare($sql4)){
                if ($stmt4->execute()) {
                }
            }
            while ($row_st = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                $miejsce = $row_st['Nazwa'];
                $miejsce_id = $row_st['Id'];
                print "<option value='$miejsce_id'>$miejsce</option>";
            }
            print '</select></td>';
            print '</tr>';
            print '<tr>';
            print '<tr>';
            print '<th width="120">Uwagi</th>';
            print '<td><input type="text" name="Uwagi" size="100"></td>';
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