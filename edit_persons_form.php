<html>
  <head>
    <title>edycja Pracownika</title>
      <?php
            include('core/bootstrap.php');
            include('core/navbar.php');
      ?>
 </head>

 <body>

   <div>
   <h3 align="center">Edycja Pracownika</h3>
   </div>
      <form action="edit_persons_save.php" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php

          include('core/config.php');
            $sql = "select
                      	p.Id,
                      	p.Imię,
                      	p.Nazwisko,
                      	s.Nazwa AS Stanowisko,
                        p.Aktywny,
                      	p.Mail,
                      	p.Telefon,
                      	sp.Nazwa AS Spółka,
                      	p.Uwagi,
                      	d.Nazwa AS Dział
                      from Pracownicy AS p
                        inner join Stanowiska AS s on [s].[Id] = [p].[StanowiskoId]
                      	inner join Spolki AS sp on [sp].[Id] = [p].[SpółkaId]
                      	inner join Dzialy AS d on [d].[Id] = [p].[DziałId]
                    where p.Id = :Id;";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
              $prac_id = $row["Id"];
              if($row["Aktywny"] == 1){
                $checked= 'checked';
              }
              else{
                $checked= '';
              }

               print '<tr>';
               print '<th width="120">Id</th>';
               print '<td><input type="hidden" name="Id" size="100" value="' . $row["Id"] . '">' . $row["Id"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Imię</th>';
               print '<td><input type="text" name="Imię" size="100" value=' . $row["Imię"] . '></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Nazwisko</th>';
               print '<td><input type="text" size="100" name="Nazwisko" value="' . $row["Nazwisko"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Stanowisko</th>';
               print '<td><select name="StanowiskoId">';
                         $sql1 = "select
                                  	s.Id as Id,
                                  	s.Nazwa as Nazwa,
                                  	p.Id as prac_id
                                   from Stanowiska as s
                                  	left join (select * from Pracownicy
				                          where Id = $prac_id) as p ON p.StanowiskoId = s.Id";
                         if ($stmt1 = $pdo->prepare($sql1)) {
                            if ($stmt1->execute()) {
                             }
                         }
                       while ($row_st = $stmt1->fetch(PDO::FETCH_ASSOC)) // while there are rows
                         {
                          if(empty($row_st['prac_id']) or $row_st['prac_id'] == ''){
                            $selected = '';
                          }
                          else {
                            $selected = 'selected';
                          }
                          $stanowiska = $row_st['Nazwa'];
                          $stan_id = $row_st['Id'];
                          print "<option value='$stan_id' $selected>$stanowiska</option>";
                         }
               print '</select></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dział</th>';
               print '<td><select name="DziałId">';
                         $sql2 = "select
                                    d.Id as Id,
                                    d.Nazwa as Nazwa,
                                    p.Id as prac_id
                                   from Dzialy as d
                                    left join (select * from Pracownicy
                                  where Id = $prac_id) as p ON p.DziałId = d.Id";
                         if ($stmt2 = $pdo->prepare($sql2)) {
                            if ($stmt2->execute()) {
                             }
                         }
                       while ($row_dz = $stmt2->fetch(PDO::FETCH_ASSOC)) // while there are rows
                         {
                          if(empty($row_dz['prac_id']) or $row_dz['prac_id'] == ''){
                            $selected = '';
                          }
                          else {
                            $selected = 'selected';
                          }
                          $dzialy = $row_dz['Nazwa'];
                          $dzialy_id = $row_dz['Id'];
                          echo "<option value='$dzialy_id' $selected>$dzialy</option>";
                         }
               print '</select></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Spółka</th>';
               print '<td><select name="SpółkaId">';
                         $sql3 = "select
                                    sp.Id as Id,
                                    sp.Nazwa as Nazwa,
                                    p.Id as prac_id
                                   from Spolki as sp
                                    left join (select * from Pracownicy
                                  where Id = $prac_id) as p ON p.SpółkaId = sp.Id";
                         if ($stmt3 = $pdo->prepare($sql3)) {
                            if ($stmt3->execute()) {
                             }
                         }
                       while ($row_sp = $stmt3->fetch(PDO::FETCH_ASSOC)) // while there are rows
                         {
                          if(empty($row_sp['prac_id']) or $row_sp['prac_id'] == ''){
                            $selected = '';
                          }
                          else {
                            $selected = 'selected';
                          }
                          $spolki = $row_sp['Nazwa'];
                          $spolki_id = $row_sp['Id'];
                          echo "<option value='$spolki_id' $selected>$spolki</option>";
                         }
               print '</select></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Mail</th>';
               print '<td><input type="text" size="100" name="Mail" value="' . $row['Mail'] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Telefon</th>';
               print '<td><input type="text" size="100" name="Telefon" value="' . $row['Telefon'] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Aktywny</th>';
               print '<td><input type="checkbox" name="Aktywny" value="' . $row['Aktywny'] . '" ' . $checked . '></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Uwagi</th>';
               print '<td><input type="text" size="100" name="Uwagi" value="' . $row['Uwagi'] . '"></td>';
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
                   print "<a class='btn btn-outline-dark btn-sm'  href='view_persons.php?Id=".$row["Id"]."'>Powrót do podglądu</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  href='List_persons.php'>Powrót do listy pracowników</a>";
                  }
          ?>
    </div>
  </body>
</html>
