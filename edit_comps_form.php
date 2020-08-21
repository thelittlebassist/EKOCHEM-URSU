<html>
<head>
    <title>edycja Komputera</title>
    <?php
    include('core/bootstrap.php');
    include('core/navbar.php');
    ?>
</head>

<body>

<div>
    <h3 align="center">Edycja Komputera</h3>
</div>
<form action="edit_comps_save.php" method="POST">
    <table border="1" style="font-size:14px" class="table table-striped table-hover">
        <?php

        include('core/config.php');
    $sql = "select
                      	k.Id,
                      	k.Nazwa,
                      	m.Nazwa AS Model,
                        pr.Nazwa AS Producent,
                        t.Nazwa AS Typ,
                      	k.Service_tag,
                      	s.Nazwa AS System,
                      	p.Imię AS Imię,
                        p.Nazwisko AS Nazwisko,
                        k.Data_Wydania AS DataWydania,
                        k.Mikrofon AS Mikrofon,
                        k.Kamera AS Kamera,       
                        ms.Nazwa AS Miejsce,
                        k.Uwagi
                      from Kompy AS k
                        left join Modele AS m on [m].[Id] = [k].[ModelId]
                      	left join Systemy AS s on [s].[Id] = [k].[SystemId]
                      	left join Pracownicy AS p on [p].[Id] = [k].[PracownikId]
                        left join Miejsca AS ms ON ms.Id = k.MiejsceId
                        left join Producenci AS pr ON pr.Id = m.ProducentId
                        left join Typy_komp AS t ON t.Id = m.TypId
                    where k.Id = :Id";
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {
        $komp_id = $row["Id"];
        if($row["Mikrofon"] == 1){
            $mik_select1 = 'selected';
        }
        else{
            $mik_select2= 'selected';
        }

        if($row["Kamera"] == 1){
            $cam_select1= 'selected';
        }
        else{
            $cam_select2= 'selected';
        }

        print '<tr>';
        print '<th width="120">Id</th>';
        print '<td><input type="hidden" name="Id" size="100" value=' . $row["Id"] . '>' . $row["Id"] . '</td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Nazwa</th>';
        print '<td><input type="text" name="Nazwa" size="100" value="' . $row["Nazwa"] . '"></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Model</th>';
        print '<td><select name="ModelId">';
        $sql1 = "select
                                  	m.Id as Id,
                                  	m.Nazwa as Nazwa,
                                  	k.Id as komp_id
                                   from Modele as m
                                  	left join (select * from Kompy
				                          where Id = $komp_id) as k ON k.ModelId = m.Id";
        if ($stmt1 = $pdo->prepare($sql1)) {
            if ($stmt1->execute()) {
            }
        }
        while ($row_st = $stmt1->fetch(PDO::FETCH_ASSOC)) // while there are rows
        {
            if(empty($row_st['komp_id']) or $row_st['komp_id'] == ''){
                $selected = '';
            }
            else {
                $selected = 'selected';
            }
            $model = $row_st['Nazwa'];
            $model_id = $row_st['Id'];
            print "<option value='$model_id' $selected>$model</option>";
        }
        print '</select></td>';
        print '</tr>';

        print '<tr>';
        print '<th width="120">Service Tag</th>';
        print '<td><input type="text" name="Service_tag" size="100" value="' . $row["Service_tag"] . '" ></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">System</th>';
        print '<td><select name="SystemId">';
        $sql2 = "select
                        s.Id as Id,
                        s.Nazwa as Nazwa,
                        k.Id as komp_id
                        from Systemy as s
                            left join (select * from Kompy
                                    where Id = $komp_id) as k ON k.SystemId = s.Id";
                if ($stmt2 = $pdo->prepare($sql2)){
                    if ($stmt2->execute()) {
                    }
                }
            while ($row_st = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                if(empty($row_st['komp_id']) or $row_st['komp_id'] == ''){
                    $selected = '';
                    }
                    else {
                    $selected = 'selected';
        }
        $system = $row_st['Nazwa'];
        $system_id = $row_st['Id'];
        print "<option value='$system_id' $selected>$system</option>";
            }
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Pracownik</th>';
        print '<td><select name="PracownikId">';
        $sql3 = "select
                        p.Id as Id,
                        p.Nazwisko as Nazwisko,
                        p.Imię as Imię,
                        k.Id as komp_id
                        from Pracownicy as p
                            left join (select * from Kompy
                                    where Id = $komp_id) as k ON k.PracownikId = p.Id
                        order by Nazwisko";
                if ($stmt3 = $pdo->prepare($sql3)){
                    if ($stmt3->execute()) {
                    }
                }
            while ($row_st = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                if(empty($row_st['komp_id']) or $row_st['komp_id'] == ''){
                    $selected = '';
                    }
                    else {
                    $selected = 'selected';
        }
        $pracownik = $row_st['Nazwisko'];
        $pracownik_imie = $row_st['Imię'];
        $pracownik_id = $row_st['Id'];

        print "<option value='$pracownik_id' $selected>$pracownik $pracownik_imie</option>";
            }
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Data Wydania</th>';
        print '<td><input type="text" name="Data_Wydania" size="100" value="' . $row['DataWydania'] . '" ></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Mikrofon</th>';
        print '<td><select name="Mikrofon">';
        print "<option value='1' $mik_select1>TAK</option>";
        print "<option value='0' $mik_select2>NIE</option>";
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Kamera</th>';
        print '<td><select name="Kamera">';
        print "<option value='1' $cam_select1>TAK</option>";
        print "<option value='0' $cam_select2>NIE</option>";
        print '</select></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Miejsce</th>';
        print '<td><input type="text" name="MiejsceId" size="100" value=' . $row['Miejsce'] . ' ></td>';
        print '</tr>';
        print '<tr>';
        print '<th width="120">Uwagi</th>';
        print '<td><input type="text" name="Uwagi" size="100" value="' . $row['Uwagi'] . '" ></td>';
        print '</tr>';

    }
    print_r($row);
    sqlsrv_close($conn);
    ?>
</table>
    <input class='btn btn-dark btn-sm' type="submit" name="submit" value="Zapisz"/>
</form>
<div>
    <?php
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
    {
        print "<a class='btn btn-dark btn-sm'  href='view_comps.php?Id=".$row["Id"]."'>Powrót do podglądu</a>";
        print "<a class='btn btn-outline-dark btn-sm'  href='List_comps.php'>Powrót do Listy</a>";
    }
    ?>

</div>
</body>
</html>