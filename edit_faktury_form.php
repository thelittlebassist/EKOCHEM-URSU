<html>
  <head>
    <title>Edycja Faktury</title>
      <?php
          include('core/bootstrap.php');
          include('core/navbar.php');
      ?>
  </head>

 <body>
  <form action="edit_faktury_save.php" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');

            $sql = "select id_faktury,NumerFakt,Id_order,DataWyst,DataDost,Kwota,Komentarz_fak from Faktury where id_faktury = :id_faktury";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':id_faktury'=>trim($_GET['id_faktury'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Id</th>';
               print '<td><input type="hidden" name="id_faktury" size="100" value="' . $row["id_faktury"] . '">' . $row["id_faktury"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Faktury</th>';
               print '<td><input type="text" name="NumerFakt" size="100" value="' . $row["NumerFakt"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Zamówienia</th>';
               print '<td><input type="text" name="Id_order" size="100" value="' . $row["Id_order"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Wystawienia</th>';
               print '<td><input type="text" name="DataWyst" size="100" value="' . $row["DataWyst"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Dostawy</th>';
               print '<td><input type="text" name="DataDost" size="100" value="' . $row["DataDost"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Kwota</th>';
               print '<td><input type="text" name="Kwota" size="100" value="' . $row["Kwota"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komentarz</th>';
               print '<td><input type="text" name="Komentarz_fak" size="100" value="' . $row["Komentarz_fak"] . '"></td>';
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
        $sql = "select * from Faktury
                inner join Zamowienie on [Zamowienie].[Id_order]=[Faktury].[Id_order]
                where id_faktury = :id_faktury";
                  if ($stmt = $pdo->prepare($sql)) {
                       if ($stmt->execute(array(':id_faktury'=>trim($_GET['id_faktury'])))) {
                        }
                    }
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
                    {
                     print "<a class='btn btn-secondary btn-sm'  href='view_faktury.php?id_faktury=".$row["id_faktury"]."'>Powrót</a>";
                     print "<a class='btn btn-outline-dark btn-sm'  href='List_orders.php'>Zamówienia</a>";
                     print "<a class='btn btn-outline-dark btn-sm'  href='List_faktury.php'>Faktury</a>";
                    }
              ?>
      </div>

  </body>
</html>
