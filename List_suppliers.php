<html>

  <head>

    <title>Dział IT - Dostawcy</title>
    <?php include('core/bootstrap.php');?>

  </head>

  <body style="font-size:16px">

   <?php
          include('core/navbar.php');
          include('core/config.php');
          include('core/css.php');
  ?>
    <div>
    <h3 align="center">Dostawcy</h3>
    </div>
    
    <form>
      <input class="btn btn-dark" type="button" value="Dodaj Dostawcę" onclick="window.location.href='http://localhost/EKOCHEM-URSU/Add_supplier_form.php'" />
    </form>

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
        <thead class="thead-dark">
          <tr>
          <th>Id
          <th>Nazwa
          <th>Adres
          <th>Mail
          <th>Website
          <th>Opcje
        	</tr>
        </thead>
    <!-- END NAGŁÓWEK TABELI -->

        <?php

            $sql = "select * from Dostawca order by Id_supplier";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute()) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print "<tr>";
               print "  <td>" . $row["Id_supplier"] . "<br>";
               print "  <td>" . $row["Name"] . "<br>";
            	 print "  <td>" . $row["Adres"] . "<br>";
            	 print "  <td>" . $row["mail"] . "<br>";
            	 print "  <td>" . $row["website"] . "<br>";
                  $delete="Czy chcesz usunąć?";
               print " <td><a class='btn btn-outline-dark btn-sm'  href='edit_supplier_form.php?Id_supplier=".$row['Id_supplier']."'>Edytuj</a>
                            <a class='btn btn-outline-dark btn-sm'  href='delete_supplier.php?Id_supplier=".$row['Id_supplier']."' onclick=\"return confirm('".$delete."');\">Usuń</a><br>";
               print "</tr>";
              }
            	 print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <form>
        <input class="btn btn-dark" type="button" value="Dodaj Dostawcę" onclick="window.location.href='http://localhost/EKOCHEM-URSU/Add_supplier_form.php'" />
      </form>
    </div>
  </body>
</html>
