<html>
  <head>
    <title>Dodawanie Faktury</title>
      <?php include('core/bootstrap.php');?>
  </head>

 <body>
  <form action="add_faktury_save.php" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');

            $sql = "select Id_order,Dostawca from Zamowienie where Id_order = :Id_order";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id_order'=>trim($_GET['Id_order'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Numer Faktury</th>';
               print '<td><input type="text" name="NumerFakt" size="100"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Zamówienia</th>';
               print '<td><input type="hidden" name="Id_order" size="100" value="' . $row["Id_order"] . '">' . $row["Id_order"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dostawca</th>';
               print '<td><input type="hidden" name="Dostawca" size="100" value="' . $row["Dostawca"] . '">' . $row["Dostawca"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Wystawienia</th>';
               print '<td><input type="text" name="DataWyst" size="100"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Dostawy</th>';
               print '<td><input type="text" name="DataDost" size="100"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Kwota</th>';
               print '<td><input type="text" name="Kwota" size="100"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komentarz</th>';
               print '<td><input type="text" name="Komentarz_fak" size="100"></td>';
               print '</tr>';
              }
              print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <input type="submit" name="submit" value="submit"/>
    </form>
     <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_faktury.php'" />
      </form>
  </body>
</html>
