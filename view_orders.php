<html>
  <head>
    <title>Edycja zamówienia</title>
      <?php include('core/bootstrap.php');?>
  </head>

 <body>
  <form action="edit_orders_save.php" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');

            $sql = "select Id_order, Opis, Dostawca, NumZamDost,DataZamowienia,StatusZam,DataDost,StatusFaktury,NrFaktury,Komentarz from Zamowienie where Id_order = :Id_order";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id_order'=>trim($_GET['Id_order'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Id</th>';
               print '<td><name="Id_order">' . $row["Id_order"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Opis</th>';
               print '<td><name="Opis">' . $row["Opis"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dostawca</th>';
               print '<td><name="Dostawca">' . $row["Dostawca"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Zamówienia Dostawcy</th>';
               print '<td><name="NumZamDost">' . $row["NumZamDost"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Zamówienia</th>';
               print '<td><name="DataZamowienia">' . $row["DataZamowienia"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Status Zamówienia</th>';
               print '<td><name="StatusZam">' . $row["StatusZam"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Dostawy</th>';
               print '<td><name="DataDost">' . $row["DataDost"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Status Faktury</th>';
               print '<td><name="StatusFaktury">' . $row["StatusFaktury"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Nr Faktury</th>';
               print '<td><name="NrFaktury">' . $row["NrFaktury"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komentarz</th>';
               print '<td><name="Komentarz">' . $row["Komentarz"] . '</td>';
               print '</tr>';
              }
              print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <input type="submit" name="submit" value="submit"/>
    </form>
     <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/EKOCHEM-URSU/List_orders.php'" />
      </form>
  </body>
</html>
