<html>
  <head>
    <title>Podgląd Pracownika</title>
      <?php
            include('core/bootstrap.php');
            include('core/navbar.php');
      ?>

 <body>

   <div>
   <h3 align="center">Podgląd Pracownika</h3>
   </div>

      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');


            # $sql = "select * from Faktury where NumerFakt = :NumerFakt";
            $sql = "select
                      	p.Id,
                      	p.Imię,
                      	p.Nazwisko,
                      	s.Nazwa AS Stanowisko,
                        CASE
                         when p.Aktywny = 1
                         then 'Tak'
                         else 'Nie'
                       END
                       AS Aktywny,
                      	p.Mail,
                      	p.Telefon,
                      	sp.Nazwa AS Spółka,
                      	p.Uwagi,
                      	d.Nazwa AS Dział,
                        k.Id AS KompId,
                        k.Nazwa As Komp
                      from Pracownicy AS p
                        inner join Stanowiska AS s on [s].[Id] = [p].[StanowiskoId]
                      	inner join Spolki AS sp on [sp].[Id] = [p].[SpółkaId]
                      	inner join Dzialy AS d on [d].[Id] = [p].[DziałId]
                        left join Kompy AS k on k.PracownikId = p.Id
                    where p.Id = :Id;";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Imię</th>';
               print '<td><name="Imię">' . $row["Imię"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Nazwisko</th>';
               print '<td><name="Nazwisko">' . $row["Nazwisko"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Stanowisko</th>';
               print '<td><name="Stanowisko">' . $row["Stanowisko"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dział</th>';
               print '<td><name="Dział">' . $row["Dział"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Spółka</th>';
               print '<td><name="Spółka">' . $row['Spółka'] .'</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Mail</th>';
               print '<td><name="Mail">' . $row['Mail'] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Telefon</th>';
               print '<td><name="Telefon">' . $row['Telefon'] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Aktywny</th>';
               print '<td><name="Aktywny">' . $row['Aktywny'] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Uwagi</th>';
               print '<td><name="Uwagi">' . $row['Uwagi'] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komp</th>';
               print '<td><name="Komp">' . $row['Komp'] . '</td>';
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
                   print "<a class='btn btn-dark btn-sm'  href='edit_persons_form.php?Id=".$row["Id"]."'>Edytuj</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  href='List_persons.php'>Powrót</a>";
                  }
            ?>
    </div>
  </body>
</html>
