<html>
  <head>
    <title>Edycja zamówienia</title>
        <!-- ŁADOWANIE BOOTSTRAP -->
        <link rel="stylesheet" href="bt4/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- END ŁADOWANIE BOOTSTRAP -->
  </head>

 <body>
  <form action="save_edit.php" name="frmEdit" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');
          
            $sql = "select * from Zamowienie where Id_order = :Id_order";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id_order'=>trim($_GET['Id_order'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Id</th>';
               print '<td>' . $row["Id_order"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Opis</th>';
               print '<td><input type="text" name="Opis" size="100" value="' . $row["Opis"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Dostawca</th>';
               print '<td><input type="text" name="Dostawca" size="100" value="' . $row["Dostawca"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Numer Zamówienia Dostawcy</th>';
               print '<td><input type="text" name="NumZamDost" size="100" value="' . $row["NumZamDost"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Zamówienia</th>';
               print '<td><input type="text" name="DataZamowienia" size="100" value="' . $row["DataZamowienia"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Status Zamówienia</th>';
               print '<td><input type="text" name="StatusZam" size="100" value="' . $row["StatusZam"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Data Dostawy</th>';
               print '<td><input type="text" name="DataDost" size="100" value="' . $row["DataDost"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Status Faktury</th>';
               print '<td><input type="text" name="StatusFaktury" size="100" value="' . $row["StatusFaktury"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Nr Faktury</th>';
               print '<td><input type="text" name="NrFaktury" size="100" value="' . $row["NrFaktury"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Komentarz</th>';
               print '<td><input type="text" name="Komentarz" size="100" value="' . $row["Komentarz"] . '"></td>';
               print '</tr>';
              }
        ?>
      </table>
      <input type="submit" name="submit" value="submit"/>
    </form>
     <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/Zamowienia_strona.php'" />
      </form> 
  </body>
</html>
