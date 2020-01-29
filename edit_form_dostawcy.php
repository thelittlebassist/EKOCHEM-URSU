<html>
  <head>
    <title>Edycja dostawcy</title>
      <?php include('core/bootstrap.php');?>
  </head>

 <body>
  <form action="save_edit_dostawcy.php" method="POST">
      <table border="1" style="font-size:14px" class="table table-striped table-hover">
  <?php
          include('core/config.php');

            $sql = "select Id_supplier,Name,Adres,mail,website from Dostawca where Id_supplier = :Id_supplier";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute(array(':Id_supplier'=>trim($_GET['Id_supplier'])))) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print '<tr>';
               print '<th width="120">Id</th>';
               print '<td><input type="hidden" name="Id_supplier" size="100" value="' . $row["Id_supplier"] . '">' . $row["Id_supplier"] . '</td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Zazwa</th>';
               print '<td><input type="text" name="Name" size="100" value="' . $row["Name"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Adres</th>';
               print '<td><input type="text" name="Adres" size="100" value="' . $row["Adres"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<tr>';
               print '<th width="120">Mail</th>';
               print '<td><input type="text" name="mail" size="100" value="' . $row["mail"] . '"></td>';
               print '</tr>';
               print '<tr>';
               print '<th width="120">Website</th>';
               print '<td><input type="text" name="website" size="100" value="' . $row["website"] . '"></td>';
               print '</tr>';
              }
              print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <input type="submit" name="submit" value="submit"/>
    </form>
     <form>
        <input type="button" value="Powrót" onclick="window.location.href='http://localhost/Dostawcy_lista.php'" />
      </form> 
  </body>
</html>
