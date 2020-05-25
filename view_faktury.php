<html>
  <head>
    <title>Podgląd Faktury</title>
      <?php
            include('core/bootstrap.php');
            include('core/navbar.php');
      ?>

 <body>

   <div>
   <h3 align="center">Podgląd Faktury</h3>
   </div>

      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');


            # $sql = "select * from Faktury where NumerFakt = :NumerFakt";
            $sql = "select * from Faktury
                    inner join Zamowienie on [Zamowienie].[Id_order]=[Faktury].[Id_order]
                    where id_faktury = :id_faktury";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':id_faktury'=>trim($_GET['id_faktury'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Numer Faktury</th>';
               print '<td><name="NumerFakt">' . $row["NumerFakt"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Zamówienia</th>';
               print '<td><name="Id_order">' . $row["Id_order"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dostawca</th>';
               print '<td><name="Dostawca">' . $row["Dostawca"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Wystawienia</th>';
               print '<td><name="DataWyst">' . $row["DataWyst"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Dostawy</th>';
               print '<td><name="DataDost">' . $row['DataDost'] .'</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Kwota</th>';
               print '<td><name="Kwota">' . $row['Kwota'] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komentarz do fakrtury</th>';
               print '<td><name="Komentarz_fak">' . $row['Komentarz_fak'] . '</td>';
               print '</tr>';
              }
              print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>

    <div>
      <?php
                if ($stmt = $pdo->prepare($sql)) {
                     if ($stmt->execute(array(':id_faktury'=>trim($_GET['id_faktury'])))) {
                      }
                  }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                  {
                   print "<a class='btn btn-dark btn-sm'  href='edit_faktury_form.php?id_faktury=".$row["id_faktury"]."'>Edytuj</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  href='List_orders.php'>Zamówienia</a>";
                   print "<a class='btn btn-outline-dark btn-sm'  href='List_faktury.php'>Faktury</a>";
                  }
            ?>
    </div>
  </body>
</html>
