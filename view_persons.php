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
            $sql = "select distinct 
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
                        CASE
                            when p.PlecId = 1
                            then 'Mężczyzna'
                            else 'Kobieta'
                        END as Płeć,
                    replace(replace(replace(SUBSTRING (
		            (
                        select '<a href=view_comps.php?Id='+cast(k.Id as char(2))+'>'+k.Nazwa+'</a><br>' as [text()]
                        from Kompy as k
                        where k.PracownikId = p.Id
                        order by k.Nazwa
                        for xml path('')
		            ), 2, 1000),'&lt;','<'),'&gt;', '>'),'lt;','<') [Komp]
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
               print '<tr>';
               print '<th width="120">Płeć</th>';
               print '<td><name="Płeć">' . $row['Płeć'] . '</td>';
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
                   print "<a class='btn btn-outline-dark btn-sm'  href='add_events_form.php'>Dodaj Zdarzenie</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  href='List_persons.php'>Powrót</a>";
                   //print "<a class='btn btn-outline-dark btn-sm'  href='print_vcard.php?Id=".$row["Id"]."'>Wizytówka</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  data-toggle='modal' data-target='#myModal'>Wizytówka</a>";
                  }
            ?>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php
                    include('print_vcard.php');
                    if ($stmt = $pdo->prepare($sql)) {
                        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
                        }
                    }
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                    {
                        print "<a class='btn btn-dark btn-lg'  href='WIZYTÓWKI/" . $row["Mail"] . ".png' download='Wizytówka QR - " . $row['Imię'] . "_" . $row['Nazwisko'] . "'>Pobierz</a>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
   <div class="container-fluid">
       <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead table-sm">
           <thead class="thead-dark">
           <tr>
               <th>Data
               <th>Zdarzenie
               <th>Komp
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
                    where h.PracownikId = :Id
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
               print "  <td><a href='view_comps.php?Id=". $row["KompId"]  ."'>" . $row["Komp"] . "</a><br>";
               print "  <td>" . $row["Opis"] . "<br>";
               print "</tr>";
           }
           print_r($row);
           sqlsrv_close($conn);
           ?>
       </table>

  </body>
</html>
